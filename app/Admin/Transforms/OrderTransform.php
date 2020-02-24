<?php

namespace App\Admin\Transforms;


use App\Constants\BaseConstants;
use App\Enums\OrderShipStatusEnum;
use App\Enums\OrderStatusEnum;
use App\Enums\OrderTypeEnum;
use App\Models\Order;
use Faker\Provider\Base;

class OrderTransform extends Transform
{

    public function transDeleted($isDeleted)
    {
        return $isDeleted ? '<span class="glyphicon glyphicon-ok bg-green"></span>' : '';
    }

    public function transCommented($isCommented)
    {
        return $isCommented ? '<span class="glyphicon glyphicon-ok bg-green"></span>' : '';
    }


    public function transType($type)
    {
        $text = '未知';

        if ($type == BaseConstants::SEC_COMMON) {
            $text = '普通订单';
        } elseif ($type == BaseConstants::SEC_KILL) {
            $text = '秒杀订单';
        }

        return $text;
    }

    public function transShipStatus($status)
    {
        switch ($status) {

            case BaseConstants::LOGISTICS_PENDING:
                $text = '待发货';
                break;
            case BaseConstants::LOGISTICS_DELIVERED:
                $text = '待收货';
                break;
            case BaseConstants::LOGISTICS_RECEIVED:
                $text = '已收货';
                break;
            default:
                $text = '未知状态';
                break;
        }

        return $text;
    }

    public function transStatus($status)
    {
        switch ($status) {

            case BaseConstants::ORDER_REFUND:
                $text = '退款';
                break;
            case BaseConstants::ORDER_APP_REFUND:
                $text = '申请退款';
                break;
            case BaseConstants::ORDER_UN_PAY:
                $text = '未支付';
                break;
            case BaseConstants::ORDER_PAID:
                $text = '已支付';
                break;
            case BaseConstants::ORDER_UN_PAY_CANCEL:
                $text = '超时未付款系统自动取消';
                break;
            case BaseConstants::ORDER_COMPLETED:
                $text = '完成';
                break;
            default:
                $text = '未知状态';
                break;
        }

        return $text;
    }
}
