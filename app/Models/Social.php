<?php

namespace App\Models;

use App\Enums\Social\SocialDriverEnum;
use App\Traits\BelongsToUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    use HasUuid;
    use BelongsToUser;

    protected $fillable = [
        'driver',
        'user_id',
        'driver_user_id',

    ];

    protected $casts = [

        'driver'=>SocialDriverEnum::class,
    ];
}
