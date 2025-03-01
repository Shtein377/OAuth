<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'online_at',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'email',
        'password',
        'password_at',
        'email_confirmed_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'online_at' => 'datetime',
        'gender' => GenderEnum::class,
        'password_at' => 'datetime',
        'email_confirmed_at' => 'datetime',
    ];

    public function getFullName(): string
    {
        return implode('', array_filter([
            $this->first_name,
            $this->middle_name,
            $this->last_name,

        ]));
    }

    public function updatePassword(string $password): bool
    {


        return $this->update([
            'password' => $password,
            'password_at' => now(),
        ]);
    }

    public function isEmailConfirmed(): bool
    {
        return (bool) $this->email_confirmed_at;
    }

    public function confirmEmail(): bool
    {
        return $this->update(['email_confirmed_at' => now()]);
    }


    
    public function updateEmail(string $email): bool
    {
        return $this->update([
            'email' => $email,
            'email_confirmed_at' => now(),
        ]);
    }


}
