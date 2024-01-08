<?php

namespace App\DTO\Request;

class DataTableRequest
{
    public const MAX_RESULTS = 10;

    private ?string $orderColumn = null;
    private ?string $orderDir = null;
    private array $search = [];

    public function __construct(
        private ?int    $draw = null,
        private int     $start = 0,
        private int     $length = 0,
        private ?array  $columns = null,
        private ?array  $order = null,
    ) {
        $this->orderColumn = $this->order[0]['column'] ?? 0;
        $this->orderDir = $this->order[0]['dir'] ?? 'asc';
        if (!empty($this->columns)) {
            foreach ($this->columns as $item) {
                $this->search[$item['data']] = $item['search']['value'] ?? null;
            }
        }
    }

    public function getDraw(): ?int
    {
        return $this->draw;
    }

    public function getStart(): int
    {
        return $this->start;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getColumns($mapped = false): ?array
    {
        if (!$mapped) {
            return $this->columns;
        }

        return array_map(function (array $column) {
            return $column['data'];
        }, $this->columns);
    }

    public function getOrderColumn(): ?string
    {
        return $this->orderColumn;
    }

    public function getOrderDir(): ?string
    {
        return $this->orderDir;
    }

    public function getSearch(): array
    {
        return $this->search;
    }
}
