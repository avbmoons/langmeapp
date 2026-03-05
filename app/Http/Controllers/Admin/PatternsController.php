<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patterns\CreateRequest;
use App\Http\Requests\Patterns\EditRequest;
use App\Models\Pattern;
use App\QueryBuilders\LangsQueryBuilder;
use App\QueryBuilders\PatternsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PatternsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PatternsQueryBuilder $patternsQueryBuilder, LangsQueryBuilder $langsQueryBuilder): View
    {
        return view('admin.patterns.index', [
            'langs' => $langsQueryBuilder->getAll(),
            'patternsList' => $patternsQueryBuilder->getPatternsWithPagination(),   // getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(LangsQueryBuilder $langsQueryBuilder): View
    {
        return view('admin.patterns.create', [
            'langs' => $langsQueryBuilder->getAll(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $pattern = Pattern::create($request->validated());

        if ($pattern->save()) {
            return \redirect()->route('admin.patterns.index')->with('success', 'Pattern already saved');
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
    public function edit(Pattern $pattern, LangsQueryBuilder $langsQueryBuilder): View
    {
        return \view('admin.patterns.edit', [
            'pattern' => $pattern,
            'langs' => $langsQueryBuilder->getAll(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Pattern $pattern)
    {
        $pattern = $pattern->fill($request->validated());

        if ($pattern->save()) {
            return \redirect()->route('admin.patterns.index', ['page' => request('page')])->with('success', 'Pattern already updated');
        }
        return \back()->with('error', 'Not updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pattern $pattern)
    {
        try {
            $pattern->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
