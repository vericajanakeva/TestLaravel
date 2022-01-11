<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Repository\Adapter\ReplacingWriter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class UsersController extends Controller
{
// this is function for the home page of the app, navigate to /users. This is the form for unauthenticated users.
    public function index()
    {

        $users = User::all();
        return view('users.index', compact('users'));
    }
//function for registering a user.
    public function create()
    {
        return view('users.create');

    }
//post function to save the registered user to database
    public function store(Request $request)
    {
        $request->validate([
            'user_type' => 'required',
            'parent' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'repeat_password' => 'required'
        ]);
        User::create($request->all());
        return redirect()->route('users.index')->with('success','Register was successful.Please now log in with the account you created.');

    }
//method which handles the request for login button. It redirects to the login form.
    public function login(Request $request)
    {

        return view('users.login');
    }
 //this is function for the unauthenticated users, which requires to log in first in order to continue,
    public function login1(Request $request)
    {
        return view('users.login1',compact('request'))->with('request', $request);
    }
 // function to validate the user credentials to log in, checks the data from the database
    public function validatelogin(Request $request)
    {

            $user = User::where('email', '=', ($request->get('email')))
                ->where('password', '=',($request->get('password')))->get();
            if(count($user) > 0){

                return view('users.authenticated',compact('user'))->with('user', $user);

            } else {

                // validation not successful, send back to form
                return back()->with('error', 'Error logging you in');

            }

        }
  // this is the function for the login redirect for the unauthenticated users, this function is the same schema as the previuous one
    public function validate_redirect(Request $request)
    {

        $user = User::where('email', '=', ($request->get('email')))
            ->where('password', '=',($request->get('password')))->get();
        if(count($user) > 0){
            return $this->result(Request::create($request->get('request')));
           // return view('users.result',compact('request'))->with('request', $request);

        } else {

            // validation not successful, send back to form
            return back()->with('error', 'Error logging you in');

        }

    }
 // method which logs out the user
    public function logout()
    {
        Auth::logout(); // log the user out of our application
        return redirect()->route('users.login')->with('error','Please log in'); // redirect the user to the login screen
    }
 // method which routes to authenticated view, from which you can see the results.
    public function authenticatedview()
    {
      //  $user = $exists;
        return view('users.authenticated');
    }
 // method which generates the results. I searched through database according to the request that was posted, used sql statements,
    //then i compare the values to get the final collection of data to be shown in the result.blade.php view.
    public function result(Request $request)
    {
        $user_type = $request->get('user_type');
        $parent_type = User::where('user_type', '=', ($request->get('user_type')))->select('parent')->groupBy('parent')->get();
        $users = User::where('user_type', '=', ($request->get('user_type')))->get();
        $user_type_count = $users->count();
        // the function below is created like a map with key -> value, to make the iteration simple and faster then in the view.
        $parent_type_count = $this->count_per_column($request,$parent_type);
        $users_filtered= User::where('name', '=', ($request->get('query')))
            ->orWhere('email', '=',($request->get('query')))->where('user_type', '=',($request->get('user_type')))->get();
        return view('users.result',compact('users_filtered','user_type', 'parent_type','user_type_count', 'parent_type_count'))
     ->with('users_filtered',$users_filtered)->with('user_type',$user_type)->with('user_type_count', $user_type_count)->with('parent_type_count',$parent_type_count);

    }
    // function to count the sub_types (children rows in the parent types), to help me to get the count number
    public function count_per_column(Request $request, $parent_type){
        $arr = Collection::empty();
        foreach ($parent_type as $parent) {
            $parent_type_count = User::where('user_type', '=', ($request->get('user_type')))->where('parent', '=', $parent->parent)->count();
            $arr[$parent->parent] = ($parent_type_count);
        }
        return $arr;

    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }
    public function show(User $user)
    {
        //
    }
    //method used to delete a record from database

    public function destroy(User $user)
    {
        $user->delete();
        return redirect() -> route('users.result')->with('success', 'User deleted successfully');

    }
}
