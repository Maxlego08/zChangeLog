<?php

namespace Azuriom\Plugin\Zchangelog\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\Zchangelog\Models\ChangeLog;
use Azuriom\Plugin\Zchangelog\Requests\ChangeLogRequest;
use Illuminate\Support\Facades\Redirect;

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
    public function create()
    {
        return view('zchangelog::admin.create');
    }

    /**
     * Check if level is valid
     *
     * @param $level
     * @return bool
     */
    private function isLevelValid($level)
    {
        switch ($level) {
            case "info":
            case "danger":
            case "success":
            case "warning":
                return true;
            default:
                return false;
        }
    }

    public function store(ChangeLogRequest $request)
    {
        $updates = $request['changelog'];

        foreach ($updates as $key => $update) {
            if (!$this->isLevelValid($update['level'])) {
                return Redirect::back()->withInput()->withErrors([
                    'changelog[' . $key . '][level]' => trans('zchangelog::admin.errors.level')
                ]);
            }
            $description = $update['description'];
            if (empty($description)){
                return Redirect::back()->withInput()->withErrors([
                    'changelog[' . $key . '][description]' => trans('zchangelog::admin.errors.description.empty')
                ]);
            }
            if (strlen($description) > 1000){
                return Redirect::back()->withInput()->withErrors([
                    'changelog[' . $key . '][description]' => trans('zchangelog::admin.errors.description.length')
                ]);
            }
        }
        $changelog = ChangeLog::create($request->validated());

        return Redirect::back()->withInput();
    }

}
