<?php

declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Grid;

use Magento\Backend\Model\Session;

class State
{
    private int $page = 0;
    private int $limit = 20;
    private int $totalItems = 0;
    private bool $loading = false;
    private string $search = '';
    
    public function __construct(
        private Session $session
    ) {
        $this->page = (int)$session->getData('page');
        $limit = (int)$session->getData('limit');
        if ($limit > 0) {
            $this->limit = $limit;
        }
        
        $this->totalItems = (int)$session->getData('totalItems');
        $this->search = (string)$session->getData('search');
        $this->loading = (bool)$session->getData('loading');
    }
    
    public function getPage(): int
    {
        return $this->page;
    }
    
    public function setPage(int $page): void
    {
        $this->save('page', $page);
        $this->page = $page;
    }
    
    public function getLimit(): int
    {
        return $this->limit;
    }
    
    public function setLimit(int $limit): void
    {
        $this->save('limit', $limit);
        $this->limit = $limit;
    }
    
    public function getTotalItems(): int
    {
        return $this->totalItems;
    }
    
    public function setTotalItems(int $totalItems): void
    {
        $this->save('totalItems', $totalItems);
        $this->totalItems = $totalItems;
    }
    
    public function getTotalPages(): int
    {
        return (int)ceil($this->totalItems / $this->limit);
    }
    
    public function setTotalPages(int $totalPages): void
    {
        $this->save('totalPages', $totalPages);
        $this->totalPages = $totalPages;
    }
    
    public function isLoading(): bool
    {
        return $this->loading;
    }
    
    public function setLoading(bool $loading): void
    {
        $this->save('loading', $loading);
        $this->loading = $loading;
    }
    
    public function getSearch(): string
    {
        return $this->search;
    }
    
    public function setSearch(string $search): void
    {
        $this->save('search', $search);
        $this->search = $search;
    }
    
    /**
     * @todo: Ideally we would be able to pass State as an object to event listeners
     * @return array
     */
    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'limit' => $this->limit,
            'totalItems' => $this->totalItems,
            'totalPages' => $this->totalPages,
            'loading' => $this->loading,
            'search' => $this->search,
        ];
    }
    
    private function save(string $name, $value)
    {
        // @todo: Save this under a specific prefix
        $this->session->setData($name, $value);
    }
}
