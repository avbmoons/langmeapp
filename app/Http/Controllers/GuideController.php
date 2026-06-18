<?php

namespace App\Http\Controllers;

use App\QueryBuilders\LangsQueryBuilder;
use App\QueryBuilders\ModesQueryBuilder;
use App\QueryBuilders\ThemesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(LangsQueryBuilder $langsQueryBuilder, ThemesQueryBuilder $themesQueryBuilder, ModesQueryBuilder $modesQueryBuilder): View
    {
        return view('guide.index', [
            'langsList' => $langsQueryBuilder->getLangsActive(),
            'themesList' => $themesQueryBuilder->getAll(), 
            'modesList' => $modesQueryBuilder->getModesActive(),
        ]);
    }
}
