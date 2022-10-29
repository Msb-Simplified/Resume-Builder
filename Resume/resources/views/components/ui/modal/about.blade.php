<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>About Yourself</p>
                    <img src="{{ asset('Asset/icon/close1.svg')}}" style="height:30px; width:30px;cursor:pointer;" data-dismiss="modal">
                </div>
            </div>
            <div class="modal-body">
                <form method="POST" action="/updateAbout" id="updateaboutform">
                    @csrf
                    <input type="hidden" name="cvid" value="{{ $cvid }}" />
                    <textarea name="aboutfield" class="aboutfield summernote" id="aboutsummernote"></textarea>
                    <x-btn class="float-right submit-Form-With-Js mt-2" type="button">Update</x-btn>
                </form>
            </div>
        </div>
    </div>
</x-modal>


