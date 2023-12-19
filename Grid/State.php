<?php

declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Grid;

class State
{
    private int $page = 0;
    private int $limit = 20;
    private int $totalItems = 0;
    private int $totalPages = 0;
    private bool $loading = false;
    private string $search = '';
    
    public function getPage(): int
    {
        return $this->page;
    }
    
    public function setPage(int $page): void
    {
        $this->page = $page;
    }
    
    public function getLimit(): int
    {
        return $this->limit;
    }
    
    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }
    
    public function getTotalItems(): int
    {
        return $this->totalItems;
    }
    
    public function setTotalItems(int $totalItems): void
    {
        $this->totalItems = $totalItems;
    }
    
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }
    
    public function setTotalPages(int $totalPages): void
    {
        $this->totalPages = $totalPages;
    }
    
    public function isLoading(): bool
    {
        return $this->loading;
    }
    
    public function setLoading(bool $loading): void
    {
        $this->loading = $loading;
    }
    
    public function getSearch(): string
    {
        return $this->search;
    }
    
    public function setSearch(string $search): void
    {
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
}
