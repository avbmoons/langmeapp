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
        $search = request()->query('search');

        return Lang::query()
            ->when($search, function ($q) use ($search) {
                $q->where(function($inner) use ($search) {
                    $inner->where('title', 'LIKE', "%{$search}%")
                            ->orWhere('native', 'LIKE', "%{$search}%")
                            ->orWhere('alias', 'LIKE', "%{$search}%")
                            ->orWhere('status', 'LIKE', "%{$search}%")
                            ->orWhere('position', 'LIKE', "%{$search}%")
                            ->orWhere('code', 'LIKE', "%{$search}%")
                            ->orWhere('id', $search);
                });
            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();
        
        //$this->model->paginate($quantity);
    }

    // public function getLangsWithPagination(int $quantity = 10): LengthAwarePaginator
    // {
    //     return $this->model->paginate($quantity);
    // }

}