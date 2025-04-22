<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\InstallLanguagesCommand;

class InstallCommand extends Command
{
   
    protected $signature = 'install';

  
    protected $description = 'Установить приложение';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $this->call(InstallLanguagesCommand::class);
        $this->info('Приложение установленно');
    }
}
