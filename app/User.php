<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string|null $name
 * @property int $sex
 * @property string|null $email
 * @property string $password
 * @property string $avatar 用户的头像
 * @property int|null $github_id github第三方登录的ID
 * @property string|null $github_name github第三方登录的用户名
 * @property string|null $qq_id
 * @property string|null $qq_name
 * @property string|null $weibo_id
 * @property string|null $weibo_name
 * @property string|null $openid
 * @property int $login_count 登录次数
 * @property int $source 用户的来源
 * @property string|null $active_token 邮箱激活的token
 * @property int $is_active 用户是否激活
 * @property int $is_init_name 是否是初始用户名，是的话，可以修改用户名
 * @property int $is_init_email 是否是初始邮箱，是的话可以修改邮箱
 * @property int $is_init_password 是否是初始密码，是的话可以不用输入旧密码直接修改
 * @property int $score_all 用户的总积分
 * @property int $score_now 用户剩余的积分
 * @property int $login_days 用户连续登录天数
 * @property string|null $last_login_date 上一次登录的日期,用于计算连续登录
 * @property string|null $remember_token laravel中的记住我
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereActiveToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGithubId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGithubName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsInitEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsInitName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsInitPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastLoginDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLoginCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLoginDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereQqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereQqName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereScoreAll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereScoreNow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWeiboId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWeiboName($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
