<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;


class PostController extends Controller
{
    function all_posts() {
        $posts = Post::paginate(12);

        return view('posts.all_posts', compact('posts'));
    }

    function single_post($id) {
        $post = Post::with(
            [
                'comments' => function (Builder $query) {
                    $query->whereNull('replay_to');
                }
            ]
        )->withCount(
            [
                'comments' => function (Builder $query) {
                    $query->whereNull('replay_to');
                }
            ]
        )->findOrFail($id);
        // $post = Post::findOrFail($id);

        // dd($post);

        return view('posts.single_post', compact('post'));
    }

    function comment_post(Request $request, $id) {
        $data = $request->except('_token');
        $data['post_id'] = $id;

        // dd($data);
        Comment::create($data);

        return redirect()->back();
    }

}
