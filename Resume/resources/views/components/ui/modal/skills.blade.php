<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Skills Add</p>
                    <img src="{{ asset('Asset/icon/close1.svg')}}" style="height:30px; width:30px;cursor:pointer;" data-dismiss="modal" class="ModalCloseRelode">
                </div>
            </div>
            <div class="modal-body">
                <div id="skillsdiv"></div>
                <form id="skillsform">
                    <x-formgroup>
                        <x-groupprepend><span class="fas fa-solid fa-user-graduate"></span>
                        </x-groupprepend>
                        <x-inputField id="skill-name-field" type="text" placeholder="Skill name" />
                        <x-inputField id="skill-percent-field" type="text" placeholder="60%" />
                        <x-groupappend style="cursor: pointer;" class="AddSkillsBtn" type="button">Add</x-groupappend>
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