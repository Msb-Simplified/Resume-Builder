<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Education</p>
                    <img src="{{ asset('Asset/icon/close1.svg')}}" style="height:30px; width:30px;cursor:pointer;" id="educationModalClose">
                </div>
            </div>
            <div class="modal-body">
                <div id="educationDiv"></div>
                <form method="POST" action="/addEducation">
                    @csrf
                    <input type="hidden" name="cvid" value="{{ $cvid }}" />
                    <textarea name="institutionField" class="educationfield summernote"></textarea>
                    <a class="float-right submit-Form-With-Js mt-2 btn btn-success" type="button">Add New</a>
                </form>
            </div>
        </div>
    </div>
</x-modal>


