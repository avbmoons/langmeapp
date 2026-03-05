<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Words\CreateRequest;
use App\Http\Requests\Words\EditRequest;
use App\Models\Word;
use App\QueryBuilders\ThemesQueryBuilder;
use App\QueryBuilders\WordsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WordsQueryBuilder $wordsQueryBuilder): View
    {
        return view('admin.words.index', [
            'wordsList' => $wordsQueryBuilder->getWordsWithPagination(),    // getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ThemesQueryBuilder $themesQueryBuilder): View
    {
        return \view('admin.words.create', [
            'themes' => $themesQueryBuilder->getAll(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $word = Word::create($request->validated());

        if ($word) {
            $word->themes()->attach($request->getThemeIds());
            return \redirect()->route('admin.words.index')->with('success', "Word already saved");
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
    public function edit(Word $word, ThemesQueryBuilder $themesQueryBuilder): View
    {
        return \view('admin.words.edit', [
            'word' => $word,
            'themes' => $themesQueryBuilder->getAll(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Word $word): RedirectResponse
    {
        $word = $word->fill($request->validated());

        if ($word->save()) {
            $word->themes()->sync((array) $request->getThemeIds());
            return \redirect()->route('admin.words.index', ['page' => request('page')])->with('success', 'Word already updated');
        }
        return \back()->with('error', 'Not updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        try {
            $word->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
