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
    
    public function updatedSearch(string $value)
    {
        $this->state->setSearch($value);
        $this->emit('grid_search');
        return $value;
    }
}
