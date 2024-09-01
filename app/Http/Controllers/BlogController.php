<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(route('blog.index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:3',
            'blog' => 'required|string|min:10',
            'user_id' => 'required',
        ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'message' => 'Something is wrong',
        //         'data' => $validator->message(),
        //     ], 422);
        // }

        if ($validator->fails()) {
            return;
        }

        $blog = Blog::create([
            'title' => $request->title,
            'blog' => $request->blog,
            'user_id' => $request->user_id
        ]);

        return redirect(route('blog.index'))->with('status', 'Blog Post Created Succesfuly');

        // return response()->json([
        //     'message' => 'Blog succesfuly created',
        //     'data' => $blog
        // ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
