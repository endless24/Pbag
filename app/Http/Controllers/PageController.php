<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class PageController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }

    public function aboutus()
    {
        return Inertia::render('About');
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }

    public function testimony()
    {
        return Inertia::render('Testimonies');
    }


    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }

    public function add_post()
    {
        return Inertia::render('AddPost');
    }

    public function add_event()
    {
        return Inertia::render('AddEvent');
    }

    // public function add_category()
    // {
    //     return Inertia::render('Category');
    // }


    // public function login(LoginRequest $request)
    // {
    //     $request->validate([
    //         'email' => ['required', 'string', 'email'],
    //         'password' => ['required', 'string'],
    //     ]);

    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    //         if (!$request->has('endpoint')) {
    //             $request->session()->regenerate();
    //         }

    //         $responses = [
    //             'apitoken' => $request->user()->createToken('User Token')->plainTextToken
    //         ];
    //         return response()->json([
    //             'status' => 'success',
    //             'messages' => '',
    //             'result' => $responses
    //         ]);
    //     }else{
    //         return response()->json([
    //             'status' => 'auth_error'
    //         ]);
    //     }
    // }

    // public function register(RegisterRequest $request)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'phone' => ['required', 'string', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:5', 'confirmed'],
    //     ]);

    //     if(User::create([
    //         'name' => $request->name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ])){
    //         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //             if (!$request->has('endpoint')) {
    //                 $request->session()->regenerate();
    //             }

    //             $responses = [
    //                 'apitoken' => $request->user()->createToken('User Token')->plainTextToken
    //             ];
    //             return response()->json([
    //                 'status' => 'success',
    //                 'messages' => '',
    //                 'result' => $responses
    //             ]);
    //         }else{
    //             return response()->json([
    //                 'status' => 'auth_error'
    //             ]);
    //         }

    //     }else{
    //         return response()->json([
    //             'status' => 'error'
    //         ]);
    //     }

    // }

    public function delete_token(Request $request)
    {
        if (
            $request
                ->user()
                ->tokens()
                ->delete()
        ) {
            return response()->json([
                'status' => 'success',
                'messages' => '',
                'result' => [],
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'messages' => '',
                'result' => [],
            ]);
        }
    }
}
