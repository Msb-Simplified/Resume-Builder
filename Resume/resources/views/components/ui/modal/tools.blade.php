<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Tools</p>
                    <img src="{{ asset('Asset/icon/close1.svg')}}" style="height:30px; width:30px;cursor:pointer;" data-dismiss="modal">
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control select2 tools-select" multiple="multiple"  style="width:100%">
                            <option></option>
                            <option value="Android Studio">Android Studio</option>
                            <option value="Git">Git</option>
                            <option value="Github Desktop">Github Desktop</option>
                            <option value="Obs">Obs</option>
                            <option value="Postman">Postman</option>
                            <option value="Vscode">Vscode</option>
                        </select>
                        <x-btn class="float-right mt-3 updateToolsBtn">Update</x-btn>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-modal>


@once
    @push('scripts')
      <script src="{{ url('/Asset/js/cv/nameupdate.js') }}"></script>
    @endpush
@endonce