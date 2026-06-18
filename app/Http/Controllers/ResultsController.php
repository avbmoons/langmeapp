<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Task;
use App\Models\Theme;
use App\Models\User;
use App\QueryBuilders\LangsQueryBuilder;
use App\QueryBuilders\TasksQueryBuilder;
use App\QueryBuilders\ThemesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(TasksQueryBuilder $tasksQueryBuilder, LangsQueryBuilder $langsQueryBuilder, ThemesQueryBuilder $themesQueryBuilder, Request $request): View
    {
        $themes = Theme::pluck('title', 'id'); 
        $langs = Lang::pluck('title', 'id');    
        $users = User::pluck('name', 'id');
        $tasksList = Task::where('user_id', Auth::id())->get(); 

        return view('results.index', [
            'tasksList' => $tasksList, 
            'themes' => $themes,
            'langs' => $langs,
            'users' => $users,
        ]);
    }
}
