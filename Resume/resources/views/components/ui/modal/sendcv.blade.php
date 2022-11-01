<x-modal data-backdrop="static" {{ $attributes }}>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="userloginheader">
                    <p>Resume Builder Login</p>
                    <x-btn class="float-right userloginclosebtn" data-dismiss="modal">Close Modal</x-btn>
                </div>
            </div>
            <div class="modal-body">
                <div class="lockscreen-wrapper">

                    <div class="lockscreen-item">

                        <div class="lockscreen-image">
                            @if (isset($userdata))
                              <img src="{{ asset('Asset/user/'. $userdata->userhasmanycvrelation[0]->image) }}" style="height: 70px; width:70px;">
                            @else
                              <img src="{{ asset('Asset/image/default.png') }}" >
                            @endif
                        </div>



                        <form class="lockscreen-credentials" method="POST" action="/send">
                            @csrf
                            <div class="input-group">
                                <input name="sendingaddress" type="email" class="form-control"
                                    placeholder="email@gmail.com">
                                <div class="input-group-append">
                                    <button type="submit" class="btn" id="sendcvformbtn">
                                        <i class="fas fa-arrow-right text-muted"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="help-block text-center">
                        Enter your sending email address
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-modal>




@once
    @push('scripts')
    @endpush
@endonce