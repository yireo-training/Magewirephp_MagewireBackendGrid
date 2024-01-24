<?php

declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Grid\DataProvider;

use Magento\Framework\Api\ExtensibleDataInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magewirephp\MagewireBackendGrid\Grid\State;

interface GridDataProviderInterface extends ArgumentInterface
{
    /**
     * @param State $state
     * @return GridDataProviderInterface
     */
    public function setState(State $state): GridDataProviderInterface;
    
    /**
     * @return ExtensibleDataInterface[]
     */
    public function getItems(): array;
    
    /**
     * @return array
     */
    public function getColumns(): array;
}
