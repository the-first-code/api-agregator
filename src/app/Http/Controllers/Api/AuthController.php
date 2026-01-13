<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
    	$credentials = $request->validate([  
	        'email' => 'required|email',  
	        'password' => 'required',  
	    ]);  

	    if (Auth::attempt($credentials)) {
	    	User::create(array(
	    		'name' => $request->name,
    			'password' => Hash::make($request->password),
    			'email'    => $request->email
	    	));

	        $user = Auth::user();    
	        $token = $user->createToken('auth-token')->plainTextToken;  

	        return response()->json([  
	            'token' => $token
	        ]);  
	    }  

	    return response()->json(['error' => 'Неверные данные'], 401);
    }

    public function newToken(Request $request) {
    	$credentials = $request->validate([  
	        'email' => 'required|email',  
	        'password' => 'required',  
	    ]);  

	    if (Auth::attempt($credentials)) {  
	        $user = Auth::user();  
	        $token = $user->createToken('auth-token')->plainTextToken;  

	        return response()->json([  
	            'token' => $token
	        ]);  
	    }  

	    return response()->json(['error' => 'Неверные данные'], 401);
    }
}
