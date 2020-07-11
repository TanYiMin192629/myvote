<header class="navbar navbar-expand flex-column flex-sm-row navbar-dark bg-dark">

    @guest
    <a href="/" class="navbar-brand">MyVote</a>
    @endguest

    @auth
    @if (Auth::user()->role == 0)
    <a href="/admin" class="navbar-brand">MyVote</a>
    @elseif (Auth::user()->role == 1)
    <a href="/candidate" class="navbar-brand">MyVote</a>
    @else
    <a href="/voter" class="navbar-brand">MyVote</a>
    @endif
    @endauth

   
    <ul class="navbar-nav ml-sm-auto">
        
          @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                     </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
       @endif
    </ul>
</header>
