<?php declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Magewire\Hydrator;

use Magewirephp\Magewire\Component;
use Magewirephp\Magewire\Model\HydratorInterface;
use Magewirephp\Magewire\Model\RequestInterface;
use Magewirephp\Magewire\Model\ResponseInterface;
use Magewirephp\MagewireBackendGrid\Grid\State;
use Magewirephp\MagewireBackendGridExample\GridDataProvider\ProductGridDataProvider;

class DataProviderHydrator implements HydratorInterface
{
    public function __construct(
        private State $state,
        private ProductGridDataProvider $productGridDataProvider
    ) {
    }
    
    public function hydrate(Component $component, RequestInterface $request): void
    {
        $this->productGridDataProvider->setState($this->state);
        $this->productGridDataProvider->getItems();
    }
    
    public function dehydrate(Component $component, ResponseInterface $response): void
    {
    }
}
