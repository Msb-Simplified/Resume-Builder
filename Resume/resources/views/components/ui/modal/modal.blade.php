<div {{ $attributes->merge(['class' => 'modal fade p-0 ']) }}  tabindex="-1" aria-hidden="true">
    {{ $slot }}
</div>

@once
    @push('styles')
      <link rel="stylesheet" href="{{ url('/Asset/css/components/modal/modal.css') }}">
    @endpush
@endonce



