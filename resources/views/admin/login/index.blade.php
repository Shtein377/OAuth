<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>

    @if ($errors->any())
    {{$errors->first()}}
    @endif
    <form action="{{route('admin.login.store')}}" method="post">

        @csrf

        <div>

            <input type="email" name="email" placeholder="Email">   
        </div>
        <div>

            <input type="password" name="password" placeholder="*******">   
        </div>

        <button type="submit">Войти</button>
    </form>
</body>
</html>