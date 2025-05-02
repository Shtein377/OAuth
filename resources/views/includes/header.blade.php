<header class="py-3 border-bottom">

   <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link  fs-5" aria-current="page" href="#">{{__('Главная')}}</a>
            </li>
            <li class="nav-item fs-5">
              <a class="nav-link" href="{{route('blog')}}">{{__('Блог')}}</a>
            </li>
            <li class="nav-item fs-5">
              <a class="nav-link" href="#">{{__('Блог')}}</a>
            </li>
            <li class="nav-item fs-5">
              <a class="nav-link" href="#">{{__('Блог')}}</a>
            </li>
            <li class="nav-item fs-5">
              <a class="nav-link" href="#">{{__('Блог')}}</a>
            </li>
            <li class="nav-item fs-5">
              <a class="nav-link" href="#">{{__('Блог')}}</a>
            </li>
            
            
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <ul class="navbar-nav  mb-2 mb-lg-0">
            <li class="nav-item fs-5">
              <a href="{{route('login')}}" class="nav-link {{ active_link('login') }}" aria-current="page"  >{{__('Вход')}}</a>
            </li>
            <li class="nav-item fs-5">
              <a href="{{route('register')}}" class="nav-link {{ active_link('register') }}" aria-current="page" >{{__('Регистрация')}}</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   </div>
  
   
</header>