<div class="card">
    <div class="card-body">
        <h5>{{ $project->title }}</h5>
        <p class="">{!! $project->details !!}</p>
        <small>Project Status</small>
        <div class="progress">
            {!! $project->progress() !!}
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <p class=""><span class="btn btn-sm">cost</span> <span class="pull-right btn btn-sm btn-outline-info"> {{ empty($project->cost)?'Unset':$project->cost }} </span></p>
        <p class=""><span class="btn btn-sm">started</span> <span class="pull-right btn btn-sm btn-outline-info"> {{ date('d M, Y', $project->start_date) }} </span></p>
        <p class=""><span class="btn btn-sm">due date</span> <span class="pull-right btn btn-sm btn-outline-info"> {{ date('d M, Y', $project->due_date) }} </span></p>
        <p class=""><span class="btn btn-sm">days left</span> <span class="pull-right btn btn-sm btn-outline-info"> {{ $project->daysleft() }} </span></p>
        <p class=""><span class="btn btn-sm">priority</span> <span class="pull-right btn btn-sm btn-outline-info"> {{ $project->priority()  }} </span></p>
        <p class=""><span class="btn btn-sm">status</span> <span class="pull-right btn btn-sm btn-outline-info"> {{ empty($project->status)?'Unset':$project->status }} </span></p>
    </div>
</div>