<div class="card">
    <div class="card-body">
        <h6>Project Activity</h6>
        <form action="{{ route('project.add.activity', $project->id) }}" method="post">
            {{ csrf_field() }}
            <textarea rows="2" name="notes" class=" form-control">{!! old('notes') !!}</textarea>
            <br>
            <button class="btn btn-dark " type="submit">Update</button>
        </form>
    </div>
</div>

<div class="card mt-5">
    <div class="card-body m-h-200">
        <h6>Activity Time-line</h6>
        <hr>

        @foreach($project->timelines as $timeline)
            <div class="card ">
                <div class="card-body">
                    <small><b>{{ $timeline->author()->first_name }}</b></small>
                    <br>
                    {{ $timeline->notes }}
                </div>
            </div>
        @endforeach

    </div>
</div>