<?php declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Magewire\Grid;

use Magewirephp\Magewire\Component;
use Magewirephp\MagewireBackendGrid\Grid\State;

class Actions extends Component
{
    protected $listeners = [
        'grid_state_change2' => 'gridStateChange'
    ];
    
    public function __construct(
        private State $state
    ) {
    }
    
    public function gridStateChange()
    {
    }
}
