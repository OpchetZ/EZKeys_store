{{-- <div class="form-group {{ $errors->has('game_id') ? 'has-error' : ''}}">
    <label for="game_id" class="control-label">{{ 'Game Id' }}</label>
    <input class="form-control" name="game_id" type="text" id="game_id" value="{{ isset($game->game_id) ? $game->game_id : ''}}" >
    {!! $errors->first('game_id', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($game->name) ? $game->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'price' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($game->price) ? $game->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>