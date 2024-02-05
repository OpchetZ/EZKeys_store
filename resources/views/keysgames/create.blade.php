<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Keygame') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <a href="{{ route('game.show', request('game_id')) }}" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/keygames') }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <div class="form-group {{ $errors->has('game_id') ? 'has-error' : '' }}">
                                <label for="name" class="control-label">{{ 'Game ID' }}</label>
                                <input class="form-control" name="game_id" type="text" id="game_id"
                                    value="{{ isset($game->game_id) ? $game->game_id : request('game_id') }}" readonly>
                                {!! $errors->first('game_id', '<p class="help-block">:message</p>') !!}
                            </div>
                            {{-- <div class="form-group {{ $errors->has('key_id') ? 'has-error' : ''}}">
    <label for="key_id" class="control-label">{{ 'Key Id' }}</label>
    <input class="form-control" name="key_id" type="text" id="key_id" value="{{ isset($keysgame->id) ? $keysgame->id : request('id')}}" >
    {!! $errors->first('key_id', '<p class="help-block">:message</p>') !!}
</div> --}}
                            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                                <label for="key" class="control-label">{{ 'Key' }}</label>
                                <input class="form-control" name="key" type="text" id="key"
                                    value="{{ isset($keysgame->key) ? $keysgame->key : '' }}">
                                {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="{{'Create'}}">
                            </div>






                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
