<x-app-layout title="{{ $customer->name }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $customer->name }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">

                        <a href="{{ url('/customer') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/customer/' . $customer->id . '/edit') }}" title="Edit customer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('customer' . '/' . $customer->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete customer" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> User Id </th><td> {{ $customer->id }} </td></tr><tr><th> Name </th><td> {{ $customer->name }} </td></tr><tr><th> Email </th><td> {{ $customer->email }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        @php
                            $keygames = $customer->keygames()->get();
                            $game = $customer->game()->get();
                        @endphp
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Key Id</th>
                                        <th>Game name</th>
                                        
                                        <th>Key</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keygames as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->game->name }}</td>
                                            <td>{{ $item->key }}</td>
                                            
                                            
                                            {{-- <td>
                                                <a href="{{ url('/keygames/' . $item->id) }}"
                                                    title="View Keysgame"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/keygames/' . $item->id . '/edit') }}?game_id={{ $game->id }}"
                                                    title="Edit Keysgame"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</button></a>

                                                <form method="POST" action="{{ url('/keygames' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Keysgame"
                                                        onclick="return confirm('Confirm delete?')"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i>
                                                        Delete</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>