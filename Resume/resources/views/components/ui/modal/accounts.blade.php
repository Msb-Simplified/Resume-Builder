<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Acounts Handler</p>
                    <img src="{{ asset('Asset/icon/close1.svg')}}" style="height:30px; width:30px;cursor:pointer;" data-dismiss="modal">
                </div>
            </div>
            <div class="modal-body">
                <form method="POST" action="/addAccount" id="accountsform">
                    @csrf
                    <div class="accountsdiv">
                    </div>
                    <x-formgroup>
                        <x-groupprepend><span class="fas fa-solid fa-user-graduate"></span>
                        </x-groupprepend>
                        <x-inputField id="profile-accounts-input" type="text" placeholder="Site name" />
                        <x-inputField id="profile-accounts-input" type="text" placeholder="Account handler" />
                        <x-groupappend style="cursor: pointer;" class="submit-Form-With-Js" type="button"> Save</x-groupappend>
                    </x-formgroup>
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