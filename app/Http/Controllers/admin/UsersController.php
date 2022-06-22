<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all()
        ];

        return view('pages.admin.users.index', $data);
    }

    public function edit(User $user)
    {
        return view('pages.admin.users.edit',[
            'item' => $user
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();

        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }
            else
        {
            unset($data['password']);
        }

        $item = User::where("email", $request->email)->first();

        if ($item != null) 
        {
            $item = $item->email;
        } 
            else 
        {
            $item = '';
        }

        if($request->email == $item)
        {
            // $request->session()->flash('failed', 'Data berhasil di update kecuali ' . 'Email ' . $request->email . ' sudah digunakan!' );

            unset($data['email']);
        }

        $user->update($data);
        
        return redirect()->route('users.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data berhasil dihapus');

    }
}
