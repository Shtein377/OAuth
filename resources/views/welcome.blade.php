<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('app_name')}}</title>

      
        
    </head>
    <body class="antialiased">

        <div>
            Hello {{ $name }},is {{now()}}
        </div>
       
    </body>
</html>
