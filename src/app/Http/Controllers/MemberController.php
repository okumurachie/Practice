<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('index',compact('members'));
    }
    public function store(MemberRequest $request)
    {
        $form = $request->all();
        $form['password']= Hash::make($form['password']);
        Member::create($form);
        return redirect('/')->with('success','会員登録が完了しました');
    }
}
