<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Themes\CreateRequest;
use App\Http\Requests\Themes\EditRequest;
use App\Models\Theme;
use App\QueryBuilders\ThemesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ThemesQueryBuilder $themesQueryBuilder): View
    {
        return view('admin.themes.index', [
            'themesList' => $themesQueryBuilder->getThemesWithPagination(), // getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.themes.create', [
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $theme = Theme::create($request->validated());

        if ($theme->save()) {
            return \redirect()->route('admin.themes.index');
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
    public function edit(Theme $theme): View
    {
        return \view('admin.themes.edit', [
            'theme' => $theme,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Theme $theme): RedirectResponse
    {
        $theme = $theme->fill($request->validated());

        if ($theme->save()) {
            return redirect()->route('admin.themes.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        try {
            $theme->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
