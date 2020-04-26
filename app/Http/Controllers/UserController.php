<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function index() 
    {
        $users = $this->userModel::all();

        return view('pages.usuarios')->with(compact('users'));
    }

    public function store(Request $request)
    {
        $user = $this->userModel;
        $options = [
            'cost' => 10,
        ];
        $user->password = password_hash($request->password, PASSWORD_BCRYPT, $options);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->permission = $request->permission;

        $user->save();
        return view('home');
    }

    public function destroy($id) 
    {

        $user = $this->userModel->find($id);
        
        if($user)
        {
          $delete = $user->delete();
          return $this->index();
        }
        else {
            echo '<script> alert("Tente novamente mais tarde!") </script>';
            return $this->index();
        }
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);

        return view('pages.edit-user')->with(compact('user'));
    }

    public function update(Request $request, $id) {
        $user = $this->userModel->find($id);

        if($user)
        {
            $update = $user->update([
                'name' => $request->nome,
                'email' => $request->email,
                'permission' => $request->permissao,
            ]);
           
            echo '<script> alert("Usuário atualizada!") </script>';
            return $this->index();
          }
          else {
              echo '<script> alert("Tente novamente mais tarde!") </script>';
              return $this->index();
          }
    }
}
