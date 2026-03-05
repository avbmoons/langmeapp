<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\CreateRequest;
use App\Http\Requests\Tasks\EditRequest;
use App\Models\Task;
use App\QueryBuilders\LangsQueryBuilder;
use App\QueryBuilders\ModesQueryBuilder;
use App\QueryBuilders\TasksQueryBuilder;
use App\QueryBuilders\ThemesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TasksQueryBuilder $tasksQueryBuilder): View
    {
        return view('admin.tasks.index', [
            'tasksList' => $tasksQueryBuilder->getTasksWithPagination(),    // getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ThemesQueryBuilder $themesQueryBuilder, LangsQueryBuilder $langsQueryBuilder, ModesQueryBuilder $modesQueryBuilder): View
    {
        return \view('admin.tasks.create', [
            'modes' => $modesQueryBuilder->getAll(),
            'themes' => $themesQueryBuilder->getAll(),
            'langs' => $langsQueryBuilder->getAll(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $task = Task::create($request->validated());

        if ($task) {
            $task->langs()->attach($request->getLangIds());
            $task->themes()->attach($request->getThemeIds());
            return \redirect()->route('admin.tasks.index')->with('success', 'Task already saved');
        }
        return \back()->with('error', 'Not saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task, ModesQueryBuilder $modesQueryBuilder, LangsQueryBuilder $langsQueryBuilder, ThemesQueryBuilder $themesQueryBuilder): View
    {
        return \view('admin.tasks.edit', [
            'task' => $task,
            'modes' => $modesQueryBuilder->getAll(),
            'langs' => $langsQueryBuilder->getAll(),
            'themes' => $themesQueryBuilder->getAll(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Task $task): RedirectResponse
    {
        $task = $task->fill($request->validated());

        if ($task->save()) {
            $task->langs()->sync((array) $request->getLangIds());
            $task->themes()->sync((array) $request->getThemeIds());
            return \redirect()->route('admin.tasks.index', ['page' => request('page')])->with('success', 'Task already updated');
        }
        return \back()->with('error', 'Not updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $task->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
