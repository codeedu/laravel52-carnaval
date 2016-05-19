<?php

namespace CodePub\Http\Controllers\Admin;

use CodePub\Models\Permission;;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Application as App;


use CodePub\Http\Requests;
use CodePub\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    public function __construct(App $app)
    {
        if( !$app->runningInConsole() )
        {
            $this->authorize('permission_admin');
        }
    }
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        Permission::create($request->all());
        return redirect()->route('admin.permissions.index');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        Permission::find($id)->update($request->all());
        return redirect()->route('admin.permissions.index');
    }

    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('admin.permissions.index');
    }

}
