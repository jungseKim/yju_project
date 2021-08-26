<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function items()
    {
        $arr = [];
        $Items = $this->hasMany(Item::class)->get();
        foreach ($Items as $Item) {
            $temp = $Item->ItemToChat();
            if (sizeof($temp)) {
                $Item->ars = $temp;
                // array_unshift($temp, $Item);
                array_push($arr, $Item);
            }
        }
        // return Item::find($a)->ItemToChat();
        return $arr;
    }
}
