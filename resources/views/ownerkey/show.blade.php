<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ownerkey {{ $ownerkey->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/ownerkey') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/ownerkey/' . $ownerkey->id . '/edit') }}" title="Edit ownerkey"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('ownerkey' . '/' . $ownerkey->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete ownerkey" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $ownerkey->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $ownerkey->name }} </td></tr><tr><th> Key </th><td> {{ $ownerkey->key }} </td></tr><tr><th> User Id </th><td> {{ $ownerkey->user_id }} </td></tr><tr><th> Key Id </th><td> {{ $ownerkey->key_id }} </td></tr><tr><th> Game Id </th><td> {{ $ownerkey->game_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>