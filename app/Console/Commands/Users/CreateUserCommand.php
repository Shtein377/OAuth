<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create';

   
    public function handle()
    {
      $user = new User();
      $user->first_name = $this->ask('Как твое имя');
      $user->middle_name = $this->ask('Как твое отчество');
      $user->last_name = $this->ask('Как твоя фамилия');
      $user->email = $this->ask('email','test@mail.ru');
      $user->password = $this->ask('пароль', 'Secret123');

      $user->save();

      $this->info('Пользователь создан');

    }
}
