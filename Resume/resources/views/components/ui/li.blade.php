<div>
    <a {{ $attributes->merge(['class' => 'dropdown-item '.$isActive()]) }}>{{ $slot }}</a>
</div>