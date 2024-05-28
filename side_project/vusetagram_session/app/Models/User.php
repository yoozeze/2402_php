<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account',
        'profile',
        'password',
        'name',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * 제이슨 데이터를 가져올때 제외하고 가져옴
     * 
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'refresh_token',
    ];

    /**
     * TimeZone format when serializing JSON
     * JSON으로 시리얼라이즈 할때, 날짜를 원하는 형식으로 포멧
     * 이 메소드가 없으면 디폴트는 UTC
     * 
     * @param \dateTimeInterface $data
     * 
     * @return String('Y-m-d H:i:s')
     * 
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Accessor : 특정 컬럼의 값을 원하는 형태로 가공
     */
    public function getGenderAttribute($value) {
        return $value == 0 ? '남자' : '여자';
    }
}
