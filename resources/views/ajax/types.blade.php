<option value="" selected>Nothing Selected</option>
@foreach ($types as $item)
    <option value="{{ $item->type }}">{{ $item->type }}</option>
@endforeach
