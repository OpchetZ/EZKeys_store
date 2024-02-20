<x-app-layout title="{{ $game->name }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $game->name }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <a href="{{ url('/game') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/game/' . $game->id . '/edit') }}" title="Edit game"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="{{ url('game' . '/' . $game->id) }}" accept-charset="UTF-8"
                            style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete game"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <td><img src="{{ $game->photo }}" width="500px" /></td>
                                        
                                    </tr>
                                    <tr>
                                        <th> Game ID </th>
                                        <td> {{ $game->id }} </td>
                                       
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $game->name }} </td>
                                       
                                    </tr>
                                    <tr>
                                        <th> Price </th>
                                        <td> {{ $game->price }} บาท </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        @php
                            $keygames = $game->keygames()->get();
                        @endphp
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                       
                                        <th>Game name</th>

                                        <th>Key</th>


                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keygames as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            
                                            <td>{{ $item->game->name }}</td>

                                            {{-- <td>{{ $item->user_id }}</td> --}}
                                            <td>{{ $item->key }}</td>


                                            <td>
                                                {{-- <a href="{{ url('/keygames/' . $item->id) }}"
                                                    title="View Keysgame"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i> View</button></a> --}}
                                                {{-- <a href="{{ url('/keygames/' . $item->id . '/edit') }}?game_id={{ $game->id }}"
                                                    title="Edit Keysgame"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</button></a> --}}

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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="text-center">
                            <a href="{{ url('/keygames/create') }}?game_id={{ $game->id }}"
                                class="btn btn-success btn-sm" title="Add New Keysgame">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
