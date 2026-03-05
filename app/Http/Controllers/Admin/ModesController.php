<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Modes\CreateRequest;
use App\Http\Requests\Modes\EditRequest;
use App\Models\Mode;
use App\QueryBuilders\ModesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ModesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ModesQueryBuilder $modesQueryBuilder): View
    {
        return view('admin.modes.index', [
            'modesList' => $modesQueryBuilder->getModesWithPagination(),    // getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.modes.create', [
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $mode = Mode::create($request->validated());

        if ($mode->save()) {
            return \redirect()->route('admin.modes.index');
        }
        return \back();
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
    public function edit(Mode $mode): View
    {
        return \view('admin.modes.edit', [
            'mode' => $mode,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Mode $mode): RedirectResponse
    {
        $mode = $mode->fill($request->validated());

        if ($mode->save()) {
            return redirect()->route('admin.modes.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mode $mode)
    {
        try {
            $mode->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
