<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function store(ReplyRequest $request, Reply $reply)
    {
//        dd($request->toArray());

//        $reply->content = $request->content;// member has protected access
        $reply->content = $request['content'];
//        $reply->content = $request->input('content');

        $reply->user_id  = Auth::id();
        $reply->topic_id = $request->topic_id;
        $reply->save();


        return redirect()->to($reply->topic->link())->with('success', '回复成功~');
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();

        return redirect()->to($reply->topic->link())->with('success', '删除回复成功');
    }
}