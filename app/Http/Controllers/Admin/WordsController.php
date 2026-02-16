<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $model = new Word();
        $wordsList = $model->getWords();
        //$wordsList
        $join = DB::table('words')
            ->join('theme_has_words as thw', 'words.id', '=', 'thw.id_word')
            ->join('themes', 'thw.id_theme', '=', 'themes.id')
            ->select('words.*', 'thw.id_theme')
            ->get();
        //dd($modesList);
        //dd($model->getModeById(4));
        //dd($join);
        return view('admin.words.index', [
            'wordsList' => $wordsList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.words.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
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
