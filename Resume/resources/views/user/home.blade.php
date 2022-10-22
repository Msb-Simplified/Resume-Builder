@extends('layout.user')


@section('title')
   Resume Builder
@endsection


<!-- Here include menubar -->
@include('components.usernav')


<x-ui.modal.loginmodal  id="userloginmodal"/>