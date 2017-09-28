@if ($errors->has($field))
    <span class="help-block text-danger">
        <strong>{{ $errors->first($field) }}</strong>
    </span>
@endif
