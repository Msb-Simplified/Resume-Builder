<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Profile Image</p>
                    <img src="{{ asset('Asset/icon/close1.svg')}}" style="height:30px; width:30px;cursor:pointer;" data-dismiss="modal">
                </div>
            </div>
            <div class="modal-body">
                <form id="cvimageeditform">
                    <div class="form-group">
                        <div class="custom-file">
                         <input id="imagechoser" type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)"/>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <x-btn class="float-left update-cv-image-btn">Update</x-btn>
                </form>
            </div>
        </div>
    </div>
</x-modal>


@once
    @push('styles')
      {{-- <link rel="stylesheet" href="{{ url('/Asset/css/components/modal/loginmodal.css') }}"> --}}
    @endpush
@endonce

@once
    @push('scripts')
      <script src="{{ url('/Asset/js/cv/image.js') }}"></script>
    @endpush
@endonce