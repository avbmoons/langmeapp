<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class ThemesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Theme::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getThemesByStatus(string $status): Collection
    {
        return Theme::query()->where('status', $status)->get();
    }

    public function getThemesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}