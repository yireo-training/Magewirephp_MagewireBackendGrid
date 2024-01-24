<?php declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Magewire\Grid;

use Magewirephp\Magewire\Component;
use Magewirephp\MagewireBackendGrid\Grid\State;

class Pagination extends Component
{
    public $page = 0;
    public $limit = 0;
    public int $totalPages = 0;
    public int $totalItems = 0;
    public bool $showLimitMenu = false;

    protected $listeners = [
        'grid_state_change' => 'onGridStateChange'
    ];
    
    public function __construct(
        private State $state
    ) {
    }
    
    public function boot()
    {
        $this->page = $this->state->getPage();
        $this->limit = $this->state->getLimit();
        $this->totalPages = $this->state->getTotalPages();
        $this->totalItems = $this->state->getTotalItems();
    }
    
    public function onGridStateChange()
    {
        $this->page = $this->state->getPage();
        $this->limit = $this->state->getLimit();
        $this->totalPages = $this->state->getTotalPages();
        $this->totalItems = $this->state->getTotalItems();
    }

    public function decrementPage()
    {
        $page = $this->state->getPage();
        $page--;
        $this->changePage($page);
    }

    public function incrementPage()
    {
        $page = $this->state->getPage();
        $page++;
        $this->changePage($page);
    }
    
    public function updatingPage(string $page)
    {
        $this->changePage($page);
        return $page;
    }
    
    public function updatingLimit($limit)
    {
        $this->showLimitMenu = false;
        $this->changeLimit($limit);
        return (int)$limit;
    }
    
    private function changePage($page)
    {
        $page = (int)$page;
        $this->page = $page;
        $this->state->setPage($page);
        $this->emit('grid_state_change');
    }
    
    private function changeLimit($limit)
    {
        $limit = (int)$limit;
        $this->limit = $limit;
        $this->state->setLimit($limit);
        $this->emit('grid_state_change');
    }
}
