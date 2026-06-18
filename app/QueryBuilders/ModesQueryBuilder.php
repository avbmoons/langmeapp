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

    public function getModesActive():Collection
    {
        return Mode::query()->where('status', 'active')->get();
    }

    public function getModesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        $search = request()->query('search');

        return Mode::query()
            ->when($search, function ($q) use ($search) {
                $q->where(function($inner) use ($search) {
                    $inner->where('title', 'LIKE', "%{$search}%")
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