<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Language & Frameworks</p>
                    <img src="{{ asset('Asset/icon/close1.svg')}}" style="height:30px; width:30px;cursor:pointer;" data-dismiss="modal">
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control select2 lang-select" name="language" multiple="multiple"  style="width:100%">
                        <option ></option>
                        <option value="cplus">cplus</option>
                        <option value="java">java</option>
                        <option value="js">js</option>
                        <option value="mongo">mongo</option>
                        <option value="mysql">mysql</option>
                        <option value="nodejs">nodejs</option>
                        <option value="php">php</option>
                        <option value="python">python</option>
                        <option value="react">react</option>
                        <option value="bootstrap">bootstrap</option>
                        <option value="expressjs">expressjs</option>
                    </select>
                    <x-btn class="float-right mt-3 updateLanguageBtn">Update</x-btn>
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