<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Mode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class ModesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Mode::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getModesByStatus(string $status): Collection
    {
        return Mode::query()->where('status', $status)->get();
    }

    public function getModesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}