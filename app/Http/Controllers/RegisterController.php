<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index() {
        return Inertia::render('Register');
    }

    public function store(Request $request) {
        // dd($request);
        $data = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'department' => ['required']
        ]);

        User::create([
           'email' => $data['email'],
           'password' => $data['password'],
           'name' => $data['name'],
           'phone' => $data['phone'],
           'department' => $data['department'],
        ]);

        return to_route('login');
    }
}
