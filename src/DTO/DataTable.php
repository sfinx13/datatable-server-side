<?php

namespace App\DTO;

class DataTable
{
    private ?int $draw = 0;
    private ?int $recordsTotal = 0;
    private ?int $recordsFiltered = 0;
    private array $data = [];

    public function getDraw(): int
    {
        return $this->draw;
    }

    public function setDraw(int $draw): DataTable
    {
        $this->draw = $draw;
        return $this;
    }

    public function getRecordsTotal(): int
    {
        return $this->recordsTotal;
    }

    public function setRecordsTotal(int $recordsTotal): DataTable
    {
        $this->recordsTotal = $recordsTotal;
        return $this;
    }

    public function getRecordsFiltered(): int
    {
        return $this->recordsFiltered;
    }

    public function setRecordsFiltered(int $recordsFiltered): DataTable
    {
        $this->recordsFiltered = $recordsFiltered;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): DataTable
    {
        $this->data = $data;
        return $this;
    }

    public function toArray(): array
    {
        return [
            "draw" => $this->draw,
            "recordsTotal" => $this->recordsTotal,
            "recordsFiltered" => $this->recordsFiltered,
            "data" => $this->data
        ];
    }
}
