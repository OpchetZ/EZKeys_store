<x-app-layout title="Game">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <a href="{{ url('/game/create') }}" class="btn btn-success btn-sm" title="Add New game">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <form method="GET" action="{{ url('/game') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                        <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col"><b>Name</b></div>
                            <div class="col ml-2"><b>Price</b></div>
                            <div class="col"><b>Action</b></div>
                            <div class="col-2"></div>

                        </div>
                       
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <div class="table-responsive">
                            <table class="table">
                                {{-- <thead>
                                    <tr>
                                        <th>#</th><th>IMG</th><th>Name</th><th>Price</th><th>Actions</th>
                                    </tr>
                                </thead> --}}
                                
                                <tbody>
                                    
                                @foreach($game as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="width: 318px"><img src="{{ $item->photo }}" width="145px"/></td>
                                        <td style="width: 275px">{{ $item->name }}</td><td style="width: 125px">{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ url('/game/' . $item->id) }}" title="View game"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/game/' . $item->id . '/edit') }}" title="Edit game"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/game' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete game" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            
                                </tbody>
                            </table>
                        </div>
                            <div class="pagination-wrapper"> {!! $game->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>