<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Experence</p>
                    <img src="{{ asset('Asset/icon/close1.svg')}}" style="height:30px; width:30px;cursor:pointer;" class="ModalCloseRelode">
                </div>
            </div>
            <div class="modal-body">
                <div id="experenceDiv"></div>
                <form>
                    <textarea  class="experenceField summernote"></textarea>
                    <a class="float-right addExperenceBtn mt-2 btn btn-success" type="button">Add New</a>
                </form>
            </div>
        </div>
    </div>
</x-modal>


