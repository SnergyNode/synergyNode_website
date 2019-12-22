<div class="card mt-4">
    <div class="card-body">

        <h6>Assigned Teams

            <a href="{{ route('team.edit', $project->id) }}" title="Click to edit Team Members" class="btn btn-outline-info pull-right ml-2" rel="modal:open"> <i class="fa fa-edit"></i></a>
            <a href="{{ route('team.create', $project->id) }}" title="Click to add Team Members" class="btn btn-outline-danger pull-right ml-2" rel="modal:open"> <i class="fa fa-plus"></i></a>
        </h6>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <img src="{{ url('images/synergy.png') }}" alt="" class="img-fit img-round">
            </div>
            <div class="col-sm-9">
                <p class="text-black mb-0"><b>Synergy Node Ltd</b></p>
                <p class="mb-0"><small>{{ _('info@synergynode.com') }}</small></p>
                <p class="mb-0"><b><small>{{ _('Project Manager') }}</small></b></p>

            </div>
        </div>
        <hr>

        @foreach($teams as $team)
            <div class="row mb-2">
                <div class="col-sm-3 text-center">
                    <img src="{{ url($team->user()->setPhoto()) }}" alt="" class="img-tiny img-round">
                </div>
                <div class="col-sm-9">
                    <p class="text-black mb-0 fs-12"><b>{{ $team->user()->setName() }}</b></p>
                    <p class="mb-0 fs-12"><small>{{$team->team_lead?'Team Lead':'' }}</small></p>
                </div>
            </div>

        @endforeach

    </div>
</div>