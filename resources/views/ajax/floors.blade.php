<option value="" selected>Nothing Selected</option>
@foreach ($floors as $item)
    <option value="{{ $item->floor }}" data-possession="{{ $item->possession }}" data-downpayment="{{ $item->downpayment }}">{{ $item->floor }}</option>
@endforeach
