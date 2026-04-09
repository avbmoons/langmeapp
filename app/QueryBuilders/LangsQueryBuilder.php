<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Lang;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class LangsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Lang::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getLangsByStatus(string $status): Collection
    {
        return Lang::query()->where('status', $status)->get();
    }

    public function getLangsActive():Collection
    {
        return Lang::query()->where('status', 'active')->get();
    }

    public function getLangsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}