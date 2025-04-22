<?php

namespace App\Console\Commands;

use App\Models\Language;
use Illuminate\Console\Command;

class InstallLanguagesCommand extends Command
{
    protected $signature = 'languages:install';


    protected $description = 'Установить языки';


    public function handle()
    {

        $this->createLanguages();

        $this->info('Языки установленны');
    }


    private function createLanguages()
    {
        $templates = [

            [
                'id' => 'ru',
                'name' => 'русский',
                'active' => true,
                'default' => true,
                'fallback' => false,
            ],

            [
                'id' => 'en',
                'name' => 'english',
                'active' => true,
                'default' => false,
                'fallback' => true,
            ],

            [
                'id' => 'es',
                'name' => 'spain',
                'active' => true,
                'default' => false,
                'fallback' => false,
            ],

            [
                'id' => 'it',
                'name' => 'italian',
                'active' => false,
                'default' => false,
                'fallback' => false,
            ],
        ];

        Language::query()->upsert( $templates, 'id');
    }
}
