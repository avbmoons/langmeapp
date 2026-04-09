<?php

namespace App\Http\Controllers;

use App\QueryBuilders\LangsQueryBuilder;
use App\QueryBuilders\ModesQueryBuilder;
use App\QueryBuilders\ThemesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(
        LangsQueryBuilder $langsQueryBuilder, ThemesQueryBuilder $themesQueryBuilder, ModesQueryBuilder $modesQueryBuilder):View
    {
        return (\view('home.index', [
            'langs' => $langsQueryBuilder->getLangsActive()->toArray(), //getLangsActive(),
            'themes' => $themesQueryBuilder->getThemesActive()->toArray(),   //getThemesActive(),
            'modes' => $modesQueryBuilder->getModesActive()->toArray(),    //getModesActive(),
        ]));
    }
}
