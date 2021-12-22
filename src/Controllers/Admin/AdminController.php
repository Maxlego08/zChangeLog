<?php

namespace Azuriom\Plugin\Zchangelog\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Show the home admin page of the plugin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('zchangelog::admin.index');
    }

    /**
     * Create a new changelog
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(){
        return view('zchangelog::admin.create');
    }
}
