<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Keysgame {{ $keysgame->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/keygames') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/keygames/' . $keysgame->id . '/edit') }}" title="Edit Keysgame"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('keygames' . '/' . $keysgame->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Keysgame" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $keysgame->id }}</td>
                                    </tr>
                                    <tr><th> No </th><td> {{ $keysgame->no }} </td></tr><tr><th> User Id </th><td> {{ $keysgame->user_id }} </td></tr><tr><th> Key </th><td> {{ $keysgame->key }} </td></tr><tr><th> Game Id </th><td> {{ $keysgame->game_id }} </td></tr><tr><th> Key Id </th><td> {{ $keysgame->key_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>