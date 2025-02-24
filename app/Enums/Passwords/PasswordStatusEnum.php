<?php 


namespace App\Enums\Passwords;

enum PasswordStatusEnum:string 
{
 case pending = 'pending';
 case completed = 'completed';
 case expired = 'expired';

 public function is(self $status): bool{
    return $this === $status;
 }
}