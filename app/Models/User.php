<?php

namespace App\Models;

use App\Models\Traits\ActiveUserHelper;
use App\Models\Traits\LastActicedAtHelper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use LastActicedAtHelper;
    use ActiveUserHelper;
    use HasRoles;
    use Notifiable {
        notify as protected laravelNotify;
    }

    public function notify($instance)
    {
        // 如果要通知的人是当前用户，就不必通知了！
        if ($this->id == Auth::id()) {
            return;
        }
        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'introduction', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'user_id', 'id');
    }

    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }

    public function setPasswordAttribute($pwd)
    {
        // 如果值的长度等于 60，即认为是已经做过加密的情况
        if (strlen($pwd) != 60) {
            $pwd = bcrypt($pwd);
        }

        $this->attributes['password'] = $pwd;
    }

    public function setAvatarAttribute($path)
    {
        // 如果不是以 /uploads/images/avatars/ 开头, 就是从后台上传的,需要处理
        if (!starts_with($path,'/uploads/images/avatars/')) {
            $path = '/uploads/images/avatars/'.$path;
        }

        $this->attributes['avatar'] = $path;
    }


}
