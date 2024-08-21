<div class="topo">

    <div class="logo">
        <a href="{{ route('site.index') }}"><img src="{{ asset('img/logo.png') }}"></a>
    </div>

    <div class="menu">
        <ul>
            @guest
            @if (Route::has('login'))
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
            
            @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                </li>
            @endif
        @else
        <li><a href="{{ route('app.home_cliente') }}" >Cliente</a></li>
        <li><a href="{{ route('app.home') }}" >Home</a></li>
            <li>
                <a href="#" role="button" >
                    {{ Auth::user()->name }}
                </a>

                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
            </li>
        @endguest
        </ul>
    </div>
</div>