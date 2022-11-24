@if ($product->attributes)
    
@foreach($product->attributes as $att)
<div class="form-group col-lg-7">
    <label for="{{$att->en_name}}">{{ __('body.Choose') }} @if(app()->getLocale() == 'en') {{$att->en_name}} @else {{$att->name}} @endif</label>
    <select  name="options[{{$att->en_name}}]" class="form-control options">
        <option value=""></option>
            @foreach($att->options as $option)
        
                <option   option value="{{ $option->id }}" data-increment="{{ $product->getIncrement($option->id)->increment }}">@if(app()->getLocale() == 'en') {{ $option->en_option }} @else {{ $option->option }} @endif</option>
            @endforeach
    </select>
</div>
@endforeach
@endif
<div class="form-group col-lg-7">
    <label>{{__('adminBody.Quantity')}}</label>
    <input type="text" class="form-control" name="quantity">
</div>