<?php

namespace App;

use App\Models\Site;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * 用户
 * Class User
 * @package App
 */
class User extends Authenticatable
{
  use Notifiable, HasApiTokens, HasRoles;

  protected $fillable = [
    'name', 'email', 'password',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
    'lock_to_time' => 'datetime'
  ];
  protected $appends = ['is_super_admin'];

  /**
   * passport帐号登录
   * @param $username
   * @return mixed
   */
  public function findForPassport($username)
  {
    $validate = [];
    filter_var($username, FILTER_VALIDATE_EMAIL) ? $validate['email'] = $username :
      $this['mobile'] = $username;

    return $this->where($validate)->first();
  }

  /**
   * 站点关联
   * @return HasMany
   */
  public function site(): HasMany
  {
    return $this->hasMany(Site::class);
  }

  /**
   * 超级管理员
   * @return bool
   */
  public function getIsSuperAdminAttribute(): bool
  {
    return $this['id'] === 1;
  }

  /**
   * 用户组
   * @return BelongsTo
   */
  public function group(): BelongsTo
  {
    return $this->belongsTo($this['group_id']);
  }
}
