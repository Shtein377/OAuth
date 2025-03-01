<?php

namespace App\Models;

use App\Enums\Email\EmailStatusEnum;
use App\Traits\BelongsToUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    use HasUuid;
    use BelongsToUser;

    protected $fillable = [
        'uuid',
        'user_id',
        'value',
        'status',
        'code',
    ];

    protected $casts = [

        'status'=> EmailStatusEnum::class,
        'code'=> 'encrypted',
    ];


    public static function booted(): void
    {
        self::creating(function (Email $email) {
            $email->code = code();
        });
    }


    
    public function complete(): bool
    {
        return $this->updateStatus(EmailStatusEnum::completed);
    }


    public function updateStatus(EmailStatusEnum $status): bool
    {

        if($this->status->is($status)){
            return false;
        }
       return $this->update(compact('status'));

    }



   
}
