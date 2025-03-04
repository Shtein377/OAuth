<?php

namespace App\Console\Commands\Admin;

use App\Models\Admin;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admins:create';


    public function handle()
    {
        $admin = new Admin();
        $admin->name = $this->ask('Как твое имя');

        $admin->email = $this->ask('email', 'test@mail.ru');
        $admin->password = $this->ask('пароль', 'Secret123');

        $admin->save();

        $this->info('Пользователь создан');

    }
}
