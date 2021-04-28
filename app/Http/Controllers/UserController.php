<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getRole($id)
    {
        $user = User::findOrFail($id);

        $this->checkAdmin($user);

        echo $user->role->name;
    }

    public function viewRole($id)
    {
        $user = User::findOrFail($id);

        $this->checkAdmin($user);
    }

    public function checkAdmin(User $user)
    {
        if($user->role->name == "Admin"){
            return true;
        } else {
            abort(403);
        }
    }
}
