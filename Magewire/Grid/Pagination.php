<?php declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Magewire\Grid;

use Magewirephp\Magewire\Component;
use Magewirephp\MagewireBackendGrid\Magewire\Grid;

class Pagination extends Component
{
    public int $page = 1;
    public int $limit = 0;
    public int $totalPages = 0;
    public int $totalItems = 0;

    protected $listeners = [
        'grid_pagination_change' => 'gridPaginationChange'
    ];

    public function gridPaginationChange(Grid $grid)
    {
        $this->page = $grid->page;
        $this->limit = $grid->limit;
        $this->totalPages = $grid->totalPages;
        $this->totalItems = $grid->totalItems;
    }

    public function decrementPage()
    {
        $this->page--;
        $this->loadData();
    }

    public function incrementPage()
    {
        $this->page++;
        $this->loadData();
    }
}
