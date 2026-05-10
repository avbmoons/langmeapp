<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Lang;
use App\Models\Mode;
use App\Models\Task;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create() 
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request->user());

        $dataMode = $request->input('dataToSend.dataMode');
        $dataLangs = $request->input('dataToSend.dataLangs');
        $dataThemes = $request->input('dataToSend.dataThemes');

        $dataEnjoy = $request->input('dataToSend.dataEnjoy');
        $dataNeutral = $request->input('dataToSend.dataNeutral');
        $dataWorry = $request->input('dataToSend.dataWorry');

        //dd($request->all());

        // $dataLangsArr = is_array($dataLangs) ? $dataLangs : (is_string($dataLangs) ? json_decode($dataLangs, true) : []);
        // $dataThemesArr = is_array($dataThemes) ? $dataThemes : (is_string($dataThemes) ? json_decode($dataThemes, true) : []);
        //$dataModeTrim = trim($dataMode);
        //dd($request->input('dataToSend.dataThemes'));

        //$mode = Mode::all();
        //dd($mode);
        $numEnjoy = $dataEnjoy;
        $numNeutral = $dataNeutral;
        $numWorry = $dataWorry;

        $mode = Mode::where('title', $dataMode)->first();
        $modeId = $mode->id;
        //dd($mode);
        // if ($mode) {
        //     $modeId = $mode->id;
        //     //dd($modeId);
        //     return $modeId;
        // } else {
        //     $modeId = 0;
        // }
        //dd($modeId);

        //$modeId = $mode->id;    // $mode ? $mode->id : 1;

        
        // $task->langs_ids = array_map('intval', $dataLangsArr);
        // $task->themes_ids = array_map('intval', $dataThemesArr);
        // if (is_array($dataLangs)) {
        //     return dd($dataLangs);
        // } else {
        //     dd("No titles");
        // }
        $langsTitles = Lang::whereIn('title', $dataLangs)
                    ->pluck('title')
                    ->toArray();

        //dd($langsTitles);

        $langsIds = Lang::whereIn('title', $dataLangs)
                    ->pluck('id');
                    //->map(fn($id) => (int)$id)
                    //->toArrary();

        //dd($langsIds);

        $themesTitles = Theme::whereIn('title', $dataThemes)
                    ->pluck('title')
                    ->toArray();

        //dd($themesTitles);

        $themesIds = Theme::whereIn('title', $dataThemes)
                    ->pluck('id');

        //dd($themesIds);

        $taskStatus = Status::ACTIVE;
        //$taskUser;
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     dd($user);
        //     //$userId = $user->id;
        // } else {
        //     //$userId = 0;
        //     $user = "Not auth";
        //     dd($user);
        // }
        
        $userId = auth()->id();

        $task = new Task();
        
        $task->mode_id = $modeId;

        $task->langs_ids = $langsIds;
        $task->themes_ids = $themesIds;

        $task->num_enjoy = $numEnjoy;
        $task->num_normal = $numNeutral;
        $task->num_worry = $numWorry;

        $task->status = $taskStatus;
        $task->user_id = $userId;

        $task->save();

        return response()->json(['success' => true, 'data' => $task]);
    }
}
