<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Validator;

class BlogApiController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        if ($blogs->count() > 0) {
            return BlogResource::collection($blogs);
        } else {
            return response()->json([
                "message" => "Tidak ada data"
            ], 200);
        }
    }

    public function store(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:3',
            'user_id' => 'required',
            'blog' => 'required|string|min:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields is mandatory',
                'error' => $validator->messages()
            ], 422);
        }

        $blog = Blog::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'blog' => $request->blog
        ]);

        return response()->json([
            'message' => 'Blog create succesfuly',
            'data' => new BlogResource($blog),
        ], 200);
    }
}
