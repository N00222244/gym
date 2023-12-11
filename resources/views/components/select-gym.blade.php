@props(['gyms', 'field' => '','selected' => null])

<select {{ $attributes->merge(['class' => 'form-select']) }}>
    @foreach ($gyms as $gym)
        <option value="{{ $gym->id }}" {{ $selected == $gym->id ? 'selected' : '' }}>
            {{ $gym->name }}
        </option>
    @endforeach
</select>

@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
