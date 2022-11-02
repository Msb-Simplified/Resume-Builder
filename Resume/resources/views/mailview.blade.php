<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./Asset/image/msb.png">
    <title>Shishir Bhuiyan</title>
</head>

<body>
    <table style="height:1122px;width:700px;margin:0 auto; padding: 20px 30px;">

        <tr style="width:100%;">
            <td style="width:100%; vertical-align: top;
            text-align: left;">
                    <div style="width: 100%; ">
                        <div style="width: 40%;  align-items:center; margin: 0 auto;">
                        </div>
                        <div style="width: 100%;  text-align:center; line-height:15px;">
                            <p style="font-weight: 800;font-size: 28px; margin-top: 13px;">{{
                                $viewdata['userdata']->userhasmanycvrelation[0]->name }}</p>
                            <p style="font-size: 21px;margin-top: -12px;">{{
                                $viewdata['userdata']->userhasmanycvrelation[0]->title }}</p>
                        </div>
                    </div>
                    <div style="width: 100%;">
                        <div style="
                                        color: rgb(0, 0, 0);
                                        font-size: 20px;
                                        font-weight: 900;
                                        margin: 5px 0px 0px 0px;
                                        position: relative;">About
                        </div>
                        <div style="font-family:georgia,garamond,serif;">
                            {!! $viewdata['userdata']->userhasmanycvrelation[0]->about !!}
                        </div>
                    </div>
                    <div id="contact" style="width: 100%; ">
                        <div style="
                                        color: rgb(0, 0, 0);
                                        font-size: 20px;
                                        font-weight: 900;
                                        margin: 5px 0px 5px 0px;
                                        position: relative;">Contact
                        </div>
                        <div style="line-height: 15px;">
                            {!! $viewdata['userdata']->userhasmanycvrelation[0]->address !!}
                        </div>
                    </div>
                    <div style="
                            width: 100%; 
                            margin: 10px 0px 10px 0px;
                            ">
                        <div style="
                                        color: rgb(0, 0, 0);
                                        font-size: 20px;
                                        font-weight: 900;
                                        margin: 5px 0px 5px 0px;
                                        position: relative;
                                        padding-bottom: 10px;">Profile
                        </div>
                        <div style="margin-top: 10px;">
                            @foreach ($viewdata['accounts'] as $account)
                            <div style="
                                            display: inline-block;
                                            margin: 3px 5px 3px 0px;
                                            border-radius: 10%;
                                        ">
                                @if ($account->accountname=="linkedin")
                                <a target="_blank"
                                    href="https://{{ $account->accountname }}.com/in/{{ $account->accounthandler }}"
                                    style="
                                    text-decoration: none;
                                    color: black;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    padding: 3px 5px;
                                        background-color: rgba(217, 215, 215, 0.573);">
                                    <?php $accountimage_path = '/Asset/socialmedia/'.$account->accountname.'.svg'; ?>
                                    <img src="{{ public_path() . $accountimage_path }}" style="height: 15px;  width:15px; margin-top:8px;">
                                    {{ $account->accountname." : " }}
                                    &nbsp;
                                    <span id="rendergithubhandler">{{ $account->accounthandler }}</span>
                                </a>
                                @else
                                <a target="_blank"
                                    href="https://{{ $account->accountname }}.com/{{ $account->accounthandler }}"
                                    style="
                                                text-decoration: none;
                                                color: black;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                padding: 3px 5px;
                                                background-color: rgba(217, 215, 215, 0.573);">
                                    {{ $account->accountname." : " }}
                                    <span id="rendergithubhandler">{{ $account->accounthandler }}</span>
                                </a>
                                @endif
                            </div>
                            @endforeach
                        </div>

                    </div>
            </td>
        </tr>
        <tr style="width:100%;">
            <td  style="padding: 10px;width:100%; vertical-align: top;text-align: left;">
                <div style="width:100%;">
                    <div id="education">
                        <div style="
                            color: rgb(0, 0, 0);
                            font-size: 20px;
                            font-weight: 900;
                            margin: 5px 0px 5px 0px;
                            position: relative;
                            padding-bottom: 10px;">Education
                        </div>
                        <div>
                            @foreach ($viewdata['educations'] as $key => $edu)
                                @if ($key==0)
                                    <div style="position: relative;margin-top:0px;">
                                @else
                                  <div style="position: relative;margin-top:-10px;">
                                @endif
                                    <span><strong>{!! $edu->institution !!}</strong></span>
                                </div>  
                            @endforeach
                        </div>
                    </div>
                    <div id="experence">
                        <div style="
                            color: rgb(0, 0, 0);
                            font-size: 20px;
                            font-weight: 900;
                            margin: 5px 0px 5px 0px;
                            position: relative;
                            padding-bottom: 10px;">Experence
                        </div>
                        <div>
                            @foreach ($viewdata['experence'] as $exp)
                            <div style="           
                                margin-top: 10px;
                                position: relative;">
                                <p style="font-weight: 800;margin-top:-4px;">
                                    {!! $exp->experence !!}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="skill">
                        <div style="
                            color: rgb(0, 0, 0);
                            font-size: 20px;
                            font-weight: 900;
                            margin: 5px 0px 5px 0px;
                            position: relative;
                            padding-bottom: 10px;">Skills
                        </div>
                        @foreach ($viewdata['skilldata'] as $skill)
                        <div style="width: 100%;">
                            <div style="
                            text-align: right;
                            padding-top: 4px;
                            padding-bottom: 4px;
                            color: rgb(0, 0, 0);
                            margin-bottom: 10px;
                            background-color: rgb(221, 221, 221);
                            position: relative;
                                width:{{ $skill->percent }}%
                            ">
                                <span style="position: absolute;
                                left: 10px;">{{ $skill->subject }}</span>
                                <span style="position: absolute;right: 10px;
                                font-weight: 800;">{{ $skill->percent }}%</span>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </td>
        </tr>
        <tr style="width: 100%;">
            <td colspan="2">
                <div style="
                                color: rgb(0, 0, 0);
                                font-size: 20px;
                                font-weight: 900;
                                margin: 5px 0px 5px 0px;
                                position: relative;">Language
                </div>
                <div style="margin-top: 5px;">
                    <?php $languagearray = json_decode($viewdata['userdata']->userhasmanycvrelation[0]->language); ?>
                    @isset($languagearray)
                        @foreach($languagearray as $lang)
                        <span>{{ $lang }},</span>
                        @endforeach
                    @endisset
                </div>
            </td>
        </tr>
        <tr style="width: 100%;margin-top: -20px;">
            <td colspan="2">
                <div style="
                                color: rgb(0, 0, 0);
                                font-size: 20px;
                                font-weight: 900;
                                margin: 5px 0px 5px 0px;
                                position: relative;">Tools
                </div>
                <div style="margin-top: 5px;">
                    <?php $toolsarray = json_decode($viewdata['userdata']->userhasmanycvrelation[0]->tools); ?>
                    @isset($toolsarray)
                        @foreach($toolsarray as $tool)
                        
                        <span>{{ $tool }},</span>
                        @endforeach
                    @endisset
                </div>
            </td>
        </tr>
    </table>

</body>

</html>