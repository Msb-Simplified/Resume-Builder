<div class="containers topbar">
    <div class="navs">
        <div class="left">
            <p>Resume Builder</p>
        </div>
        <div class="right">
            @if(session()->get('usersession')!="")

            @php
              $userdata = \App\Models\User::where('username',session()->get('userloginsessiondata'))->first();
            @endphp 
            <form id="logout-form" style="display: none;" method="POST" action="/logout">
                @csrf
            </form> 

            <div class="input-group-prepend">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">Action</button>

                <ul class="dropdown-menu" style="">
                  <x-li href="/" type="active">Component Li</x-li>
                  <x-li href="/makecv">Create</x-li>
                  <x-toggleModal id="sendcvmodalform">Send</x-toggleModal>
                  <x-li href="javascript:void" onclick="$('#logout-form').submit();">Logout</x-li>
                  <x-li href="/cv/{{ $userdata->id }}">Print</x-li>
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