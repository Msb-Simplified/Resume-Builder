<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Profile Name</p>
                    <img src="{{ asset('Asset/icon/close1.svg')}}" style="height:30px; width:30px;cursor:pointer;" data-dismiss="modal">
                </div>
            </div>
            <div class="modal-body">
                <form id="cvpnameeditform">
                    <x-formgroup errorname="progile-namecheck">
                        <x-inputField id="profile-name-input" type="text" placeholder="Profile name" />
                        <x-groupprepend>
                            <span class="fas fa-solid fa-user-graduate"></span>
                        </x-groupprepend>
                    </x-formgroup>
                    <x-btn class="float-right update-cv-name-btn">Update</x-btn>
                </form>
            </div>
        </div>
    </div>
</x-modal>


@once
    @push('scripts')
      <script src="{{ url('/Asset/js/cv/nameupdate.js') }}"></script>
    @endpush
@endonce