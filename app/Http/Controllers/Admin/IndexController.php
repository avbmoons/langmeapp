<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\Mode;
use App\Models\Theme;
use App\Models\Word;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $modesCh = Mode::pluck('title');   //all();
        $modesString = Mode::pluck('status');

        $langsCh = Lang::pluck('alias');
        $langsString = Lang::pluck('status');

        $wordsSt = Word::pluck('status');

        $themesSt = Theme::pluck('status');
        $themesCh = Theme::pluck('title');
        
        $wordsWithThemes = Word::with('themes')->get();
        $themesWithWords = Theme::with('words')->get();

        return \view('admin.index', compact('modesCh', 'modesString', 'langsCh', 'langsString', 'wordsSt', 'themesSt', 'themesCh', 'wordsWithThemes', 'themesWithWords'));
    }
}
