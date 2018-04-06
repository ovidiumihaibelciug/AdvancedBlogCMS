<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view('manage.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'min:8|max:255'
        ]);

        if(!empty($request->password)) {
            $password = trim($request->password);
        } else {
            $str = "";
            $length = 10;
            $keyspace = "123456789abcdefhgijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $max = mb_strlen($keyspace,'8bit') - 1;

            for ($i = 0; $i < $length; ++$i) {
                $str .= $keyspace[random_int(0,$max)];
            }
            $password = $str;
        }

        $user = new User();

        $user->name     = $request->name;
//        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = Hash::make($password);

        $user->save();

        if ($user->save()) {
            return redirect()->route('users.show', $user->id);
            Session::flash('success', 'User created successfully');
        } else {
            Session::flash('danger', 'Sorry a problem occured while creating this user');
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return view('manage.users.show')->withUser($user);
    }

    /**
      * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('manage.users.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id //unique but ignore the current id
        ]);
        
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password_option == 'auto') {
            $length = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $user->password = Hash::make($str);
          } elseif ($request->password_option == 'manual') {
            $user->password = Hash::make($request->password);
          }
        if ($user->save()) {
            return redirect()->route('users.show', $id);
        } else {
            Session::flash('error', 'There was a problem saving the updated user info to the database, Please try again!');
            return redirect()->route('users.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
