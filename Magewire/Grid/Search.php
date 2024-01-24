<?php declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Magewire\Grid;

use Magewirephp\Magewire\Component;
use Magewirephp\MagewireBackendGrid\Grid\State;

class Search extends Component
{
    public string $search = '';
    
    public function __construct(
        private State $state
    ) {
    }
    
    public function boot(): void
    {
        $this->search = $this->state->getSearch();
    }
    
    public function updatedSearch(string $value)
    {
        $this->state->setSearch($value);
        $this->emit('grid_state_change');
        return $value;
    }
}
