<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!--LOGO-->
    <a class="navbar-brand" href="#">SOKA Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--導覽標籤-->
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.team.index')}}">小隊管理 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.fraction.index')}}">分數管理</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.link.index')}}">連結管理</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.account.index')}}">帳號管理</a>
        </li>
      </ul>
      <!--登入-->
      <!--辨識是否為登入狀態顯示不同按鈕-->
          @if (Route::has('login'))
              <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                  @auth
                    <span>Hi,{{Auth::user()->name}}</span>
                      <a class="btn btn-outline-info" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          {{ __('登出') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  @else
                      <a href="{{ route('login') }}" class="btn btn-outline-info">Log in</a>
                  @endauth
              </div>
          @endif
    </div>
  </nav>
