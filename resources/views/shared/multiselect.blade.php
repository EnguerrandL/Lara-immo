@php

    $name ??= '';
    $class ??= '';

@endphp



<div @class(['form-group', $class])>


{{--    
@php
@selected($optionIds->contains($option->id)) 
    $optionIds = $property->options->pluck('id');
@endphp --}}

    <select class="form-select @error($name) is-invalid  @enderror"  multiple name="name[]">
        <option disabled> <strong>Selection des options de votre bien</strong> </option>

        @foreach ($options as $option)
            <option   value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>


    @error($name)
        <div class="invalid-feedback">
            {{ $message }}

        </div>
    @enderror
</div>
