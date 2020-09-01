<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function list() {
        
        $users = [
            'Jenn Pillan',
            'Shantae Sanders',
            'Andrew Locker',
            'Dan Whilkers'
        ];
    
        return view('internals.users', [
            'users' => $users
        ]);
    }
}
