<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>消毒、杀菌、除醛订单</title>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="_token" content="{{ csrf_token() }}" />


    <link rel="stylesheet" href="{{asset('web/css/ydui.css')}}"/>
    <link rel="stylesheet" href="{{asset('web/css/demo.css')}}"/>
    <script src="{{asset('web/js/ydui.flexible.js')}}"></script>
    <style>

        .rounded {
            border-radius: .16rem !important;
        }
    </style>
</head>
<body>
<section class="g-flexview">
    <div style="margin-top: 100px;">
        <img src="{{asset('web/right.png')}}" style="margin: 0 auto;width: 200px;">

    </div>
    <h1 class="demo-pagetitle">订单提交成功</h1>
    {{--<h2 class="demo-detail-title" style="margin-left: .3rem;">严度作为室内环境治理平台，为用户提供打造更健康的室内环境治理，同事也为每一位第一物业除甲醛用户提供由中国人保PICC承保免费的《室内空气治理质量责任险》，建立完善的售后服务体系，给与用户最佳体验，打造舒适、环保、健康的生活环境。</h2>--}}
    {{--<div class="m-button">--}}
        {{--<button type="submit" class="btn-block btn-danger" id="order_upload">提交</button>--}}
    {{--</div>--}}


</section>
<script src="{{asset('web/js/ydui.citys.js')}}"></script>
{{--<script src="https://www.jq22.com/jquery/jquery-2.1.1.js" language="JavaScript" ></script>--}}
{{--<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>--}}
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="{{asset('web/js/ydui.js')}}"></script>

<script>


</script>


</body>
</html>
