<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;

class AccountApiController extends Controller
{
    public function index()
    {
        $account = User::get();

        if ($account->count() > 0) {
            return BlogResource::collection($account);
        } else {
            return response()->json([
                'message' => 'Tidak ada data '
            ], 200);
        }
    }
}
