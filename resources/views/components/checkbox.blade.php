@php($id = Str::uuid())

<div class="form-check">
    <input type="checkbox" {{$attributes->merge([
        'value'=>1,
    ])}} id="{{$id}}" class="form-check-input">


    <label for="form-check-label" for="{{$id}}">
        {{$slot}}
    </label>
</div>