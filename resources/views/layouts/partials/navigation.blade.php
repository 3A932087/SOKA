<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!--LOGO-->
    <a class="navbar-brand" href="#">SOKA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--導覽標籤-->
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">積分版 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <div class="d-block d-lg-none">
                <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#collapseTeamCall" role="button" aria-expanded="false" aria-controls="collapseExample">
                    小隊隊呼
                </a>
                <div class="collapse px-1 " id="collapseTeamCall">
                    @foreach ($teams as $team)
                    <a class="list-group-item-action stretched-link" href="{{route('teamcall.show',$team->id)}}">
                        <div class=" p-2 nav-link border-bottom ">
                            {{$team->name}}
                        </div>
                    </a>
                    @endforeach
                    
                </div>
            </div>
            <div class="d-none d-lg-block">
                <a class="nav-link dropdown-toggle" href="#" id="navbarTeamCall" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    小隊隊呼
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarTeamCall">
                    @foreach ($teams as $team)
                        <a class="dropdown-item" href="{{route('teamcall.show',$team->id)}}">{{$team->name}}</a>
                    @endforeach
                </div>
            </div>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">美好時刻</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">回饋表單</a>
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
