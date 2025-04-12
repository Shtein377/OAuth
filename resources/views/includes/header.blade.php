<header class="py-3 border-bottom">

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="#">{{config('app.name')}}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-collapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link active fs-5" aria-current="page" >{{__('Главная')}}</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('blog')}}" class="nav-link fs-5" >{{__('Блог')}}</a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link fs-5" >{{__('Родители')}}</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link fs-5" >{{__('Подростки')}}</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link fs-5" >{{__('Видео')}}</a>
                  </li>
               
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">{{__('Поиск')}}</button>
                </form>
                <ul class="navbar-nav  ms-lg-1">
                  <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link fs-5">
                        {{__('Вход')}}
                    </a>
                  </li>
                  <li class="register nav-item">
                    <a href="{{route('register')}}" class="nav-link fs-5">
                      {{__('Регистрация')}}
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

    </div>
  
   
</header>