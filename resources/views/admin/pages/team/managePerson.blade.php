<div class="m-h-200">

    <div>
        <div class="form-group">
            <table class="table table-responsive">
                <thead>
                    <th>Img</th>
                    <th>Name</th>
                    <th>Select</th>
                    <th>Lead</th>
                </thead>
                <tbody>

                @foreach($teams as $team)
                    <tr>
                        <td>
                            <img src="{{ $team->user()->setPhoto() }}" alt="" class="img-sm img-round">
                        </td>
                        <td>
                            {{ $team->user()->setName() }}
                        </td>
                        <td>
                            <a title="make teamlead" href="#" class="btn btn-small btn-outline-success"><i class="fa fa-user-secret"></i></a>
                        </td>
                        <td>
                            <a title="remove from team" href="{{ route('team.pop', $team->id) }}" class="btn btn-small btn-outline-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>



</div>