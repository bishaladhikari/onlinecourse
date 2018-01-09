<?php

namespace App\Http\Controllers\Admin\Access;

use App\Http\Controllers\Backend\Access\RoleController;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        return view('admin.access._user.index')->with('users', User::with('roles')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        return view('admin.access._user.create')
            ->with('roles', Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        //
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),


        ]);
//        $user->attachRole($request->roles);

        foreach ($request->roles as $key => $value) {
            $user->attachRole($value);
        }


        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->with('roles')->first();

        return view('admin.access._user.edit')->with('user', $user)->withRoles(Role::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);
         $user=User::where('id',$id)->first();
//        $user->detachRole($user);


//        dd($user);
        $user->roles()->sync($request->roles );

//        foreach ($request->roles as $key => $value) {
////            $user->deferAndAttachNewRole($value);
////            $user->attachRole($value);
//        }
//        Session::flash('message', 'Successfully updated category!');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
