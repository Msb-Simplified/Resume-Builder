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
            </td>
        </tr>
    </table>

</body>

</html>