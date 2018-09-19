<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
// use Auth;
use Illuminate\Support\Facades\Auth;

use App\Handlers\ImageUploadHandler;


class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index', 'show']
        ]);
    }

    public function index(Request $request, Topic $topic)
    {
//	    dd($request->toArray());exit;
        $topics = $topic->withOrder($request->order)->paginate(20);// 默认分页是15条
        return view('topics.index', compact('topics'));
    }

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    public function create(Topic $topic)
    {
        $categories = Category::all();
        return view('topics.create_and_edit', compact('topic', 'categories'));
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();

        return redirect()->route('topics.show', $topic->id)->with('message', 'Created successfully.');
    }

    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);
        return view('topics.create_and_edit', compact('topic'));
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->update($request->all());

        return redirect()->route('topics.show', $topic->id)->with('message', 'Updated successfully.');
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);
        $topic->delete();

        return redirect()->route('topics.index')->with('message', 'Deleted successfully.');
    }

    public function uploadImage(Request $request,ImageUploadHandler $uploader)
    {
        // 初始化返回数据,默认是失败的
        $data = [
            'success'=>false,
            'msg'=>'上传图片失败!',
            'file_path'=>'',
        ];

        // 判断是否有上传文件, 并赋值给 $file
        if($file = $request->upload_file){
            // 保存图到本地
            $result = $uploader->save($file,'topics',Auth::id(),1024);
            // 图片保存成功则设置返回数据
            if($result){
                $data['success']= true;
                $data['msg']= '上传成功~';
                $data['file_path']= $result['path'];
            }

        }
        return $data;

    }
}