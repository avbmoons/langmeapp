<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\Mode;
use App\Models\Theme;
use App\Models\Word;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request):View
    {
        $modesCh = Mode::pluck('title');
        $modesString = Mode::pluck('status');

        $langsCh = Lang::pluck('alias');
        $langsString = Lang::pluck('status');

        $wordsSt = Word::pluck('status');

        $themesSt = Theme::pluck('status');
        $themesCh = Theme::pluck('title');

        $wordsWithThemes = Word::with('themes')->get();
        $themesWithWords = Theme::with('words')->get();

        return \view('about.index', compact('modesCh', 'modesString', 'langsCh', 'langsString', 'wordsSt', 'themesSt', 'themesCh', 'wordsWithThemes', 'themesWithWords'));
    }
}
