@props(['options', 'show', 'selected'])

@foreach ($options as $option)
    <option style="background-color:white;" value="{{$option->id}}" class="dropdown-item"
        @isset($selected)
            @if ($option->id == $selected)
                selected
            @endif
        @else
            @if ($option->id == old($show))
                selected
            @endif
        @endisset
        >
        {{strtoupper($option[$show])}}
    </option>
@endforeach