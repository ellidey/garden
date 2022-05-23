<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ID_ROLE_USER = 0;
    const ID_ROLE_ADMINISTRATOR = 1;
    const ID_ROLE_OPERATOR = 2;

    const NAME_ROLE_USER = 'Пользователь';
    const NAME_ROLE_ADMINISTRATOR = 'Администратор';
    const NAME_ROLE_OPERATOR = 'Оператор';

    const ROLES = [
        self::ID_ROLE_ADMINISTRATOR => self::NAME_ROLE_ADMINISTRATOR,
        self::ID_ROLE_USER => self::NAME_ROLE_USER,
        self::ID_ROLE_OPERATOR => self::NAME_ROLE_OPERATOR,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role_name() {
        return self::ROLES[$this->role_id];
    }

    public function positions() {
        return $this->hasMany(Position::class);
    }
}
