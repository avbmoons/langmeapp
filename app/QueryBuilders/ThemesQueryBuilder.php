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

    public function getThemesActive():Collection
    {
        return Theme::query()->where('status', 'active')->get();
    }

    public function getThemesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        $search = request()->query('search');

        return Theme::query()
            ->when($search, function ($q) use ($search) {
                $q->where(function($inner) use ($search) {
                    $inner->where('title', 'LIKE', "%{$search}%")
                            ->orWhere('title_base', 'LIKE', "%{$search}%")
                            ->orWhere('description', 'LIKE', "%{$search}%")
                            ->orWhere('status', 'LIKE', "%{$search}%")
                            ->orWhere('code', 'LIKE', "%{$search}%")
                            ->orWhere('id', $search);
                });
            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

    }

}