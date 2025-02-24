<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
trait BelongsToUser{


    public function user():BelongsTo
    {
       return $this->belongsTo(User::class);
    }
}