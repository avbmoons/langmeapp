<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class TasksQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Task::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getTasksByStatus(string $status): Collection
    {
        return Task::query()->where('status', $status)->get();
    }

    public function getTasksWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}