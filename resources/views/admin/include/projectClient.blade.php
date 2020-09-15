<div class="card mt-4 mb-4">
    <div class="card-body ">
        <h6>Clients Information

            <a href="{{ route('client.assign', $project->id) }}" title="Click to add Team Members" class="btn btn-dark pull-right" rel="modal:open"> <i class="fa fa-plus"></i></a>
        </h6>
        <hr>
        <div class=" mt-4">
            @foreach($project->clients() as $client)
                <div class="row mb-2">
                    <div class="col-sm-3 text-center">
                        <img src="{{ url($client->client()->setPhoto()) }}" alt="" class="img-sm img-round">
                    </div>
                    <div class="col-sm-9">
                        <p class="text-black mb-0 fs-12"><b>{{ $client->client()->setName() }}</b></p>
                        <p class="mb-0 fs-12"><small>{{$client->lead?'Lead Client':'' }}</small></p>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>