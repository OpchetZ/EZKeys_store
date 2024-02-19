{{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'Customer Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($customer->id) ? $customer->id : ''}}">
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div> --}}
{{-- <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($customer->name) ? $customer->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>s
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($customer->email) ? $customer->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User' }}</label>
    {{-- <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($quotation->user_id) ? $quotation->user_id : ''}}" > --}}
    <select class="form-select" name="user_id" id="user_id" required>
        <option value="">รายชื่อลูกค้า</option>
        @foreach($user as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <script>
        document.querySelector("#user_id").value = "{{ isset($user->user_id) ? $user->user_id : Auth::id()}}";
    </script>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'Email' }}</label>
    
    <select class="form-select" name="user_id" id="user_id" required>
        <option value="">email</option>
        @foreach($user as $item)
        <option value="{{ $item->id }}">{{ $item->email }}</option>
        @endforeach
    </select>
    <script>
        document.querySelector("#user_id").value = "{{ isset($quotation->user_id) ? $customer->user_id : Auth::id()}}";
    </script>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div> --}}



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>