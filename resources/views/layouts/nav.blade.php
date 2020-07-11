<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item">

            @if (Auth::user()->role == 0)
            <a href="/admin" class="nav-link">
                @elseif (Auth::user()->role == 1)
                <a href="/candidate" class="nav-link">
                    @else
                    <a href="/voter" class="nav-link">
                        @endif

                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
        </li>

        @if (Auth::user()->role == 'Admin')
        <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Managing Users
                </p>
            </a>
        </li>
        @endif

        @if (Auth::user()->role == 'Admin')
        <li class="nav-item">
            <a href="{{route('approval.index')}}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Approve New Users
                </p>
            </a>
        </li>
        @endif

        @if (Auth::user()->role == 'Candidate')
        <li class="nav-item">
            <a href="{{route('manifesto.index')}}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Manifesto
                </p>
            </a>
        </li>
        @endif


        <li class="nav-item">
            <a href="{{route('candidate_list.index')}}" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                    Candidates List
                </p>
            </a>
        </li>




        <li class="nav-item">
            <a href="{{route('election.index')}}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Election
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-sign-out"></i>
                <p>
                    Logout
                </p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>
        </li>


    </ul>
</nav>