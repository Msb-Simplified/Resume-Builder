<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Resume Builder Login</p>
                    <x-btn class="float-right userloginclosebtn" data-dismiss="modal">Close Modal</x-btn>
                </div>
            </div>
            <div class="modal-body">
                <form id="userloginform">
                    <x-formgroup errorname="loginusernamecheck">
                        <x-groupprepend>
                            <span class="fas fa-envelope"></span>
                        </x-groupprepend>
                        <x-inputField id="loginusername" type="text" placeholder="@Username" />
                    </x-formgroup>

                    <x-formgroup errorname="loginpasswordcheck">
                        <x-groupprepend>
                            <span class="fas fa-lock"></span>
                        </x-groupprepend>
                        <x-inputField id="loginpassword" type="text" placeholder="Password" />
                    </x-formgroup>
                    
                    <x-a class="signupmodalbtnopen control text-dark ">Signup</x-a>
                    <x-btn class="float-right userloginbtn">Login</x-btn>
                </form>
            </div>
        </div>
    </div>
</x-modal>


@once
    @push('styles')
      <link rel="stylesheet" href="{{ url('/Asset/css/components/modal/loginmodal.css') }}">
    @endpush
@endonce

@once
    @push('scripts')
      <script src="{{ url('/Asset/js/user/userlogin.js') }}"></script>
    @endpush
@endonce