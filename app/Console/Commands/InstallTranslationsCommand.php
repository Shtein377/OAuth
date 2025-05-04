<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Spatie\TranslationLoader\LanguageLine;

class InstallTranslationsCommand extends Command
{

    protected $signature = 'translations:install';


    protected $description = 'Перенести переводы в базу данных';

    private array $ignore = ['http-statuses'];


    public function handle()
    {

        $this->installTranslations();

        $this->info('Переводы перенесены');
    }


    private function installTranslations(): void
    {
        //пройтись по папкам lang

        //пройтись по файлам

        //получить содержимое

        //создать структуру данных

        //записать в базу


        $translations = $this->getTranslations();

        $this->createTranslations($translations);
      

       
    }


    private function getTranslations():array
    {


        $storage = Storage::disk('base');

        $translations = [

            // 'navbar' => ['home' => ['ru' => 'Главная', 'en' => 'Home']],
            // 'validation' => ['required' => ['ru' => 'Обязательно', 'en' => 'Required']],
        ];

        foreach ($storage->directories('lang') as $folder) {

            $lang = pathinfo($folder, PATHINFO_FILENAME);


            foreach ($storage->files($folder) as $file) {

                $group = pathinfo($file, PATHINFO_FILENAME);

                if (in_array($group, $this->ignore)) {
                    continue;
                }


                if (!isset($translations[$group])) {
                    $translations[$group] = [];
                }




                $array = Arr::dot(require $file);



                foreach ($array as $key => $text) {

                    if(empty($text)) continue;
                    
                    if (!isset($translations[$group][$key])) {
                        $translations[$group][$key] = [];
                    }

                    
                        $translations[$group][$key][$lang] = $text; 
                    
                    // dd($group, $key, $lang, $text);
                }
            }
        }

        return $translations;
    }

  private function createTranslations(array $translations):void{

    $models = LanguageLine::query()->get();

    foreach($translations as $group => $keys){

        foreach($keys as $key => $text){
           
            $model = $models
            ->where('group',$group)
            ->where('key',$key)->first() ?: new LanguageLine;
            


            $text = ($model->text ?? []) + $text;
            

            $model->fill(compact('group','key','text'))->save();
           
        }


    }

  }

}
