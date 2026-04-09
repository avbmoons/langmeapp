<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Pattern;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class PatternsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Pattern::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getPatternsByStatus(string $status): Collection
    {
        return Pattern::query()->where('status', $status)->get();
    }

    public function getPatternsActive():Collection
    {
        return Pattern::query()->where('status', 'active')->get();
    }

    public function getPatternsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}