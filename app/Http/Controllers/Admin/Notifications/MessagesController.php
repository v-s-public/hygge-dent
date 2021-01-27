<?php

namespace App\Http\Controllers\Admin\Notifications;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\View\View;

class MessagesController extends Controller
{
    protected string $folderPrefix = 'admin.notifications.messages';
    protected string $routePrefix = 'admin.notifications.messages';

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $routePrefix = $this->routePrefix;
        return view($this->folderPrefix . '.index', compact('routePrefix'));
    }

    /**
     * Returns JSON with all Appointments entities
     *
     * @return mixed
     * @throws \Exception
     */
    public function resourceList()
    {
        $model = Message::all();
        $routePrefix = $this->routePrefix;
        $primaryKey = 'message_id';
        $actions = ['show', 'destroy'];

        return Datatables::of($model)
            ->addColumn('date_time', function($model) {
                return $model->getNotificationDate();
            })
            ->addColumn('is_viewed', function($model) {
                return $model->is_viewed ? '<small class="badge badge badge-success">Просмотрено</small>' : '<small class="badge badge-warning">Новое</small>';
            })
            ->addColumn('actions', function($model) use ($routePrefix, $actions, $primaryKey) {
                return view('admin.common.actions.grid_actions', compact('model', 'routePrefix', 'actions', 'primaryKey'));
            })
            ->rawColumns(['actions', 'is_viewed'])
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id) : View
    {
        $model = Message::find($id);
        $model->markAsViewed();

        $routePrefix = $this->routePrefix;

        return view($this->folderPrefix . '.show', compact('model', 'routePrefix'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id) : void
    {
        Message::find($id)->delete();
    }
}
