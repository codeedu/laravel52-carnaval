<?php

namespace CodePub\Http\Controllers\Admin;

use CodePub\Models\Permission;
use CodePub\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application as App;

use CodePub\Http\Requests;
use CodePub\Http\Controllers\Controller;

class RolesController extends Controller
{

    public function __construct(App $app)
    {
         if( !$app->runningInConsole() ) {
            $this->authorize('role_admin');
        }
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        Role::create($request->all());
        return redirect()->route('admin.roles.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        Role::find($id)->update($request->all());
        return redirect()->route('admin.roles.index');
    }

    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->route('admin.roles.index');
    }

    public function permissions($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();

        return view('admin.roles.permissions', compact('role', 'permissions'));
    }

    public function storePermission(Request $request, $id)
    {
        $role = Role::find($id);

        $permission = Permission::findOrFail($request->all()['permission_id']);
        $role->addPermission($permission);

        return redirect()->back();
    }

    public function revokePermission($id, $permission_id)
    {
        $role = Role::find($id);
        $permission = Permission::find($permission_id);
        $role->revokePermission($permission);

        return redirect()->back();

    }
}
