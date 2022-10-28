<div class="wrapper" id="wrapper">

    @isset($userdata)
    <input id="cvid" type="hidden" value="{{ $userdata->userhasmanycvrelation[0]->id }}">
    <input id="userid" type="hidden" value="{{ $userdata['id'] }}">
    <input id="usernamestore" type="hidden" value="{{ $userdata['username'] }}">
    @endisset



    <div class="top">
        <div id="leftBar">
            <div id="profile">
                    <div class="profileImage" id="profileimagecheckboxcontroll" style="cursor: pointer;">
                        @if (isset($settings[0]->image))
                           <img src="{{ asset('Asset/user/'. $userdata->userhasmanycvrelation[0]->image) }}"id="profileimage">
                        @else
                          <img src="{{ asset('Asset/image/default.png') }}"id="profileimage">
                        @endif
                    </div>
                    
               {{-- <x-toggleModal class="btn btn-default float-right" id="userloginmodal">Login</x-toggleModal> --}}

                <div class="profileTitle">
                    <h3 class="titleName" id="displayname" style="margin-left: 20px;">
                        @if (isset($settings[0]->name))
                           {{ $userdata->userhasmanycvrelation[0]->name }}
                           <span style="cursor: pointer;">
                            <img src="{{ asset('Asset/icon/pen.svg')}}" style="height: 15px; width:15px;color:yellowgreen;">
                           </span>
                        @else
                            Profile Name
                        @endif
                    </h3>
            
                    <h4 class="titleJob" id="displaytitle"  style="margin-left: 20px;">
                        @if (isset($settings[0]->title))
                          {{ $userdata->userhasmanycvrelation[0]->title }}
                          <span style="cursor: pointer;">
                            <img src="{{ asset('Asset/icon/pen.svg')}}" style="height: 15px; width:15px;color:yellowgreen;">
                           </span>
                        @else
                            Profile Title
                        @endif
                    </h4>
                </div>
            </div>



            <div id="about">
                <div class="aboutTitle">About
                    <span style="cursor: pointer;">
                      <img src="{{ asset('Asset/icon/pen.svg')}}" style="height: 15px; width:15px;color:yellowgreen;">
                     </span>
                    <img class="lineone" src="{{ asset('/public/Asset/icon/remove.png') }}">
                    <img class="linetwo" src="{{ asset('/public/Asset/icon/remove.png') }}">
                </div>

                @if (isset($settings[0]->about))
                <div id="aboutText">
                    {!! $userdata->userhasmanycvrelation[0]->about !!}
                </div>
                @else
                <p class="aboutText">I’m Shishir and interested in doing positive things about every aspect of
                    life.................................🏃🏾‍♂️</p>
                @endif
            </div>



            <div id="contact">
                <h3 class="contactTitle">Contact
                    <span style="cursor: pointer;">
                      <img src="{{ asset('Asset/icon/pen.svg')}}" style="height: 15px; width:15px;color:yellowgreen;">
                     </span>
                    <img class="lineone" src="{{ asset('/public/Asset/icon/remove.png') }}">
                    <img class="linetwo" src="{{ asset('/public/Asset/icon/remove.png') }}">
                </h3>
                <div class="address">
                    @if (isset($settings[0]->address))
                       {!! $userdata->userhasmanycvrelation[0]->address !!}
                    @else
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores magni expedita exercitationem? Autem, quibusdam perspiciatis?
                    @endif
                </div>
            </div>
            <div id="profilehandler">
                <h3 class="handlerTitle">Profile
                    <span style="cursor: pointer;">
                      <img src="{{ asset('Asset/icon/pen.svg')}}" style="height: 15px; width:15px;color:yellowgreen;">
                     </span>
                    <img class="lineone" src="{{ asset('/public/Asset/icon/remove.png') }}">
                    <img class="linetwo" src="{{ asset('/public/Asset/icon/remove.png') }}">
                </h3>
                <div class="handlerAddress">
                    @if (isset($settings[0]->profile))
                        @foreach ($accounts as $account)
                        <p>
                            @if ($account->accountname=="linkedin")
                            <a target="_blank"
                                href="https://{{ $account->accountname }}.com/in/{{ $account->accounthandler }}">
                            @else
                            <a target="_blank"
                                    href="https://{{ $account->accountname }}.com/{{ $account->accounthandler }}">
                            @endif

                                <img src="{{ asset('Asset/socialmedia/' . $account->accountname.'.svg') }}"
                                    height="20px" width="20px">
                                <span id="rendergithubhandler">{{ $account->accounthandler }}</span>
                            </a>
                        </p>
                        @endforeach
                    @else
                        <p>
                            <a target="_blank" href="https://github.com/ShishirBhuiyan">
                                <img src="{{ url('/Asset/icon/github.svg') }}" height="20px"
                                    width="20px">&nbsp;Account Handler
                            </a>
                        <p>
                    @endif

                </div>
            </div>
        </div>
        <div id="rightBar">
            <div id="education">
                <div class="educationTitle">Education
                    <span style="cursor: pointer;">
                      <img src="{{ asset('Asset/icon/pen.svg')}}" style="height: 15px; width:15px;color:yellowgreen;">
                     </span>
                    <img class="lineone" src="{{ asset('/public/Asset/icon/remove.png') }}">
                    <img class="linetwo" src="{{ asset('/public/Asset/icon/remove.png') }}">
                </div>
                <div class="content">
                    @if (isset($settings[0]->education))
                        @foreach ($educations as $edu)
                        <div class="item">
                            <img src="{{ url('Asset/icon/ball.svg') }}" height="10px" width="10px">
                            <p class="institute">{!! $edu->institution !!}</p>
                            <p class="institute">{!! $edu->degree !!}</p>
                            <p class="year">{{ $edu->year }}</p>
                        </div>
                        @endforeach
                    @else
                        <div class="item">
                            <img src="./Asset/icon/ball.svg" height="10px" width="10px">
                            <p class="institute">Institution name</p>
                            <p class="degree">Course/Degree/Marks/etc</p>
                            <p class="year">Year-Year</p>
                        </div>
                    @endif
                </div>
            </div>
            <div id="experence">
                <div class="experenceTitle">Experence
                    <span style="cursor: pointer;">
                      <img src="{{ asset('Asset/icon/pen.svg')}}" style="height: 15px; width:15px;color:yellowgreen;">
                     </span>
                    <img class="lineone" src="{{ asset('/public/Asset/icon/remove.png') }}">
                    <img class="linetwo" src="{{ asset('/public/Asset/icon/remove.png') }}">
                </div>
                <div class="content">
                    @if (isset($settings[0]->education))
                        @foreach ($experence as $exp)
                        <div class="item">
                            <img src="{{ url('Asset/icon/ball.svg') }}" height="10px" width="10px">
                            <p class="institute">
                                {{ $exp->subject }}
                            </p>
                            <p class="degree">
                                {{ $exp->details }}
                            </p>
                        </div>
                        @endforeach
                    @else
                    <div class="item">
                        <img src="{{ url('/Asset/icon/ball.svg') }}" height="10px" width="10px">
                        <p class="institute">Experence Subject</p>
                        <p class="degree">Describe your experence ......</p>
                    </div>
                    @endif
                </div>
            </div>
            <div id="skill">
                <h3 class="skillTitle">Skills
                    <span style="cursor: pointer;">
                      <img src="{{ asset('Asset/icon/pen.svg')}}" style="height: 15px; width:15px;color:yellowgreen;">
                     </span>
                    <img class="lineone" src="{{ asset('/public/Asset/icon/remove.png') }}">
                    <img class="linetwo" src="{{ asset('/public/Asset/icon/remove.png') }}">
                </h3>
                 
                @if (isset($settings[0]->education))
                    @foreach ($skilldata as $skill)
                    <div class="skill-container">
                        <div class="skill skillone" style="width:{{ $skill->percent }}%">
                            <span class="first" id="render-skill-one-name">{{ $skill->subject }}</span>
                            <span id="render-skill-one-percent">{{ $skill->percent }}%</span>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="skill-container">
                        <div class="skill js"><span class="first">Skill name</span><span>80%</span></div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <div class="bottom">
        <div id="language">
            <h3 class="languageTitle">Languages & Framework
                <span style="cursor: pointer;">
                  <img src="{{ asset('Asset/icon/pen.svg')}}" style="height: 15px; width:15px;color:yellowgreen;">
                 </span>
                <img class="lineone" src="{{ asset('/public/Asset/icon/remove.png') }}">
                <img class="linetwo" src="{{ asset('/public/Asset/icon/remove.png') }}">
            </h3>
            <div class="languageImg">
                @if (isset($settings[0]->language))
                    @foreach(json_decode($userdata->userhasmanycvrelation[0]->language) as $langs)
                    <?php  $lang =  str_replace(' ', '', $langs); ?>
                    <img src="{{ asset('Asset/lang/' . $lang.'.svg') }}">&nbsp;
                    @endforeach
                @else
                  Example :&nbsp; <img src="./Asset/lang/cplus.svg">&nbsp;
                @endif
            </div>
        </div>
        <div id="tools">
            <h3 class="toolsTitle">Tools
                <span style="cursor: pointer;">
                  <img src="{{ asset('Asset/icon/pen.svg')}}" style="height: 15px; width:15px;color:yellowgreen;">
                 </span>
                <img class="lineone" src="{{ asset('/public/Asset/icon/remove.png') }}">
                <img class="linetwo" src="{{ asset('/public/Asset/icon/remove.png') }}">
            </h3>
            <div class="toolsIcon">
                @if (isset($settings[0]->tools))
                    @foreach(json_decode($userdata->userhasmanycvrelation[0]->tools) as $tools)
                    <?php  $tool =  str_replace(' ', '', $tools); ?>
                    <img src="{{ asset('Asset/tools/'.$tool.'.svg') }}">&nbsp;
                    @endforeach
                    
                @else
                 Example :&nbsp; <img src="./Asset/tools/vscode.svg">&nbsp;
                @endif
            </div>
        </div>
    </div>
</div>


@once
@push('styles')
<link rel="stylesheet" href="{{ url('/Asset/css/components/example.css') }}">
@endpush
@endonce