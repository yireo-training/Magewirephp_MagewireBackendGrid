<?php declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Magewire;

use Magewirephp\Magewire\Component;
use Magewirephp\MagewireBackendGrid\Grid\DataProvider\GridDataProviderInterface;

class Grid extends Component
{
    public bool $spinner = false;
    public string $search = '';
    public array $items = [];
    public int $page = 1;
    public int $limit = 20;
    public int $totalPages = 0;
    public int $totalItems = 0;
    private ?GridDataProviderInterface $gridDataProvider = null;

    public function setGridDataProvider(?GridDataProviderInterface $gridDataProvider): void
    {
        $this->gridDataProvider = $gridDataProvider;
    }

    public function hydrate(): void
    {
        $this->loadData();
    }

    private function loadData()
    {
        if ($this->gridDataProvider instanceof GridDataProviderInterface) {
            $this->items = $this->gridDataProvider->getItems($this->page - 1, $this->limit, $this->search);
            $this->totalPages = $this->gridDataProvider->getTotalPages($this->limit);
            $this->totalItems = $this->gridDataProvider->getTotalItems();
            $this->emit('grid_data_provider_change', $this);
        }
    }

    public function updatedSearch(string $search)
    {
        $this->loadData();
        return $search;
    }
}
