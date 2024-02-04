<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($ownerkey->name) ? $ownerkey->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('key') ? 'has-error' : ''}}">
    <label for="key" class="control-label">{{ 'Key' }}</label>
    <input class="form-control" name="key" type="text" id="key" value="{{ isset($ownerkey->key) ? $ownerkey->key : ''}}" >
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($ownerkey->user_id) ? $ownerkey->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('key_id') ? 'has-error' : ''}}">
    <label for="key_id" class="control-label">{{ 'Key Id' }}</label>
    <input class="form-control" name="key_id" type="number" id="key_id" value="{{ isset($ownerkey->key_id) ? $ownerkey->key_id : ''}}" >
    {!! $errors->first('key_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('game_id') ? 'has-error' : ''}}">
    <label for="game_id" class="control-label">{{ 'Game Id' }}</label>
    <input class="form-control" name="game_id" type="number" id="game_id" value="{{ isset($ownerkey->game_id) ? $ownerkey->game_id : ''}}" >
    {!! $errors->first('game_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>