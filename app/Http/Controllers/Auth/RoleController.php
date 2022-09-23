<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\Role\createRequest;
use App\Http\Requests\Auth\Role\updateRequest;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::select([
            'id',
            'slug',
            'name',
            'created_at',
            'updated_at',
        ])->paginate();
        return view('auth.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param createRequest $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(CreateRequest $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->slug = str_slug($request->name);

        /**
         *  Permission Here
         */
        $permissions = collect(json_decode($this->permissions($request)))->toArray();
        $role->permissions = $permissions;

        $role->save();

        Session::flash('success', __('auth.role_creation_successful'));

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        if (empty($role)) {
            Session::flash('failed', __('global.denied'));

            return redirect()->back();
        }

        $permission = json_decode(json_encode($role->permissions), true);

        return view('auth.role.update', array(
            'dataDb'      => $role,
            'permissions' => $permission
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param updateRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(UpdateRequest $request, $id)
    {
        $role = Role::find($id);

        if (empty($role)) {
            Session::flash('failed', __('global.denied'));

            return redirect()->back();
        }

        $role->name = $request->name;

        /**
         *  Permission Here
         */
        $permissions = collect(json_decode($this->permissions($request)))->toArray();
        $role->permissions = $permissions;
        $role->save();

        Session::flash('success', __('auth.role_update_successful'));

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Sentinel::getUser();
        $role = Sentinel::findRoleById($id);

        if (empty($role)) {
            Session::flash('failed', __('global.not_found'));

            return redirect()->route('roles.index');
        }

        $role->users()
            ->detach($user);
        $role->delete();

        Session::flash('success', __('auth.delete_account'));

        return redirect()->route('roles.index');
    }

    /**
     * For Add Permission
     *
     * @param $request
     *
     * @return string
     */
    private function permissions($request)
    {

        //Dashboard
        $permissions['dashboard'] = true;

        $request = $request->except(array('_token', 'name', '_method', 'previousUrl'));

        foreach ($request as $key => $value) {
            $permissions[preg_replace('/_([^_]*)$/', '.\1', $key)] = true;
        }

        return json_encode($permissions);
    }

    /**
     * Duplicate Form
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function duplicate($id)
    {
        $role = Role::where('id', $id)->firstOrFail();

        $permission = json_decode(json_encode($role->permissions), true);

        return view('auth.role.duplicate', ['data' => $role, 'permissions' => $permission]);
    }
}
