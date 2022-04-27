<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Sanavi;
use Validator;

class SanaviController extends Controller
{
    public function index()
    {
        $collection = Sanavi::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->paginate(6);
        return view('sanavi', ['sanavis' => $collection]);
      }

    public function create()
    {
        return view('create');
    }

    public function show(Sanavi $sanavi)
    {
        return view('show', ['sanavi' => $sanavi]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required | min:3 | max:100',
            'item_purchase' => 'required | numeric',
            'item_amount' => 'required | numeric | between:1000,4000',
            'published' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/sanavi')->withInput()->withErrors($validator);
        }
        $sanavi = new Sanavi;
        $sanavi->item_name     = $request->item_name;
        $sanavi->item_purchase = $request->item_purchase;
        $sanavi->user_id       = $request->user_id;
        $sanavi->item_amount   = $request->item_amount;
        $sanavi->published     = $request->published;
        $sanavi->save();

        $request->session()->flash('success', 'データを追加しました');
        return redirect('/');
    }

    public function destroy(Sanavi $sanavi)
    {
        $sanavi->delete();
        return redirect('/');
    }

    public function edit($sanavi_id)
    {
        $sanavi = Sanavi::where('user_id', Auth::user()->id)->find($sanavi_id);
        return view('edit', ['sanavi' => $sanavi]);
    }

    public function update(Request $request, Sanavi $sanavi)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required | min:3 | max:100',
            'item_purchase' => 'required | numeric',
            'item_amount' => 'required | numeric | between:1000,4000',
            'published' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/sanavi/' . $sanavi->id . '/edit')->withInput()->withErrors($validator);
        }

        $sanavi->item_name     = $request->item_name;
        $sanavi->item_purchase = $request->item_purchase;
        $sanavi->user_id       = $request->user_id;
        $sanavi->item_amount   = $request->item_amount;
        $sanavi->published     = $request->published;
        $sanavi->save();

        $request->session()->flash('update', 'データを編集しました');
        return redirect('/');
    }

}
