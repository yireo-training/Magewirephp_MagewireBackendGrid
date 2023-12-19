<?php declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Magewire\Grid;

use Magento\Framework\Event\Observer;
use Magewirephp\Magewire\Component;
use Magewirephp\MagewireBackendGrid\Grid\State;

class Pagination extends Component
{
    public int $page = 0;
    public int $limit = 0;
    public int $totalPages = 0;
    public int $totalItems = 0;
    public bool $showLimitMenu = false;

    protected $listeners = [
        'grid_state_change' => 'gridStateChange'
    ];
    
    public function __construct(
        private State $state
    ) {
    }
    
    public function booted()
    {
        $this->page = ($this->state->getPage() + 1);
        $this->limit = $this->state->getLimit();
        $this->totalPages = $this->state->getTotalPages();
        $this->totalItems = $this->state->getTotalItems();
    }
    
    public function gridStateChange(array $state)
    {
        $this->limit = $state['limit'];
        $this->totalPages = $state['totalPages'];
        $this->totalItems = $state['totalItems'];
    }

    public function decrementPage()
    {
        $this->page--;
    }

    public function incrementPage()
    {
        $this->page++;
    }
    
    public function updatingLimit(string $limit)
    {
        $this->showLimitMenu = false;
        return (int)$limit;
    }
}
