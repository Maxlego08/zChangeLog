<?php

namespace Azuriom\Plugin\Zchangelog\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Plugin\Zchangelog\Models\ChangeLog;
use Azuriom\Plugin\Zchangelog\Models\Update;
use Azuriom\Plugin\Zchangelog\Requests\ChangeLogRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Show the home admin page of the plugin.
     *
     * @return Response
     */
    public function index()
    {
        return view('zchangelog::admin.index', [
            'changelogs' => ChangeLog::latest()->paginate(),
        ]);
    }

    /**
     * Create a new changelog
     *
     * @return Application|Factory|View
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

    /**
     * Store changelog
     *
     * @param ChangeLogRequest $request
     * @return RedirectResponse
     */
    public function store(ChangeLogRequest $request): RedirectResponse
    {
        $updates = $request['changelog'];

        foreach ($updates as $key => $update) {
            if (!$this->isLevelValid($update['level'])) {
                return Redirect::back()->withInput()->withErrors([
                    'changelog[' . $key . '][level]' => trans('zchangelog::admin.errors.level')
                ]);
            }
            $description = $update['description'];
            if (empty($description)) {
                return Redirect::back()->withInput()->withErrors([
                    'changelog[' . $key . '][description]' => trans('zchangelog::admin.errors.description.empty')
                ]);
            }
            if (strlen($description) > 1000) {
                return Redirect::back()->withInput()->withErrors([
                    'changelog[' . $key . '][description]' => trans('zchangelog::admin.errors.description.length')
                ]);
            }
        }
        $changelog = ChangeLog::create($request->validated());
        foreach ($updates as $position => $update) {
            Update::create([
                'change_log_id' => $changelog->id,
                'order' => $position,
                'level' => $update['level'],
                'description' => $update['description'],
            ]);
        }

        return Redirect::route('zchangelog.admin.index')->with('success', trans('zchangelog::admin.status.create'));
    }

    /**
     * Edit changelog
     *
     * @param ChangeLog $changeLog
     * @return Application|Factory|View
     */
    public function edit(ChangeLog $changeLog)
    {
        return view('zchangelog::admin.edit', [
            'changelog' => $changeLog,
            'updates' => $changeLog->updates()->orderBy('order')->get(),
        ]);
    }

    /**
     * Update changelog
     *
     * @param ChangeLogRequest $request
     * @param ChangeLog $changeLog
     * @return RedirectResponse
     */
    public function update(ChangeLogRequest $request, ChangeLog $changeLog): RedirectResponse
    {
        $updates = $request['changelog'];

        foreach ($updates as $key => $update) {
            if (!$this->isLevelValid($update['level'])) {
                return Redirect::back()->withInput()->withErrors([
                    'changelog[' . $key . '][level]' => trans('zchangelog::admin.errors.level')
                ]);
            }
            $description = $update['description'];
            if (empty($description)) {
                return Redirect::back()->withInput()->withErrors([
                    'changelog[' . $key . '][description]' => trans('zchangelog::admin.errors.description.empty')
                ]);
            }
            if (strlen($description) > 1000) {
                return Redirect::back()->withInput()->withErrors([
                    'changelog[' . $key . '][description]' => trans('zchangelog::admin.errors.description.length')
                ]);
            }
        }
        $changeLog->update($request->validated());
        foreach ($updates as $position => $values) {

            $update = $changeLog->updates()->where('id', $values['id'] ?? 0)->first();
            if (isset($update)) {
                $update->update([
                    'order' => $position,
                    'level' => $values['level'],
                    'description' => $values['description'],
                ]);
            } else {
                Update::create([
                    'change_log_id' => $changeLog->id,
                    'order' => $position,
                    'level' => $values['level'],
                    'description' => $values['description'],
                ]);
            }
        }

        return Redirect::route('zchangelog.admin.index')->with('success', trans('zchangelog::admin.status.create'));
    }

    /**
     * Destroy changelog
     *
     * @param ChangeLog $changeLog
     * @return RedirectResponse
     */
    public function destroy(ChangeLog $changeLog): RedirectResponse
    {
        $changeLog->delete();
        return Redirect::route('zchangelog.admin.index')->with('success', trans('zchangelog::admin.status.destroy'));
    }

}
