{{--<nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color navba" id="mnav">--}}

<nav class="navbar navbar-dark bg-dark fixed-top shadow" style="background: #EEEEEE; color: #4b4b4b;">
    <div class="">

        <span type="" id="sidebarCollapse" class="">
            <b><i class="fa fa-bars"></i></b>
        </span>

        <span class="pull-right">
            <a href="{{ route('admin.logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
        </span>

        <span class="pull-right" style="margin-right:100px;">Synergy <b>Node</b></span>

        <span class="dropdown pull-right" style="margin-right:100px;">
            <a href="#" class="fa fa-question" data-toggle="dropdown" role="button" aria-expanded="false">
                @if(count($alerts)>0)
                    <i class="fa fa-question-circle"></i>
                    <span class="badge badge-top badge-danger">{{ count($alerts) }}</span>
                @endif

            </a>
             <ul class="dropdown-menu" role="menu" style="padding: 0;border: transparent; min-width: 240px;">
            @foreach($alerts as $alert)
                    <a href="{{ $alert->setRoute() }}" class="list-group-item">
                        <small>{{ $alert->setMessage($alert->table) }}</small>
                    </a>
            @endforeach
             </ul>


        </span>

    </div>


</nav>

