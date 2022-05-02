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

    public function post_edit(Post $post)
    {
        $place = PlacePost::where('id', $post->place_id)->get();
        Log::debug($post); //ログ出力（変数）
        Log::debug($place); //ログ出力（変数）
        // return view('post_edit', ['post' => $post]);
        return view('post_edit', compact('post', 'place'));
    }


    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'place_name' => 'required',
            'room_temp' => 'required | numeric | between:80,110',
            'water_temp' => 'required | numeric | between:10,20',
            'price' => 'required | numeric',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect($post->id . '/post_edit')->withInput()->withErrors($validator);
        }

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

        $request->session()->flash('update', 'データを編集しました');
        return redirect('place_list' . $post->id . '/detail');
    }




    public function destroy(Request $request, Post $post)
    {
        Log::debug($request); //ログ出力（変数）
        Log::debug(print_r($post, true)); //ログ出力（配列）
        Post::where('id', $post->id)->delete();
        $request->session()->flash('delete', 'サ活投稿を削除しました');
        // return redirect(url('/place_list'));
        return redirect(url('/place_list/' . $post->place_id . '/detail'));
    }
}
