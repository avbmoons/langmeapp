<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mode;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ModesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $model = new Mode();
        $modesList = $model->getModes();
        //dd($modesList);
        //dd($model->getModeById(4));
        return view('admin.modes.index', [
            'modesList' => $modesList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.modes.create');
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
