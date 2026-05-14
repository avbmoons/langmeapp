<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Jobs\JobTaskStore;
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
        $dataMode = $request->input('dataToSend.dataMode');
        $dataLangs = $request->input('dataToSend.dataLangs');
        $dataThemes = $request->input('dataToSend.dataThemes');

        $dataEnjoy = $request->input('dataToSend.dataEnjoy');
        $dataNeutral = $request->input('dataToSend.dataNeutral');
        $dataWorry = $request->input('dataToSend.dataWorry');

        $numEnjoy = $dataEnjoy;
        $numNeutral = $dataNeutral;
        $numWorry = $dataWorry;

        $mode = Mode::where('title', $dataMode)->first();
        $modeId = $mode->id;


        $langsIds = Lang::whereIn('title', $dataLangs)
                    ->pluck('id');

        $themesIds = Theme::whereIn('title', $dataThemes)
                    ->pluck('id');

        $taskStatus = Status::ACTIVE;
        
        $userId = auth()->id();
        
        // $taskData = [
        //     'mode_id' => $modeId,
        //     'langs_ids' => $langsIds,
        //     'themes_ids' => $themesIds,
        //     'num_enjoy' => $numEnjoy,
        //     'num_normal' => $numNeutral,
        //     'num_wory' => $numWorry,
        //     'status' => $taskStatus,
        //     'user_id' => $userId,
        // ];

        //JobTaskStore::dispatch($taskData);

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

        return response()
                //->json(['status' => 'queued'], 202);
                ->json(['success' => true, 'data' => $task]);
    }
}
