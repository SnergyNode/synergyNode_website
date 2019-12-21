<div class="m-h-200">

    <form action="{{ route('client.build', $project->id) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <table class="table table-responsive">
                <thead>
                    <th>Img</th>
                    <th>Name</th>
                    <th>Select</th>
                    <th>Main</th>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>
                            <img src="{{ $user->setPhoto() }}" alt="" class="img-sm img-round">
                        </td>
                        <td>
                            {{ $user->setName() }}
                        </td>
                        <td>
                            <input name="userID[]" type="checkbox" value="{{ $user->id }}">
                        </td>
                        <td>
                            <input type="radio" name="teamlead" value="{{ $user->id }}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-dark">assign</button>
        </div>
    </form>



</div>