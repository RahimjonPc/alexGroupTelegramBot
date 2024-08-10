<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView() {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request) {

        // Retrieve the validated input data...
        $data = $request->validated();

        $user= User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return redirect()->back()->withErrors(['message' => 'Не правильно ввели данные!']);
        }

        Auth::login($user);

        return redirect()->route('dashboard_view');
    }
}
