<?php declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\View\Element\Template;

class BlockRenderer implements ArgumentInterface
{
    private Template|null $block = null;

    /**
     * @param Template|null $block
     * @return void
     */
    public function setBlock(?Template $block): void
    {
        $this->block = $block;
    }

    /**
     * @param string $childName
     * @return string
     */
    public function getChildHtml(string $childName): string
    {
        $childBlock = $this->block->getChildBlock($childName);
        if (!$childBlock) {
            return '';
        }

        return (string) $childBlock->toHtml();
        //return (string) $childBlock->setMagewire($this->block->getMagewire())->toHtml();
    }
}
