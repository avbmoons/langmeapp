<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Position;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Langs\CreateRequest;
use App\Http\Requests\Langs\EditRequest;
use App\Models\Lang;
use App\QueryBuilders\LangsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LangsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LangsQueryBuilder $langsQueryBuilder): View
    {
        return view('admin.langs.index', [
            'langsList' => $langsQueryBuilder->getLangsWithPagination(),    // getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.langs.create', [
            'statuses' => Status::all(),
            'positions' => Position::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $lang = Lang::create($request->validated());

        if ($lang->save()) {
            return \redirect()->route('admin.langs.index');
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
    public function edit(Lang $lang): View
    {
        return \view('admin.langs.edit', [
            'lang' => $lang,
            'statuses' => Status::all(),
            'positions' => Position::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Lang $lang): RedirectResponse
    {
        $lang = $lang->fill($request->validated());

        if ($lang->save()) {
            return redirect()->route('admin.langs.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lang $lang)
    {
        try {
            $lang->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
