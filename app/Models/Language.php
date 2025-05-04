<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use PhpParser\Node\Stmt\Static_;

/**
 * @property int $id
 * @property string $name
 * @property bool $active
 * @property bool $default
 * @property bool $fallback
 */
class Language extends Model


{

    protected $keyType = 'string';

    public $incrementing = false;
    protected $fillable = [
        'id',
        'name',
        'active',
        'default',
        'fallback',
        'date_format',
    ];

    protected $casts = [
        'active' => 'boolean',
        'default' => 'boolean',
        'fallback' => 'boolean',
    ];



    public static function booted():void{
        static::saved(function(self $model){

            Cache::forget('languages');

        });

        static::deleted(function(self $model){

            Cache::forget('languages');

        });
    }


    public function getStateText(): string
    {


        $state = [];

        if ($this->active) {
            $state[] = 'Активный';
        }

        if ($this->default) {
            $state[] = 'По умолчанию';
        }

        if ($this->fallback) {
            $state[] = 'Резервный';
        }

        return implode(',', $state);
    }

    public static function findDefault(): self|null
    {
        return self::getActive()->firstWhere('default', true);
    }

    public static function findFallback(): self|null
    {
        return self::getActive()->firstWhere('fallback', true);
    }


    
    public static function findActive(string $id): self
    {
        return self::getActive()
        ->firstWhere('id', $id);
    }


    public static function getActive(): Collection
    {
        return Cache::remember(

            key: 'languages',

            ttl: now()->addDay(),

            callback: function () 
            {
                return self::query()

                    ->where('active', true)
                    
                    ->get();
            }

        );
    }


    public static function routePrefix(): string|null
    {

        $activeLanguages = self::getActive();
        $prefix = request()->segment(1);


        if ($activeLanguages->doesntContain('id', $prefix)) {
            $prefix = null;
        }


        return $prefix;
    }
}
