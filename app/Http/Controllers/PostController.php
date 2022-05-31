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
            'visit_date' => 'required | date',
            'visit_date' => 'date|before:today+1',
            'comment' => 'required | string',
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
        return redirect(url('/detail/'  . $request->place_id));
    }

    public function post_edit(Post $post)
    {
        $place = PlacePost::where('id', $post->place_id)->get();
        Log::debug($post); //ログ出力（変数）
        Log::debug(print_r($place, true)); //ログ出力（配列）
        return view('post_edit', compact('post', 'place'));
    }


    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'place_id' => 'required',
            'visit_date' => 'required | date',
            'comment' => 'required | string',
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

        Log::debug($request); //ログ出力（変数）
        $request->session()->flash('update', 'データを編集しました');
        return redirect(url('/detail/'  . $request->place_id));
    }




    public function destroy(Request $request, Post $post)
    {
        Log::debug($request); //ログ出力（変数）
        Log::debug(print_r($post, true)); //ログ出力（配列）
        Post::where('id', $post->id)->delete();
        $request->session()->flash('delete', 'サ活投稿を削除しました');
        // return redirect(url('/place_list'));
        return redirect(url('/detail/' . $post->place_id));
    }
}
