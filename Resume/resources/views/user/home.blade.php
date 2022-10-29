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



<x-ui.modal.image  id="editimage"/>
<x-ui.modal.profilename  id="editname"/>
<x-ui.modal.profiletitle  id="edittitle"/>


<div id="loader"></div>

@endsection






@once
    @push('scripts')
      <script src="{{ url('/Asset/js/user/app.js') }}"></script>
      <script src="{{ url('/Asset/js/user/logout.js') }}"></script>
      <script src="{{ url('/Asset/js/user/edit.js') }}"></script>
    @endpush
@endonce