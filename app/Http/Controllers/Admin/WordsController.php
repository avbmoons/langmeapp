<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\QueryBuilders\WordsQueryBuilder;
use Illuminate\Contracts\View\View;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
