<option value="" selected>Nothing Selected</option>
@foreach ($subtypes as $item)
    <option value="{{ $item->subtype }}">{{ $item->subtype }}</option>
@endforeach
