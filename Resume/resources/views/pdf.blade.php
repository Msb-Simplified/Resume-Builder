<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./Asset/image/msb.png">
    <title>Shishir Bhuiyan</title>

    <style>
        @page {
            margin: 40px !important;
        }

        table {
            overflow: hidden;
            position: relative;
        }
    </style>
</head>

<body>
    <table style="height:100%;width:100%;margin-bottom:-20px;">
        <tr style="width:100%;">
            <td style="width:50%; vertical-align: top;
            text-align: left;">
                {{-- Profile Image,Name,Title --}}
                <div style="width: 100%; ">
                    <div style="width: 40%;  align-items:center; margin: 0 auto;">
                        <?php $profileimage_path ='/Asset/user/'.$userdata->userhasmanycvrelation[0]->image; ?>
                        <img src="{{ public_path() . $profileimage_path }}" style="width:100%; height:150px;" />
                    </div>
                    <div style="width: 100%;  text-align:center; line-height:15px;">
                        <p style="font-weight: 800;font-size: 28px; margin-top: 13px;">{{
                            $userdata->userhasmanycvrelation[0]->name }}</p>
                        <p style="font-size: 21px;margin-top: -12px;">{{
                            $userdata->userhasmanycvrelation[0]->title }}</p>
                    </div>
                </div>
                {{-- About --}}
                <div style="width: 100%;">
                    <div style="
                                        color: rgb(180, 3, 3);
                                        font-size: 20px;
                                        font-weight: 900;
                                        margin: 5px 0px 5px 0px;
                                        position: relative;
                                        padding-bottom: 10px;">About
                        <img src="{{ $lineimage }}" style="
                                            height: 3px;
                                            width: 30px;
                                            background-color: rgb(180, 3, 3);
                                            position: absolute;
                                            top: 28px;
                                            left: 0px;">
                        <img src="{{ $lineimage }}" style="
                                            height: 3px;
                                            width: 70px;
                                            background-color: rgb(19, 18, 18);
                                            position: absolute;
                                            top: 32px;
                                            left: 0px;">
                    </div>
                    <div style="
                                        font-family:georgia,garamond,serif;">
                        {!! $userdata->userhasmanycvrelation[0]->about !!}
                    </div>
                </div>
                {{-- Conatct --}}
                <div id="contact" style="width: 100%; ">
                    <div style="
                                        color: rgb(180, 3, 3);
                                        font-size: 20px;
                                        font-weight: 900;
                                        margin: 5px 0px 5px 0px;
                                        position: relative;
                                        padding-bottom: 10px;">Contact
                        <img src="{{ $lineimage }}" style="
                                            height: 3px;
                                            width: 30px;
                                            background-color: rgb(180, 3, 3);
                                            position: absolute;
                                            top: 28px;
                                            left: 0px;">
                        <img src="{{ $lineimage }}" style="
                                            height: 3px;
                                            width: 70px;
                                            background-color: rgb(19, 18, 18);
                                            position: absolute;
                                            top: 32px;
                                            left: 0px;">
                    </div>
                    <div>
                        {!! $userdata->userhasmanycvrelation[0]->address !!}
                    </div>
                </div>
                {{-- Profile --}}
                <div style="
                            width: 100%; 
                            margin: 10px 0px 10px 0px;
                            ">
                    <div style="
                                        color: rgb(180, 3, 3);
                                        font-size: 20px;
                                        font-weight: 900;
                                        margin: 5px 0px 5px 0px;
                                        position: relative;
                                        padding-bottom: 10px;">Profile
                        <img src="{{ $lineimage }}" style="
                                            height: 3px;
                                            width: 30px;
                                            background-color: rgb(180, 3, 3);
                                            position: absolute;
                                            top: 28px;
                                            left: 0px;">
                        <img src="{{ $lineimage }}" style="
                                            height: 3px;
                                            width: 70px;
                                            background-color: rgb(19, 18, 18);
                                            position: absolute;
                                            top: 32px;
                                            left: 0px;">
                    </div>
                    <div style="margin-top: 10px;">
                        @foreach ($accounts as $account)
                        <div style="
                                            display: inline-block;
                                            margin: 3px 5px 3px 0px;
                                            border-radius: 10%;
                                        ">
                            @if ($account->accountname=="linkedin")
                            <a target="_blank"
                                href="https://{{ $account->accountname }}.com/in/{{ $account->accounthandler }}" style="
                                    text-decoration: none;
                                    color: black;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    padding: 3px 5px;
                                        background-color: rgba(217, 215, 215, 0.573);">
                                <?php $accountimage_path = '/Asset/socialmedia/'.$account->accountname.'.svg'; ?>
                                <img src="{{ public_path() . $accountimage_path }}"
                                    style="height: 15px;  width:15px; margin-top:8px;">
                                &nbsp;
                                <span id="rendergithubhandler">{{ $account->accounthandler }}</span>
                            </a>
                            @else
                            <a target="_blank"
                                href="https://{{ $account->accountname }}.com/{{ $account->accounthandler }}" style="
                                                text-decoration: none;
                                                color: black;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                padding: 3px 5px;
                                                background-color: rgba(217, 215, 215, 0.573);">
                                <?php $accountimage_path = '/Asset/socialmedia/'.$account->accountname.'.svg'; ?>
                                <img src="{{ public_path() . $accountimage_path }}"
                                    style="height: 15px;  width:15px; margin-top:8px;">&nbsp;
                                <span id="rendergithubhandler">{{ $account->accounthandler }}</span>
                            </a>
                            @endif
                        </div>
                        @endforeach
                    </div>

                </div>
            </td>
            <td style="padding: 10px;width:50%; vertical-align: top;text-align: left;">
                <div style="width:100%;">
                    <div id="education">
                        <div style="
                            color: rgb(180, 3, 3);
                            font-size: 20px;
                            font-weight: 900;
                            margin: 5px 0px 5px 0px;
                            position: relative;
                            padding-bottom: 10px;">Education
                            <img src="{{ $lineimage }}" style="
                            height: 3px;
                            width: 30px;
                            background-color: rgb(180, 3, 3);
                            position: absolute;
                            top: 28px;
                            left: 0px;">
                            <img src="{{ $lineimage }}" style="
                            height: 3px;
                            width: 70px;
                            background-color: rgb(19, 18, 18);
                            position: absolute;
                            top: 32px;
                            left: 0px;">
                        </div>
                        <div style=" border-left: 2px solid #2b2b2b;">
                            @foreach ($educations as $key => $edu)
                                <div style="           
                                margin-top: 10px;
                                margin-left: 15px;
                                position: relative;">
                                    <?php $ballimage_path ='/Asset/icon/ball.svg'; ?>
                                    <img src="{{ public_path() . $ballimage_path }}" alt="" style="            
                                    position: absolute;
                                    left: 0;
                                    top: 0px;
                                    width: 10px;
                                    height: 10px;
                                    margin-left: -21px;">
                                    <div style="margin-top:-20px;">
                                        {!! $edu->institution !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="experence"style="margin-top:20px;">
                            <div style="
                            color: rgb(180, 3, 3);
                            font-size: 20px;
                            font-weight: 900;
                            margin: 5px 0px 5px 0px;
                            position: relative;
                            padding-bottom: 10px;">Experence
                                <img src="{{ $lineimage }}" style="
                            height: 3px;
                            width: 30px;
                            background-color: rgb(180, 3, 3);
                            position: absolute;
                            top: 28px;
                            left: 0px;">
                                <img src="{{ $lineimage }}" style="
                            height: 3px;
                            width: 70px;
                            background-color: rgb(19, 18, 18);
                            position: absolute;
                            top: 32px;
                            left: 0px;">
                            </div>
                            <div style=" border-left: 2px solid #2b2b2b;">
                                @foreach ($experence as $exp)
                                    <div style="           
                                    margin-top: 10px;
                                    margin-left: 15px;
                                    position: relative;">
                                        <?php $ballimage_path ='/Asset/icon/ball.svg'; ?>
                                        <img src="{{ public_path() . $ballimage_path }}" alt="" style="            
                                        position: absolute;
                                        left: 0;
                                        top: 0px;
                                        width: 10px;
                                        height: 10px;
                                        margin-left: -21px;">
                                        <div style="margin-top:-20px;">
                                            {!! $exp->experence !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="skill" style="margin-top:20px;">
                            <div style="
                            color: rgb(180, 3, 3);
                            font-size: 20px;
                            font-weight: 900;
                            margin: 5px 0px 5px 0px;
                            position: relative;
                            padding-bottom: 10px;">Skills
                                <img src="{{ $lineimage }}" style="
                            height: 3px;
                            width: 30px;
                            background-color: rgb(180, 3, 3);
                            position: absolute;
                            top: 28px;
                            left: 0px;">
                                <img src="{{ $lineimage }}" style="
                            height: 3px;
                            width: 70px;
                            background-color: rgb(19, 18, 18);
                            position: absolute;
                            top: 32px;
                            left: 0px;">
                            </div>
                            @foreach ($skilldata as $skill)
                            <div style="width: 100%;">
                                <div style="
                            text-align: right;
                            padding-top: 4px;
                            padding-bottom: 4px;
                            color: rgb(0, 0, 0);
                            margin-bottom: 10px;
                            background-color: rgba(217, 215, 215, 0.573);
                            position: relative;
                                width:{{ $skill->percent }}%
                            ">
                                    <span style="position: absolute;
                                left: 10px;">{{ $skill->subject }}</span>
                                    <span style="margin-right: 10px;
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
                                color: rgb(180, 3, 3);
                                font-size: 20px;
                                font-weight: 900;
                                margin: 5px 0px 5px 0px;
                                position: relative;">Language
                    <img src="{{ $lineimage }}" style="
                                    height: 3px;
                                    width: 30px;
                                    background-color: rgb(180, 3, 3);
                                    position: absolute;
                                    top: 28px;
                                    left: 0px;">
                    <img src="{{ $lineimage }}" style="
                                    height: 3px;
                                    width: 70px;
                                    background-color: rgb(19, 18, 18);
                                    position: absolute;
                                    top: 32px;
                                    left: 0px;">
                </div>
                <div style="margin-top: 10px;">
                    <?php $languagearray = json_decode($userdata->userhasmanycvrelation[0]->language); ?>
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
                                color: rgb(180, 3, 3);
                                font-size: 20px;
                                font-weight: 900;
                                margin: 5px 0px 5px 0px;
                                position: relative;
                                padding-bottom: 10px;">Tools
                    <img src="{{ $lineimage }}" style="
                                    height: 3px;
                                    width: 30px;
                                    background-color: rgb(180, 3, 3);
                                    position: absolute;
                                    top: 28px;
                                    left: 0px;">
                    <img src="{{ $lineimage }}" style="
                                    height: 3px;
                                    width: 70px;
                                    background-color: rgb(19, 18, 18);
                                    position: absolute;
                                    top: 32px;
                                    left: 0px;">
                </div>
                <div style="margin-top: 5px;">
                    <?php $toolsarray = json_decode($userdata->userhasmanycvrelation[0]->tools); ?>
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