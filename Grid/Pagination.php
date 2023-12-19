<?php
declare(strict_types=1);

namespace Magewirephp\MagewireBackendGrid\Grid\DataProvider;

class Pagination
{
    public function __construct(
        private int $page,
        private int $limit,
        private int $totalPages,
        private int $totalItems
    ) {
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function getTotalItems(): int
    {
        return $this->totalItems;
    }
}
