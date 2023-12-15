@props(['groups', 'field' => '','selected' => null])

<select {{ $attributes->merge(['class' => 'form-select']) }}>
    @foreach ($groups as $group)
        <option value="{{ $group->id }}" {{ $selected == $group->id ? 'selected' : '' }}>
            {{ $group->group_name }}
        </option>
    @endforeach
</select>

@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
