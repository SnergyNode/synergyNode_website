<!-- Sidebar -->

<nav id="sidebar">
    <br>
    <div class="row">
        <div class="col-sm">
            <h3>
                <p class="text-center">
                    <img class="img-small" src="{{ url('images/synergy.png')  }}" alt="">
                </p>
            </h3>
            <div id="dismiss">
                <i class="fa fa-arrow-left"></i>
            </div>
        </div>
    </div>



    <div class="sidebar-header">
        <a href="{{ route('admin.profile', $person->unid) }}"><img src="{{ url($person->setPhoto()) }}" class="img-sm img-round" alt=""></a>

        <small style="color: #8c8c8c;"> <b>{{ $person->title. ' '. $person->first_name }}</b></small>

    </div>

    <ul class=" list-unstyled components" id="sidenav-bar">
        {{--<p>Dummy Heading</p>--}}

        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ @$active['dashboard'] }}"><small>Dashboard</small></a>
        </li>
        <li>
            <a href="{{ route('project.index') }}" class="{{ @$active['project'] }}"><small>Project | Task</small></a>
        </li>
        <li>
            <a href="{{ route('admin.index') }}" class="{{ @$active['admin'] }}"><small>Admin</small></a>
        </li>
        <li>
            <a href="{{ route('client.index') }}" class="{{@$active['client']}}"><small>Clients</small></a>
        </li>
        <li>
            <a href="{{ route('visits.index') }}" class="{{@$active['visits']}}"><small>Visits</small></a>
        </li>
        <li>
            <a href="{{ route('servic.index') }}" class="{{ @$active['servic'] }}"><small>Services</small></a>
        </li>
        <li>
            <a href="{{ route('blog.index') }}" class="{{ @$active['blog'] }}"><small>Blog</small></a>
        </li>
        <li>
            <a href="{{ route('synergy.index') }}" class="{{ @$active['siteinfo'] }}"><small>Site Info</small></a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><small>More</small> <i class="fa fa-chevron-down pull-right"></i></a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="{{ route('quote.index') }}">Quotes</a>
                </li>
                <li>
                    <a href="#">Messenger</a>
                </li>
                <li>
                    <a href="#">Visitors</a>
                </li>
            </ul>
        </li>




    </ul>
</nav>