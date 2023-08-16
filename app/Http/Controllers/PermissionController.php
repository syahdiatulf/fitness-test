<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;
class PermissionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get(); //Get all roles
        return view('permissions.create',compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();
        if ($request->roles <> '') { 
            foreach ($request->roles as $key=>$value) {
                $role = Role::find($value); 
                $role->permissions()->attach($permission);
            }
        }
        
        return redirect()->route('permissions.index')->with('msg','Permission added successfully');
    }
   
    public function edit($id) 
    {
        $permission = Permission::findOrFail($id);
        $roles = Role::all();
        return view('permissions.edit', compact('roles', 'permission'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required',
        ]);
        $input = $request->except(['roles']);
        $permission->fill($input)->save();
        if($request->roles <> ''){
            $permission->roles()->sync($request->roles);
        }

        return redirect()->route('permissions.index')
            ->with('msg',
             'Permission '. $permission->name.' updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')
            ->with('msg',
             'Permission deleted successfully!');
    }
	
	public function show(Role $role)
    {
        //
    }
}