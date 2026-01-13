<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index() {
    	$currentDatetime = new DateTime();    
		$iso8601 = $currentDatetime->format('c');

    	return response()->json([
    		'status' => 'OK',
    		'timestamp' => $iso8601,
    		'api_version' => '1.0.0'
    	]);
    }
}
