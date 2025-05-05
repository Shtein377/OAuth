<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;

use Spatie\TranslationLoader\LanguageLine;

class Translation extends LanguageLine
{
   public function scopeFilter(Builder $query, array $filter = []):Builder
   {
    $validated = validator($filter, [
        'group'=> ['nullable','string','max:50'],

        'key'=> ['nullable','string','max:50'],

        'search'=> ['nullable','string','max:100'],

      ])->validate();


    //   $query = Translation::query();


      if($group = ($validated['group'] ?? null))
      {
        $query->where('group', $group);
      }

      if($key = ($validated['key'] ?? null))
      {
        $query->where('key', $key);
      }

      if($search = ($validated['search'] ?? null))
      {
        $query->whereRaw('JSON_UNQUOTE(JSON_EXTRACT(text, "$")) LIKE ? ESCAPE "\\\\"', ["%{$search}%"]);
      }

      return $query;
   }
}
