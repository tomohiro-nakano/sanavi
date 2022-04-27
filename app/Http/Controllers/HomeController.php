<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Sanavi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); //事前に認証処理
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('sanavi');
        $collection = Sanavi::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->paginate(6);
        return view('sanavi', ['sanavis' => $collection]);
      }
}
