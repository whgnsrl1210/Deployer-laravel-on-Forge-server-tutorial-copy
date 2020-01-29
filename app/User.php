<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**대량할당을 할 것들을 $fillable프로퍼티에 집어넣음 */
    protected $fillable = [
        'activated','confirm_code','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','confirm_code',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

     /**모델에서 프로퍼티 값을 조회할때 자동으로 타입 변환할 목록을 정의한다 */
    protected $casts = [
        'email_verified_at' => 'datetime','activated'=>'bloolean',
    ];
    protected $dates = ['last_login'];
    
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isAdmin()
    {
        return ($this->id === 2) ? true : false;
    }
}
