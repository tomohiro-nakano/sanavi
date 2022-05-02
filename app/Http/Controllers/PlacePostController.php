<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\PlacePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;

class PlacePostController extends Controller
{
    public function top()
    {
        return view('top');
    }

    public function about()
    {
        return view('about');
    }

    public function index()
    {
        $collection = PlacePost::orderBy('id', 'asc')->paginate(6);
        return view('place_list', ['place_lists' => $collection]);
    }

    public function detail(PlacePost $place)
    {

        Log::debug($place); //ログ出力（変数）
        // $posts = Post::where('place_id', $place->id)->get();
        $posts = Post::where('place_id', $place->id)->orderBy('id', 'asc')->paginate(10);
        Log::debug($place); //ログ出力（変数）
        Log::debug(print_r($posts, true)); //ログ出力（配列）
        return view('detail', compact('place', 'posts'));
    }

    public function place_post()
    {
        return view('place_post');
    }


    //施設登録時にPOST送信したらバリデーション後、値を保存
    public function place_post_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'place_name' => 'required',
            'room_temp' => 'required | numeric | between:80,110',
            'water_temp' => 'required | numeric | between:10,20',
            'price' => 'required | numeric',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/place_post')->withInput()->withErrors($validator);
        }
        $place_post = new PlacePost;
        $place_post->place_name     = $request->place_name;
        $place_post->room_temp = $request->room_temp;
        $place_post->water_temp       = $request->water_temp;
        $place_post->price   = $request->price;
        $place_post->address     = $request->address;
        $place_post->place_image     = $request->place_image;
        $place_post->save();

        $request->session()->flash('success', 'データを追加しました');
        return redirect('/');
    }



    public function place_edit(PlacePost $place)
    {
        // $place_arr = PlacePost::where('id', $place);
        Log::debug($place); //ログ出力（変数）
        // Log::debug(print_r($place, true)); //ログ出力（配列）
        return view('place_edit', ['place' => $place]);
    }

    public function update(Request $request, PlacePost $place_post)
    {
        $validator = Validator::make($request->all(), [
            'place_name' => 'required',
            'room_temp' => 'required | numeric | between:80,110',
            'water_temp' => 'required | numeric | between:10,20',
            'price' => 'required | numeric',
            'address' => 'required',
        ]);

        if ($file = $request->place_image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('img/place_image/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        if ($validator->fails()) {
            return redirect($place_post->id . '/place_edit')->withInput()->withErrors($validator);
        }

        $place_post->place_name     = $request->place_name;
        $place_post->room_temp = $request->room_temp;
        $place_post->water_temp       = $request->water_temp;
        $place_post->price   = $request->price;
        $place_post->address     = $request->address;
        $place_post->place_image = $fileName;
        $place_post->save();

        $request->session()->flash('update', 'データを編集しました');
        return redirect('/place_list');
    }

    public function destroy(Request $request, PlacePost $place_post)
    {
        PlacePost::where('id', $place_post->id)->delete();
        $request->session()->flash('delete', '施設情報を削除しました');
        return redirect(url('/place_list'));
    }



}
