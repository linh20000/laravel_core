<?php

namespace App\Http\Controllers\Admin\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Exception;

class RolePermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('log');
    }

    public function index()
    {
        $roles = Role::paginate(20);

        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'Role Permission', 'url' => route('rolepermission.index')]
        ];

        return view('admin.rolepermission.index', compact('roles', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'Role Permission', 'url' => route('rolepermission.index')]
        ];

        return view('admin.rolepermission.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->roleName]);
        return redirect()->route('rolepermission.index')->with('success', 'Update successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $rolePermissionByUser = [];
        $permissionGroupName = [];
        $permissionsAll = [];

        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'Role Permission', 'url' => route('rolepermission.index')]
        ];

        $role = Role::findById($id);

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $permissionGroupName[$permission->group_name] = $permission->group_name;
            $permissionsAll[$permission->group_name][] = $permission->toArray();
        }

        $rolePermissions = $role->getAllPermissions();

        foreach ($rolePermissions as $rolePermission) {
            $rolePermissionByUser[$rolePermission->guard_name][$rolePermission->group_name][$rolePermission->id]['id'] = $rolePermission->id;
            $rolePermissionByUser[$rolePermission->guard_name][$rolePermission->group_name][$rolePermission->id]['name'] = $rolePermission->name;

        }

        return view('admin.rolepermission.edit', compact('breadcrumbs',  'permissionGroupName', 'permissionsAll', 'role', 'permissions', 'rolePermissions', 'rolePermissionByUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id is role id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $role = Role::findById($id);
            $permission = $request->get('permission');
            $role->syncPermissions($permission);

            if ($request->get('name')) {
                $role->name = $request->get('name');
                $role->save();
            }

        } catch (\Exception $e) {
            throw new \Exception($e);
        }

        return redirect()->route('rolepermission.index')->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findById($id);
        if (empty($role)) {
            session()->flash('error', 'Not found role.');

            return ['error' => true];
        }
        try {
            $role->delete();

            session()->flash('success', 'Destroy successfully.');

            return ['error' => false];
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
