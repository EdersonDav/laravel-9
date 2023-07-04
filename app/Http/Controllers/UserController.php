<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::get();

        return view('users.index', compact('users'));
    }

    public function show($id){
        $user = User::find($id);
        if(!$user){
            return redirect()->route('users.index');
        }

        return view('users.show', compact('user'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('users.index');
    }

    public function edit($id){
        $user = User::find($id);

        if(!$user){
            return redirect()->route('users.index');
        }

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id){
        $user = User::find($id);

        if(!$user){
            return redirect()->route('users.index');
        }

        $newValues = $request->only('name', 'email');

        if($request->password){
            $newValues['password'] = bcrypt($request->password);
        }

        $user->update($newValues);

        return redirect()->route('users.index');
    }
}
