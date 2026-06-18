<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Lang;
use App\Models\Task;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

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

    public function getTasksWithPagination(int $quantity = 5): LengthAwarePaginator
    {
        $search = request()->query('search');

        return Task::query()
            ->with(['users', 'langs', 'themes', 'modes'])
            ->when($search, function ($q) use ($search) {
                $themeIds = DB::table('themes')->where('title', 'like', "%{$search}%")->pluck('id')->toArray();
                $langIds = DB::table('langs')->where('title', 'like', "%{$search}%")->pluck('id')->toArray();

                $q->where(function($inner) use ($search, $themeIds, $langIds) {
                    $inner->where('id', $search)
                        ->orWhere('status', 'LIKE', "%{$search}%")
                        ->orWhereHas('users', function($userQuery) use ($search) {
                            $userQuery->where('name', 'LIKE', "%{$search}%");
                        })
                        ->orWhereHas('modes', function($modeQuery) use ($search) {
                            $modeQuery->where('title', 'LIKE', "%{$search}%");
                        });

                    foreach ($themeIds as $id) {
                        $inner->orWhereJsonContains('themes_ids', (int)$id);
                    }
                    foreach ($langIds as $id) {
                        $inner->orWhereJsonContains('langs_ids', (int)$id);
                    }
                });
            })
            ->orderBy('id', 'desc') // 'asc'
            ->paginate(5)
            ->withQueryString();
    }

}