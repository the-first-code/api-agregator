<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
    	$validated = $request->validate([
    		'name' => 'string',  
	        'email' => 'required|email|string',  
	        'password' => 'required|string|min:8|confirmed',  
	    ]);  

	    $user = User::create(array(
	    	'name' => $validated['name'],
    		'password' => Hash::make($validated['password']),
    		'email'    => $validated['email'],
	    ));
    
        $token = $user->createToken('auth-token')->plainTextToken;  

        return response()->json([  
            'token' => $token
        ]);

    }

    public function newToken(Request $request) {
    	$validated = $request->validate([  
	        'email' => 'required|email',  
	        'password' => 'required',  
	    ]);  

        $user = User::where('email', $validated['email'])->first();

       	if (!$user || !Hash::check($validated['password'], $user->password)) {
           	return response()->json(['message' => 'Invalid credentials.'], 401);
    	}

        $token = $user->createToken('auth-token')->plainTextToken;  

        return response()->json([  
            'token' => $token
	    ]);
	    
    }
}
