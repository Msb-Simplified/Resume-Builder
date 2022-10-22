<div>
    <a data-backdrop="static" data-toggle="modal" {{ $attributes->merge(['class' => 'dropdown-item '.$isActive(),'data-target' =>'#'.$modalid(),'id' =>'#'.$modalid()]) }}>{{ $slot }}</a>
</div>