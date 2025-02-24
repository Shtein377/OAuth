<?php

namespace App\Console\Commands\Email;

use App\Enums\Email\EmailStatusEnum;
use App\Enums\Passwords\PasswordStatusEnum;
use App\Models\Email;
use App\Models\Password;
use Illuminate\Console\Command;

class ExpireEmailsCommand extends Command
{
   
    protected $signature = 'emails:expire';

   
    

   
    public function handle()
    {
      $this->warn('Просроченный email.......');
      $this->expireEmails();
      $this->info('Emal просроченн.......');
    }

    private function expireEmails(): void
    {
        Email::query()
            ->where('status', PasswordStatusEnum::pending)
            ->where('created_at', '<=', now()->subWeek())
            ->update(['status' => EmailStatusEnum::expired]);
    }
}
