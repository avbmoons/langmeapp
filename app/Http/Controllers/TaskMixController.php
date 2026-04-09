<?php

namespace App\Http\Controllers;

use App\QueryBuilders\LangsQueryBuilder;
use App\QueryBuilders\LexiconsQueryBuilder;
use App\QueryBuilders\ModesQueryBuilder;
use App\QueryBuilders\PatternsQueryBuilder;
use App\QueryBuilders\ThemesQueryBuilder;
use App\QueryBuilders\WordsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskMixController extends Controller
{
    public function index(LangsQueryBuilder $langsQueryBuilder, ThemesQueryBuilder $themesQueryBuilder, ModesQueryBuilder $modesQueryBuilder, WordsQueryBuilder $wordsQueryBuilder, PatternsQueryBuilder $patternsQueryBuilder, LexiconsQueryBuilder $lexiconsQueryBuilder):View
    {
        return (\view('taskMix.index', [
            'langs' => $langsQueryBuilder->getLangsActive()->toArray(),
            'themes' => $themesQueryBuilder->getThemesActive()->toArray(),
            'modes' => $modesQueryBuilder->getModesActive()->toArray(),
            'words' => $wordsQueryBuilder->getWordsWithThemes()->toArray(),
            //'words' => $wordsQueryBuilder->getWordsActive()->toArray(),
            'patterns' => $patternsQueryBuilder->getPatternsActive()->toArray(),
            'patternRus' => $lexiconsQueryBuilder->getLexiconsByPatternActive(9)->toArray(),
            'patternEng' => $lexiconsQueryBuilder->getLexiconsByPatternActive(1)->toArray(),
            'patternArm' => $lexiconsQueryBuilder->getLexiconsByPatternActive(2)->toArray(),
            'patternGre' => $lexiconsQueryBuilder->getLexiconsByPatternActive(3)->toArray(),
            'patternFin' => $lexiconsQueryBuilder->getLexiconsByPatternActive(4)->toArray(),
            'patternLav' => $lexiconsQueryBuilder->getLexiconsByPatternActive(5)->toArray(),
        ]));
    }
}
