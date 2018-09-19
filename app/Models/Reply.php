<?php

namespace App\Models;

//use App\Models\Topic;
//use App\Models\User;

class Reply extends Model
{
    protected $fillable = ['content'];

    public function topic()
    {
        // 第一个参数是包含类的完全限定名称,
        // 第二个参数是(当前模型表的)外键
        // 第三个数数是外键对应的键, 一般是主表的主键
        // ps:理解外键 -- A表中的一个字段，是B表的主键，那他就可以是A表的外键
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
//        $this->belongsTo(Topic::class);
    }

    public function user()
    {
//        $this->belongsTo(User::class,'user_id','id');
        return $this->belongsTo('App\Models\User','user_id','id');
//        $this->belongsTo('App\Models\User');
    }
}
