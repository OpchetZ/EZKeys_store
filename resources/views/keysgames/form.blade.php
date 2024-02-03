
<div class="form-group {{ $errors->has('game_id') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Game ID' }}</label>
    <input class="form-control" name="game_id" type="text" id="game_id" value="{{ isset($game->game_id) ? $game->game_id : request('game_id') }}" readonly>
    {!! $errors->first('game_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('key_id') ? 'has-error' : ''}}">
    <label for="key_id" class="control-label">{{ 'Key Id' }}</label>
    <input class="form-control" name="key_id" type="text" id="key_id" value="{{ isset($keysgame->key_id) ? $keysgame->key_id : ''}}" >
    {!! $errors->first('key_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('key') ? 'has-error' : ''}}">
    <label for="key" class="control-label">{{ 'Key' }}</label>
    <input class="form-control" name="key" type="text" id="key" value="{{ isset($keysgame->key) ? $keysgame->key : ''}}" >
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div>





<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>