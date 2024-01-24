<?php declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Magewire\Grid;

use Magewirephp\Magewire\Component;
use Magewirephp\MagewireBackendGrid\Grid\State;

class Spinner extends Component
{
    public bool $loading = false;
    
    protected $listeners = [
        'grid_state_change2' => 'gridStateChange'
    ];
    
    public function __construct(
        private State $state
    ) {
    }
    
    public function boot(): void
    {
        $this->loading = $this->state->isLoading();
    }
    
    public function gridStateChange()
    {
        $this->loading = $this->state->isLoading();
    }
}
