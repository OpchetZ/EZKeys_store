<div class="form-group {{ $errors->has('no') ? 'has-error' : ''}}">
    <label for="no" class="control-label">{{ 'No' }}</label>
    <input class="form-control" name="no" type="text" id="no" value="{{ isset($keysgame->no) ? $keysgame->no : ''}}" >
    {!! $errors->first('no', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('key') ? 'has-error' : ''}}">
    <label for="key" class="control-label">{{ 'Key' }}</label>
    <input class="form-control" name="key" type="text" id="key" value="{{ isset($keysgame->key) ? $keysgame->key : ''}}" >
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('game_id') ? 'has-error' : ''}}">
    <label for="game_id" class="control-label">{{ 'Game Id' }}</label>
    <input class="form-control" name="game_id" type="text" id="game_id" value="{{ isset($keysgame->game_id) ? $keysgame->game_id : ''}}" >
    {!! $errors->first('game_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('key_id') ? 'has-error' : ''}}">
    <label for="key_id" class="control-label">{{ 'Key Id' }}</label>
    <input class="form-control" name="key_id" type="text" id="key_id" value="{{ isset($keysgame->key_id) ? $keysgame->key_id : ''}}" >
    {!! $errors->first('key_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>