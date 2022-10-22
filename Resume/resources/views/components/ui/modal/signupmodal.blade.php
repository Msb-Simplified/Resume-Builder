<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Resume Builder</p>
                    <x-btn class="float-right userloginclosebtn" data-dismiss="modal">Close Modal</x-btn>
                </div>
            </div>
            <div class="modal-body">
                <form id="usersignupform">
                    <x-formgroup errorname="usercheck">
                        <x-groupprepend>
                            <span class="fas fa-envelope"></span>
                        </x-groupprepend>
                        <x-inputField id="signupusername" type="text" placeholder="@Username" />
                    </x-formgroup>

                    <x-formgroup errorname="passcheck">
                        <x-groupprepend>
                            <span class="fas fa-lock"></span>
                        </x-groupprepend>
                        <x-inputField id="signupuserpassword" type="text" placeholder="Password" />
                    </x-formgroup>

                    <x-a class="siginmodalbtnopen control">Login</x-a>
                    <x-btn class="float-right usersignupbtn">Signup</x-btn>
                </form>
            </div>
        </div>
    </div>
</x-modal>


@once
    @push('scripts')
      <script src="{{ url('/Asset/js/user/app.js') }}"></script>
      <script src="{{ url('/Asset/js/user/usersignup.js') }}"></script>
    @endpush
@endonce