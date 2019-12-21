@if (session('status'))
    <div class="alert alert-success radius50" style="margin: 0 15px 20px 15px">
        {{ session('status') }}
    </div>
    <br>
@endif

@if(session('message'))
    <br>
    <div class="alert alert-info radius50" style="margin: 0 15px 20px 15px">
        {!! session('message') !!}
        <a href="#" class="close pull-right" data-dismiss="alert" aria-label="close">&times;</a>
    </div>

@endif

@if(count($errors) > 0)
    <br>
    <div >
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li class="alert alert-danger radius50" style="margin: 0 15px 20px 15px" >
                    <i class="fa fa-warning" style="margin: 0px 9px"></i> {{ $error }}
                    <a href="#" class="close pull-right" data-dismiss="alert" aria-label="close">&times;</a>
                </li>

            @endforeach
        </ul>
    </div>

@endif