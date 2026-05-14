<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\CreateRequest;
use App\Http\Requests\Tasks\EditRequest;
use App\Models\Lang;
use App\Models\Task;
use App\Models\Theme;
use App\Models\User;
use App\QueryBuilders\LangsQueryBuilder;
use App\QueryBuilders\ModesQueryBuilder;
use App\QueryBuilders\TasksQueryBuilder;
use App\QueryBuilders\ThemesQueryBuilder;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TasksQueryBuilder $tasksQueryBuilder, ThemesQueryBuilder $themesQueryBuilder, LangsQueryBuilder $langsQueryBuilder, Request $request): View
    {
        $themes = Theme::pluck('title', 'id'); 
        $langs = Lang::pluck('title', 'id');    
        $users = User::pluck('name', 'id');

        $tasks = $tasksQueryBuilder
                ->getTasksWithPagination();
        
        return view('admin.tasks.index', [
            'tasksList' => $tasks,  // $tasksQueryBuilder->getTasksWithPagination(),    // getAll(),
            'themes' => $themes,
            'langs' => $langs,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ThemesQueryBuilder $themesQueryBuilder, LangsQueryBuilder $langsQueryBuilder, ModesQueryBuilder $modesQueryBuilder, UsersQueryBuilder $usersQueryBuilder): View
    {
        return \view('admin.tasks.create', [
            'modes' => $modesQueryBuilder->getAll(),
            'themes' => $themesQueryBuilder->getAll(),
            'langs' => $langsQueryBuilder->getAll(),
            'statuses' => Status::all(),
            'users' => $usersQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        

        $task = Task::create($request->validated());

        //Task::query()->update([])

        if ($task) {
            $themeIds = $request->getThemeIds();
            $langIds = $request->getLangIds();

            $task->themes()->attach($themeIds);
            $task->langs()->attach($langIds);
            // foreach ($themeIds as $id) {
            //     DB::table('theme_has_tasks')->insert([
            //         'task_id' => $task->id,
            //         'theme_id' => $id,
            //     ]);
            // }
            // foreach ($langIds as $id) {
            //     DB::table('lang_has_tasks')->insert([
            //         'task_id' => $task->id,
            //         'lang_id' => $id,
            //     ]);
            // }
            // $task->themes_ids = $request->input('theme_ids');
            // $task->langs_ids = $request->input('lang_ids');

            // // $langIds = $request->input('lang_ids');
            // // $themeIds = $request->input('theme_ids');
            // //dd($themeIds);
            
            // $task->langs()->attach($request->getLangIds());
            // $task->themes()->attach($request->getThemeIds());

            // // $task->langs()->sync($request->getLangIds());
            // // $task->themes()->sync($request->getThemeIds());

            // //$task->langs()->attach($request->input('lang_ids')->getLangIds());
            // //$task->themes()->attach($request->input('theme_ids')->getThemeIds());

            $task->save();
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
    public function edit(Task $task, ModesQueryBuilder $modesQueryBuilder, LangsQueryBuilder $langsQueryBuilder, ThemesQueryBuilder $themesQueryBuilder, UsersQueryBuilder $usersQueryBuilder): View
    {
        return \view('admin.tasks.edit', [
            'task' => $task,
            'modes' => $modesQueryBuilder->getAll(),
            'langs' => $langsQueryBuilder->getAll(),
            'themes' => $themesQueryBuilder->getAll(),
            'statuses' => Status::all(),
            'users' => $usersQueryBuilder->getAll(),
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
