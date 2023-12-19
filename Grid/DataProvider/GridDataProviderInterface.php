<?php
declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Grid\DataProvider;

use Magento\Framework\Api\ExtensibleDataInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

interface GridDataProviderInterface extends ArgumentInterface
{
    /**
     * @param int $page
     * @param int $limit
     * @param string $search
     * @return ExtensibleDataInterface[]
     */
    public function getItems(int $page = 0, int $limit = 20, string $search = ''): array;

    /**
     * @return int
     */
    public function getTotalItems(): int;

    /**
     * @return int
     */
    public function getTotalPages(int $limit): int;
    
    /**
     * @return array
     */
    public function getColumns(): array;
}
