<div class="container topbar">
    <div class="navs">
        <div class="left">
            <p>Resume Builder</p>
        </div>
        <div class="right">
            @if(session()->get('usersession')!="")

            @php
              $userdata = \App\Models\User::where('username',session()->get('userloginsessiondata'))->first();
            @endphp 
            <div class="input-group-prepend">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">Action</button>

                <ul class="dropdown-menu" style="">
                    <x-li href="/makecv">Create</x-li>
                  <x-li href="/print/{{ $userdata->username }}/{{ $userdata->userhasmanycvrelation[0]->id }}">Print</x-li>
                  <x-toggleModal id="sendcvmodalform">Send</x-toggleModal>
                  @if(basename(request()->path()) === 'makecv')
                      <x-toggleModal id="setingsmodal">Edit</x-toggleModal>
                  @endif




                  <x-li href="javascript:void" onclick="$('#logout-form').submit();">Logout</x-li>
                  <form id="logout-form" style="display: none;" method="POST" action="/logout">
                      @csrf
                  </form> 
                </ul>
            </div>
            @else
               <x-toggleModal class="btn btn-default float-right" id="userloginmodal">Login</x-toggleModal>
            @endif
        </div>
    </div>
</div>






@once
    @push('styles')
      <link rel="stylesheet" href="{{ url('/Asset/css/components/usernav.css') }}">
    @endpush
@endonce