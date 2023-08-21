<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::all();
        return view('admin.users.user', compact('list'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.users.add_user', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data= $request->all();
        // $fileName = time().'_'.$request->file('profile_picture')->getClientOriginalName();
        // $request->profile_picture->move(public_path('uploads/'),$fileName);
        // $data['profile_picture']=$fileName;
        // User::create($data);

        $input = $request->all();
        if ($image = $request->file('profile_picture')) {
            $destinationPath = 'uploads/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['profile_picture'] = "$profileImage";
        }
        User::create($input);

        return redirect()->route('user.index')->with('msg', 'User Successfully Inserted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        $user = User::find($id);
        return view('admin.users.edit_user', compact('users', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        if ($image = $request->file('profile_picture')) {
            $destinationPath = 'uploads/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['profile_picture'] = "$profileImage";
        } else {
            unset($input['profile_picture']);
        }
        User::find($id)->update($input);
        return redirect()->route('user.index')->with('msg', 'User Update Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('msg', 'User Deleted Successfully');
    }
}
