<?php
declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Magewire\Grid;

use Magewirephp\Magewire\Component;
use Magewirephp\MagewireBackendGrid\Grid\State;

class Records extends Component
{
    public int $records = 0;
    
    protected $listeners = [
        'grid_state_change' => 'gridStateChange'
    ];
    
    public function __construct(
        private State $state
    ) {
    }
    
    public function boot()
    {
        $this->records = $this->state->getTotalItems();
    }
    
    public function gridStateChange()
    {
        $this->records = $this->state->getTotalItems();
    }
}
