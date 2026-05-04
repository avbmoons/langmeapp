<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class UsersQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getUserById(int $id): Collection
    {
        return User::query()->where('id', $id)->get();
    }

    // public function getUsersByIsAdmin(string $isAdmin): Collection
    // {
    //     return User::query()->where('is_admin', $isAdmin)->get();
    // }

    public function getUsersWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}