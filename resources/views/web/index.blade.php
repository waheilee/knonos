<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>消毒、杀菌、除醛订单</title>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    {{--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--}}
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
    <h1 class="demo-pagetitle">室内消毒杀菌</h1>
    <h2 class="demo-detail-title" style="margin-left: .3rem;">严度作为室内环境治理平台，为用户提供打造更健康的室内环境治理，同事也为每一位第一物业除甲醛用户提供由中国人保PICC承保免费的《室内空气治理质量责任险》，建立完善的售后服务体系，给与用户最佳体验，打造舒适、环保、健康的生活环境。</h2>
    <form action="" id="order">
        <div style="padding: 0 0.24rem; margin-bottom: 0.7rem">
            <hr style="border: 0.01rem dashed #cccccc;">
        </div>
        <div class="m-celltitle">请选择城市【多选】</div>
        <div class="m-cell">
            <label class="cell-item">
                <span class="cell-left">北京</span>
                <label class="cell-right">
                <input type="checkbox"  value="北京" name="checkbox[]">
                <i class="cell-checkbox-icon"></i>
            </label>
            </label>
                <label class="cell-item">
                <span class="cell-left">上海</span>
                    <label class="cell-right">
                    <input type="checkbox" value="上海" name="checkbox[]">
                    <i class="cell-checkbox-icon"></i>
                    </label>
                </label>
            <label class="cell-item">
                <span class="cell-left">苏州</span>
                <label class="cell-right">
                <input type="checkbox" value="上海" name="checkbox[]">
                <i class="cell-checkbox-icon"></i>
                </label>
            </label>
        </div>

        <div class="m-cell demo-small-pitch">

            <div class="cell-item">
                <div class="cell-left">姓名：</div>
                <div class="cell-right">
                    <input type="text" class="cell-input" placeholder="请输入您的姓名" autocomplete="off" name="name">
                </div>
            </div>
            <div class="cell-item">
                <div class="cell-left">电话：</div>
                <div class="cell-right"><input type="text" class="cell-input" placeholder="请输入您的联系电话" autocomplete="off" name="phone"></div>
            </div>
            {{--<div class="cell-item">--}}
                {{--<div class="cell-left">所在地区：</div>--}}
                {{--<div class="cell-right cell-arrow">--}}
                    {{--<input type="text" class="cell-input" readonly="" id="J_Address" placeholder="请选择地址">--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="cell-item">
                <div class="cell-right">
                    <input type="text" class="cell-input" placeholder="填写详细街道地址" autocomplete="off" name="address">
                </div>
            </div>
            <div class="cell-item">
                <div class="cell-left">房屋面积：</div>
                <div class="cell-right">
                    <input type="number" class="cell-input" placeholder="填写房屋面积"  min="1" name="area">
                </div>
            </div>

        </div>
        <div style="padding: 0 0.24rem; margin-bottom: 0.7rem">
            <hr style="border: 0.01rem dashed #cccccc;">
        </div>

        <h2 class="demo-detail-title" style="margin-left: .1rem;">
             &nbsp;&nbsp;&nbsp;请选择所需服务：<br>
            （1）企业室内消毒按平米收费，最低400平米起；<br>
            （2）企业室内除甲醛按平米收费，最低300平米起；<br>
            （3）空气净化器租赁按每台/月收费，三个月起租；<br>
            （4）家庭室内除甲醛按房产本面积收费，最低80平米起；<br>
            （5）家庭室内消毒控菌按房产本面积收费，最低80平米起；
        </h2>


        <div class="demo-spinner demo-small-pitch">
            <span class="demo-spinner-title">企业办公环境消毒控菌（元/平米）</span>
            <span class="demo-spinner-page">￥6元</span>
            <span class="m-spinner" id="J_Quantity">
                <a href="javascript:;" class="J_Del"></a>
                <input type="text" class="J_Input" placeholder="" name="order[0][number]"/>
                <a href="javascript:;" class="J_Add"></a>
            </span>
            <span class="demo-spinner-page"  style="font-size: 0.25rem; overflow: hidden;display: inline-block;">【400件起销售】</span>
            <span style="font-size: 0.25rem; overflow: hidden;display: inline-block; float: right; margin-top: 0.2rem" id="aaa">￥0</span>
            <input type="hidden" id="aaaa" name="order[0][total]" value="">
            <input type="hidden"  name="order[0][name]" value="企业帮个环境消毒控菌（元/平米）">
        </div>
        <div class="demo-spinner demo-small-pitch">
            <span class="demo-spinner-title">企业办公环境除甲醛（元/平米）</span>
            <span class="demo-spinner-page">￥20元</span>
            <span class="m-spinner" id="J_bb">
                <a href="javascript:;" class="J_Del"></a>
                    <input type="text" class="J_Input" placeholder="" name="order[1][number]"/>
                <a href="javascript:;" class="J_Add"></a>
            </span>
            <span class="demo-spinner-page"  style="font-size: 0.25rem; overflow: hidden;display: inline-block;">【300件起销售】</span>
            <span style="font-size: 0.25rem; overflow: hidden;display: inline-block; float: right; margin-top: 0.2rem" id="bbb">￥0</span>
            <input type="hidden" id="bbbb" name="order[1][total]" value="">
            <input type="hidden"  name="order[1][name]" value="企业办公环境除甲醛（元/平米）">
        </div>
        <div class="demo-spinner demo-small-pitch">
            <span class="demo-spinner-title">空气净化器租赁（元/台、每月）</span>
            <span class="demo-spinner-page">￥280元</span>
            <span class="m-spinner" id="J_cc">
                <a href="javascript:;" class="J_Del"></a>
                    <input type="text" class="J_Input" placeholder="" name="order[2][number]"/>
                <a href="javascript:;" class="J_Add"></a>
            </span>
            <span class="demo-spinner-page"  style="font-size: 0.25rem; overflow: hidden;display: inline-block;">【3件起销售】</span>
            <span style="font-size: 0.25rem; overflow: hidden;display: inline-block; float: right; margin-top: 0.2rem" id="ccc">￥0</span>
            <input type="hidden" id="cccc" name="order[2][total]" value="">
            <input type="hidden"  name="order[2][name]" value="空气净化器租赁（元/台、每月）">
        </div>
        <div class="demo-spinner demo-small-pitch">
            <span class="demo-spinner-title">家庭室内除甲醛（元/平米）</span>
            <span class="demo-spinner-page">￥30元</span>
            <span class="m-spinner" id="J_dd">
                <a href="javascript:;" class="J_Del"></a>
                    <input type="text" class="J_Input" placeholder="" name="order[3][number]"/>
                <a href="javascript:;" class="J_Add"></a>
            </span>
            <span class="demo-spinner-page"  style="font-size: 0.25rem; overflow: hidden;display: inline-block;">【120件起销售】</span>
            <span style="font-size: 0.25rem; overflow: hidden;display: inline-block; float: right; margin-top: 0.2rem" id="ddd">￥0</span>
            <input type="hidden" id="dddd" name="order[3][total]" value="">
            <input type="hidden"  name="order[3][name]" value="家庭室内除甲醛（元/平米）">
        </div>
        <div class="demo-spinner demo-small-pitch">
            <span class="demo-spinner-title">家庭室内消毒控菌（元/平米）</span>
            <span class="demo-spinner-page">￥8元</span>
            <span class="m-spinner" id="J_ee">
                <a href="javascript:;" class="J_Del"></a>
                    <input type="text" class="J_Input" placeholder="" name="order[4][number]"/>
                <a href="javascript:;" class="J_Add"></a>
            </span>
            <span class="demo-spinner-page"  style="font-size: 0.25rem; overflow: hidden;display: inline-block;">【120件起销售】</span>
            <span style="font-size: 0.25rem; overflow: hidden;display: inline-block; float: right; margin-top: 0.2rem" id="eee">￥0</span>
            <input type="hidden" id="eeee" name="order[4][total]" value="">
            <input type="hidden"  name="order[4][name]" value="家庭室内消毒控菌（元/平米）">
        </div>
        <div class="demo-badege" style="margin-top: .1rem; padding: 0 .4rem .9rem .24rem;">
            <div style="float: right;margin-top: .3rem;">
                <div  >合计：<span style="font-size: .4rem;color:#FF5E53 " id="total">￥0</span></div>
            </div>


        </div>
    </form>
    <div class="m-button">
    <button type="submit" class="btn-block btn-danger" id="order_upload">提交</button>
    </div>


</section>
<script src="{{asset('web/js/ydui.citys.js')}}"></script>
{{--<script src="https://www.jq22.com/jquery/jquery-2.1.1.js" language="JavaScript" ></script>--}}
{{--<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>--}}
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="{{asset('web/js/ydui.js')}}"></script>

<script>
/**
* 默认调用
*/
    !function () {
        var $target = $('#J_Address');

        $target.citySelect();

        $target.on('click', function (event) {
        event.stopPropagation();
        $target.citySelect('open');
        });

        $target.on('done.ydui.cityselect', function (ret) {
        $(this).val(ret.provance + ' ' + ret.city + ' ' + ret.area);
        });
    }();
    !function ($) {
        $('#J_Btn').on('click', function () {
        /* 使用：js模块以dialog为例 */
        YDUI.dialog.alert('我有一个小毛驴我从来也不骑！');
        });
    }(jQuery);

</script>
<script>
    !function () {
        $('#J_Quantity').spinner({
            input: '.J_Input',
            add: '.J_Add',
            minus: '.J_Del',
            min:400,
            unit: function () {
                return 1;
            },
            max: function () {
                return 0;
            },
            callback: function (value, $ele) {
                // $ele 当前文本框[jQuery对象]
                // $ele.css('background', '#FF5E53');
                val = value * 6;
                $("#aaa").html('￥' + val);
                $("#aaaa").val( val);
                // ball()let aa=  $("#aaaa").val();
                let aa=  $("#aaaa").val();
                let bb=  $("#bbbb").val();
                let dd=  $("#cccc").val();
                let cc=  $("#dddd").val();
                let ee=  $("#eeee").val();

                let total = parseInt(aa)+parseInt(bb)+parseInt(cc)+parseInt(dd)+parseInt(ee)
                $("#total").html('￥'+total)
                console.log(total)
                console.log('值：' + value);
            }
        });
    }();
    !function () {
        $('#J_bb').spinner({
            input: '.J_Input',
            add: '.J_Add',
            minus: '.J_Del',
            min:300,
            unit: function () {
                return 1;
            },
            max: function () {
                return 0;
            },
            callback: function (value, $ele) {
                // $ele 当前文本框[jQuery对象]
                // $ele.css('background', '#FF5E53');
                val = value * 20;
                $("#bbb").html('￥' + val);
                $("#bbbb").val( val);
                let aa=  $("#aaaa").val();
                let bb=  $("#bbbb").val();
                let dd=  $("#cccc").val();
                let cc=  $("#dddd").val();
                let ee=  $("#eeee").val();

                let total = parseInt(aa)+parseInt(bb)+parseInt(cc)+parseInt(dd)+parseInt(ee)
                $("#total").html('￥'+total)
                console.log(total)
                // ball()
                console.log('值：' + value);
            }
        });
    }();
    !function () {
        $('#J_cc').spinner({
            input: '.J_Input',
            add: '.J_Add',
            minus: '.J_Del',
            min:3,
            unit: function () {
                return 1;
            },
            max: function () {
                return 0;
            },
            callback: function (value, $ele) {
                // $ele 当前文本框[jQuery对象]
                // $ele.css('background', '#FF5E53');
                val = value * 280;
                $("#ccc").html('￥' + val);
                $("#cccc").val( val);
                let aa=  $("#aaaa").val();
                let bb=  $("#bbbb").val();
                let dd=  $("#cccc").val();
                let cc=  $("#dddd").val();
                let ee=  $("#eeee").val();

                let total = parseInt(aa)+parseInt(bb)+parseInt(cc)+parseInt(dd)+parseInt(ee)
                $("#total").html('￥'+total)
                console.log(total)
                // ball()
                console.log('值：' + value);
            }
        });
    }();
    !function () {
        $('#J_dd').spinner({
            input: '.J_Input',
            add: '.J_Add',
            minus: '.J_Del',
            min:120,
            unit: function () {
                return 1;
            },
            max: function () {
                return 0;
            },
            callback: function (value, $ele) {
                // $ele 当前文本框[jQuery对象]
                // $ele.css('background', '#FF5E53');
                val = value * 30;
                $("#ddd").html('￥' + val);
                $("#dddd").val( val);
                let aa=  $("#aaaa").val();
                let bb=  $("#bbbb").val();
                let dd=  $("#cccc").val();
                let cc=  $("#dddd").val();
                let ee=  $("#eeee").val();

                let total = parseInt(aa)+parseInt(bb)+parseInt(cc)+parseInt(dd)+parseInt(ee)
                $("#total").html('￥'+total)
                console.log(total)
                // ball()
                console.log('值：' + value);
            }
        });
    }();
    !function () {
        $('#J_ee').spinner({
            input: '.J_Input',
            add: '.J_Add',
            minus: '.J_Del',
            min:120,
            unit: function () {
                return 1;
            },
            max: function () {
                return 0;
            },
            callback: function (value, $ele) {
                // $ele 当前文本框[jQuery对象]
                // $ele.css('background', '#FF5E53');
                val = value * 8;
                $("#eee").html('￥' + val);
                $("#eeee").val( val);
                let aa=  $("#aaaa").val();
                let bb=  $("#bbbb").val();
                let dd=  $("#cccc").val();
                let cc=  $("#dddd").val();
                let ee=  $("#eeee").val();

                let total = parseInt(aa)+parseInt(bb)+parseInt(cc)+parseInt(dd)+parseInt(ee)
                $("#total").html('￥'+total)
                console.log(total)
                // ball()
                console.log('值：' + value);
            }
        });
    }();

    !function (win, $){
        var dialog = win.YDUI.dialog;

        $('#order_upload').on('click', function () {
            //提交表单
            let formData = new FormData($('#order')[0]);
            $.ajax({
                type: 'POST',
                url: 'order',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                success: function (data) {
                    dialog.toast(data, 'success', 1500);
                    setTimeout(function(){
                        window.location.reload();
                    },1500);
                }
            })
        })
    }(window, jQuery);
</script>

</body>
</html>
