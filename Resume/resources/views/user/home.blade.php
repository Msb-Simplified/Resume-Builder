@extends('layout.user')


@section('title')
   Resume Builder
@endsection



@section('content')
<!-- Here include menubar -->
@include('components.usernav')
@include('components.example')

<x-ui.modal.loginmodal  id="userloginmodal"/>
<x-ui.modal.signupmodal  id="usersignupmodal"/>
<x-ui.modal.sendcvmodalform  id="sendcvmodalform"/>
<div id="loader"></div>

@endsection






@once
    @push('scripts')
      <script src="{{ url('/Asset/js/user/app.js') }}"></script>
      <script src="{{ url('/Asset/js/user/logout.js') }}"></script>
      
    @endpush
@endonce