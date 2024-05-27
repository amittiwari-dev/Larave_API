<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showRecords(Request $req)
    {
        $users = DB::table('users')->whereBetween('Date', [$req->startName, $req->endDate])
        ->get();
       
       
        if (!$users) {
            return response()->json([
                'code' => 500,
                'message' => 'Records not Found',
                'status' => false,
                'error' => true,
                'data' => []
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'message' => ' Data Found Successfully',
                'status' => true,
                'error' => false,
                'data' => []
            ]);
        }
    }
}
