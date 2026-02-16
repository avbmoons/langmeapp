<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ModesController extends Controller
{

    use ModesTrait;

    public function index(): View
    {
        //dd($this->getModes());
        return view('modes.index', [
            'modes' => $this->getModes(),
        ]);    // $this->getModes();   // 'Show modes list';
    }

    public function show($id): View
    {
        return view('modes.show', ['modes' => $this->getModes($id),
        ]);   // $this->getModes($id);    // 'Show mode with #ID ' . $id;
    }
}
