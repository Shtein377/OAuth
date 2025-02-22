<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Enums\Passwords\PasswordStatusEnum;
use App\Traits\BelongsToUser;

class Password extends Model
{
    use HasFactory;

    protected $fillable = [
        "uuid",
        "email",
        "user_id",
        "status",
        "ip",
    ];

    protected $casts = [
     "status"=> PasswordStatusEnum::class,

    ];

    public static function booted(): void
    {
        static::creating(function (Password $password) {
            $password->fill(['uuid' => uuid()]);
        });
    }
   
 public function user(){
    return $this->belongsTo(User::class);
 }

    public function updateStatus(PasswordStatusEnum $status): bool
    {

        if($this->status->is($status)){
            return false;
        }
       return $this->update(compact('status'));

    }


}
