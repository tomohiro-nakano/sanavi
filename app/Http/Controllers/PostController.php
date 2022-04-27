<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PlacePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Validator;

class PostController extends Controller
{

    public function post(PlacePost $place)
    {
        // $place = PlacePost::where('id', $place);
        return view('post', ['place' => $place]);
    }

    //サ活投稿時にPOST送信したらバリデーション後、値を保存
    public function post_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'place_id' => 'required',
            // 'all_score' => 'required | numeric | between:1,5',
            // 'totonoi_score' => 'required | numeric | between:1,5',
            // 'rt_score' => 'required | numeric | between:1,5',
            // 'wt_score' => 'required | numeric | between:1,5',
            // 'rest_score' => 'required | numeric | between:1,5',
            // 'cong_score' => 'required | numeric | between:1,5',
        ]);

        if ($validator->fails()) {
            return redirect(url($request->place_id . '/post'))->withInput()->withErrors($validator);
        }
        $post = new Post;
        $post->place_id     = $request->place_id;
        $post->user_id     = Auth::user()->id;
        $post->user_name     = Auth::user()->name;
        $post->all_score = $request->all_score;
        $post->totonoi_score       = $request->totonoi_score;
        $post->rt_score   = $request->rt_score;
        $post->wt_score     = $request->wt_score;
        $post->rest_score     = $request->rest_score;
        $post->cong_score     = $request->cong_score;
        $post->visit_date     = $request->visit_date;
        $post->comment     = $request->comment;
        $post->save();

        $request->session()->flash('success', 'データを追加しました');
        return redirect(url('/place_list/' . $request->place_id . '/detail'));
    }

    public function destroy(Post $post)
    {
        Post::where('id', $post->id)->delete();
        return redirect(url('/place_list'));
    }
}
