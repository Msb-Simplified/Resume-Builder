@extends('layout.user')

@section('title') CV | Make @endsection

@section('content')
    <!-- Here include menubar -->
    <div id="loader"></div>
    @include('components.usernav')

    <input id="cvid" type="hidden" value="{{ $userdata->userhasmanycvrelation[0]->id }}">
    <input id="userid" type="hidden" value="{{ $userdata['id'] }}">
    <input id="usernamestore" type="hidden" value="{{ $userdata['username'] }}">


    <div class="container">
        <div id="cvwrapper">
            <div class="top">
                <div id="leftBar">
                    <div id="profile">
                        @if($settings[0]->image !="")
                        <div class="profileImage" id="profileimagecheckboxcontroll">
                            <img src="{{ asset('Asset/user/'. $userdata->userhasmanycvrelation[0]->image) }}" alt=""
                                id="profileimagebox">
                        </div>
                        @endif

                        <div class="profileTitle">
                            @if($settings[0]->name !="")
                            <h3 class="titleName" id="displayname">{{ $userdata->userhasmanycvrelation[0]->name }}
                            </h3>
                            @endif



                            @if ($settings[0]->title !="")
                            <h4 class="titleJob" id="displaytitle">{{ $userdata->userhasmanycvrelation[0]->title }}
                            </h4>
                            @endif
                        </div>
                    </div>
                    @if ($settings[0]->about !="")
                    <div id="about">
                        <div class="aboutTitle">About
                            <img class="lineone" src="{{ url('Asset/icon/remove.png') }}">
                            <img class="linetwo" src="{{ url('Asset/icon/remove.png') }}">
                        </div>
                        <div id="renderabout">
                            {!! $userdata->userhasmanycvrelation[0]->about !!}
                        </div>
                    </div>
                    @endif
                    @if ($settings[0]->address !="")
                    <div id="contact">
                        <div class="contactTitle">Contact
                            <img class="lineone" src="{{ url('Asset/icon/remove.png') }}">
                            <img class="linetwo" src="{{ url('Asset/icon/remove.png') }}">
                        </div>
                        <div id="rendederaddress" class="address">
                            {!! $userdata->userhasmanycvrelation[0]->address !!}
                        </div>
                    </div>
                    @endif

                    @if ($settings[0]->profile!="")
                    <div id="profilehandler">
                        <h3 class="handlerTitle">Profile
                            <img class="lineone" src="{{ url('Asset/icon/remove.png') }}">
                            <img class="linetwo" src="{{ url('Asset/icon/remove.png') }}">
                        </h3>
                        <div class="handlerAddress">
                            @foreach ($accounts as $account)
                            <div class="githubhandlerdiv handlerdiv">
                                @if ($account->accountname=="linkedin")
                                <a target="_blank"
                                    href="https://{{ $account->accountname }}.com/in/{{ $account->accounthandler }}">
                                    @else
                                    <a target="_blank"
                                        href="https://{{ $account->accountname }}.com/{{ $account->accounthandler }}">
                                        @endif

                                        <img src="{{ asset('Asset/socialmedia/' . $account->accountname.'.svg') }}"
                                            alt="" height="20px" width="20px">
                                        &nbsp;
                                        <span id="rendergithubhandler">{{ $account->accounthandler }}</span>
                                    </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <div id="rightBar">
                    @if ($settings[0]->education !="")
                    <div id="education">
                        <div class="educationTitle">Education
                            <img class="lineone" src="{{ url('Asset/icon/remove.png') }}">
                            <img class="linetwo" src="{{ url('Asset/icon/remove.png') }}">
                        </div>
                        <div class="content">
                            @foreach ($educations as $edu)
                            <div class="item">
                                <img src="{{ url('Asset/icon/ball.svg') }}" alt="" height="10px" width="10px">
                                <p class="institute">{!! $edu->institution !!}</p>
                                <p class="institute">{!! $edu->degree !!}</p>
                                <p class="year">{{ $edu->year }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if ($settings[0]->experence !="")
                    <div id="experence">
                        <div class="experenceTitle">Experence
                            <img class="lineone" src="{{ url('Asset/icon/remove.png') }}">
                            <img class="linetwo" src="{{ url('Asset/icon/remove.png') }}">
                        </div>
                        <div class="content">
                            @foreach ($experence as $exp)
                            <div class="item">
                                <img src="{{ url('Asset/icon/ball.svg') }}" alt="" height="10px" width="10px">
                                <p class="institute">
                                    {{ $exp->subject }}
                                </p>
                                <p class="degree">
                                    {{ $exp->details }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if ($settings[0]->skill !="")
                    <div id="skill">
                        <h3 class="skillTitle">Skills
                            <img class="lineone" src="{{ url('Asset/icon/remove.png') }}">
                            <img class="linetwo" src="{{ url('Asset/icon/remove.png') }}">
                        </h3>

                        @foreach ($skilldata as $skill)
                        <div class="skill-container skill-one">
                            <div class="skill skillone" style="width:{{ $skill->percent }}%">
                                <span class="first" id="render-skill-one-name">{{ $skill->subject }}</span>
                                <span id="render-skill-one-percent">{{ $skill->percent }}%</span>
                            </div>
                        </div>
                        @endforeach



                    </div>
                    @endif
                </div>
            </div>
            <div class="bottom">
                @if ($settings[0]->language !="")
                <div id="language">
                    <h3 class="languageTitle">Languages & Framework
                        <img class="lineone" src="{{ url('Asset/icon/remove.png') }}">
                        <img class="linetwo" src="{{ url('Asset/icon/remove.png') }}">
                    </h3>
                    <div class="languageImg">
                        @foreach(json_decode($userdata->userhasmanycvrelation[0]->language) as $lang)
                        <img src="{{ asset('Asset/lang/' . $lang.'.svg') }}" alt="">&nbsp;
                        @endforeach
                    </div>
                </div>
                @endif

                @if ($settings[0]->tools !="")
                <div id="tools">
                    <h3 class="toolsTitle">Tools
                        <img class="lineone" src="{{ url('Asset/icon/remove.png') }}">
                        <img class="linetwo" src="{{ url('Asset/icon/remove.png') }}">
                    </h3>
                    <div class="toolsIcon">
                        @foreach(json_decode($userdata->userhasmanycvrelation[0]->tools) as $tool)
                        <img src="{{ asset('Asset/tools/' .$tool.'.svg') }}" alt="">&nbsp;
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>


    
    @include('components.ui.modal.cveditmodal')
@endsection


@once
    @push('styles')
       <link rel="stylesheet" href="{{ asset('/Asset/css/cv.css') }}">
    @endpush
@endonce




