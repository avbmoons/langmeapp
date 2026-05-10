<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Lang;
use App\Models\Task;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
//use Illuminate\Support\Collection as SupportCollection;

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

    public function getTasksByUserId(int $userId): Collection
    {
        return Task::query()->where('user_id', $userId)->get();
    }

    public function getThemesForTask(mixed $task): Collection
    {
        return Theme::whereIn('id', $task->themes_ids)->get();
    }

    public function getLangsForTask(mixed $task): Collection
    {
        return Lang::whereIn('id', $task->langs_ids)->get();
    }

    public function getTasksWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}