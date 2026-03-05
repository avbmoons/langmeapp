<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lexicons\CreateRequest;
use App\Http\Requests\Lexicons\EditRequest;
use App\Models\Lexicon;
use App\QueryBuilders\LexiconsQueryBuilder;
use App\QueryBuilders\PatternsQueryBuilder;
use App\QueryBuilders\WordsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LexiconsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LexiconsQueryBuilder $lexiconsQueryBuilder, PatternsQueryBuilder $patternsQueryBuilder, WordsQueryBuilder $wordsQueryBuilder): View
    {
        return view('admin.lexicons.index', [
            'patterns' => $patternsQueryBuilder->getAll(),
            'words' => $wordsQueryBuilder->getAll(),
            'lexiconsList' =>$lexiconsQueryBuilder->getLexiconsWithPagination(),    // getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PatternsQueryBuilder $patternsQueryBuilder, WordsQueryBuilder $wordsQueryBuilder): View
    {
        return view('admin.lexicons.create', [
            'patterns' => $patternsQueryBuilder->getAll(),
            'words' => $wordsQueryBuilder->getAll(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $lexicon = Lexicon::create($request->validated());

        if ($lexicon->save()) {
            return \redirect()->route('admin.lexicons.index')->with('success', 'Lexicon already saved');
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
    public function edit(Lexicon $lexicon, PatternsQueryBuilder $patternsQueryBuilder, WordsQueryBuilder $wordsQueryBuilder): View
    {
        return \view('admin.lexicons.edit', [
            'lexicon' => $lexicon,
            'patterns' => $patternsQueryBuilder->getAll(),
            'words' => $wordsQueryBuilder->getAll(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Lexicon $lexicon)
    {
        $lexicon = $lexicon->fill($request->validated());

        if ($lexicon->save()) {
            return \redirect()->route('admin.lexicons.index', ['page' => request('page')])->with('success', 'Lexicon already updated');
        }
        return \back()->with('error', 'Not updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lexicon $lexicon)
    {
        try {
            $lexicon->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
