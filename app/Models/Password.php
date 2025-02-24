<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Enums\Passwords\PasswordStatusEnum;
use App\Traits\BelongsToUser;

class Password extends Model
{
    use HasFactory;
    use HasUuid;
    use BelongsToUser;

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

   
   
 

    public function updateStatus(PasswordStatusEnum $status): bool
    {

        if($this->status->is($status)){
            return false;
        }
       return $this->update(compact('status'));

    }


}
