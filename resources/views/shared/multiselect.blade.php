@php

    $name ??= '';
    $class ??= '';

@endphp



<div @class(['form-group', $class])>



    @php
        $optionIds = $property->options->pluck('id');
    @endphp

    <label for="name[]"> Sélection des options du bien</label>
    <select class="form-select @error('name') is-invalid  @enderror" multiple name="name[]">
        <option disabled> <strong>Selection des options de votre bien</strong> </option>

        @foreach ($options as $option)
            <option @selected($optionIds->contains($option->id)) value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>

    @error('name')
        <div class="invalid-feedback">
            Veuillez selectionner au moins une option

        </div>
    @enderror
</div>
