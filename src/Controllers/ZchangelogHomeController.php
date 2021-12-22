<?php

namespace Azuriom\Plugin\Zchangelog\Controllers;

use Azuriom\Http\Controllers\Controller;

class ZchangelogHomeController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('zchangelog::index');
    }
}
