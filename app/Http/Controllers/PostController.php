<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\HttpResponses;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(
            Post::where('user_id', Auth::user()->id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $request->validated($request->all());

        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);
            return $this->isNotAuthorized($post) ? $this->isNotAuthorized($post) : new PostResource($post);
        } catch (ModelNotFoundException $e) {
            return $this->error('', 'Post not found', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        if ($this->isNotAuthorized($post)) {
            return $this->isNotAuthorized($post);
        }
        $post->update($request->all());
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($this->isNotAuthorized($post)) {
            return $this->isNotAuthorized($post);
        }
        $post->delete();
        return $this->success(null, 'This post has been deleted successfully', 200);
    }


    private function isNotAuthorized($post)
    {
        if (Auth::user()->id !== $post->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
