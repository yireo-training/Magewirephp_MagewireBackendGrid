<?php
declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Magewire;

use Magewirephp\Magewire\Component;
use Magewirephp\MagewireBackendGrid\Grid\DataProvider\GridDataProviderInterface;
use Magewirephp\MagewireBackendGrid\Grid\State;

class Grid extends Component
{
    private array $items = [];
    private array $columns = [];
    
    protected $listeners = [
        'grid_search' => 'onGridSearch'
    ];
    
    public function __construct(
        private GridDataProviderInterface $gridDataProvider,
        private State $state
    ) {
    }
    
    public function boot(): void
    {
        $this->loadProvided();
    }
    
    public function getGridDataProvider(): GridDataProviderInterface
    {
        return $this->gridDataProvider;
    }
    
    public function onGridSearch()
    {
        //$this->loadProvided();
    }
    
    private function loadProvided()
    {
        $this->items = $this->gridDataProvider->getItems();
        $this->columns = $this->gridDataProvider->getColumns();
        
        $this->state->setTotalItems($this->gridDataProvider->getTotalItems());
        $this->state->setTotalPages($this->gridDataProvider->getTotalPages($this->state->getLimit()));
        $this->emit('grid_state_change', $this->state->toArray());
    }
    
    public function getItems(): array
    {
        return $this->items;
    }
    
    public function getColumns(): array
    {
        return $this->columns;
    }
}
