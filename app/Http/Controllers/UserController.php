<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Maklad\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::get();        
        return view('users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        
        if($request->roles <> ''){
            $user->roles()->attach($request->roles);
        }
        return redirect()->route('users.index')->with('success','User has been created');            
        
    }
    public function edit($id) 
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('roles', 'user'));
    } 
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);   
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:8|confirmed'
        ]);
        $input = $request->except('roles');
        $user->fill($input)->save();
        if ($request->roles <> '') {
            $user->roles()->sync($request->roles);        
        }        
        else {
            $user->roles()->detach(); 
        }
        return redirect()->route('users.index')->with('success',
             'User successfully updated.');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('msg',
             'User deleted successfully!');
    }
	
	public function show(User $user)
    {
        //
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}