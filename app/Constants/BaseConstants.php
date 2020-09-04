<?php

namespace App\Constants;


class BaseConstants
{

    const RETURN_SUCCESS = 10000;
    const RETURN_ERROR = 20000;
    const TOKEN_ERROR = 30000;

    // 未支付
    const ORDER_UN_PAY = 1;
    // 已经支付
    const ORDER_PAID = 2;
    // 订单完成
    const ORDER_COMPLETED = 3;

    // 超时未支付
    const ORDER_UN_PAY_CANCEL = 4;
    // 申请退款
    const ORDER_APP_REFUND = 5;
    // 退款
    const ORDER_REFUND = 6;

    const ORDER_MAP = [
        self::ORDER_UN_PAY          => "未支付",
        self::ORDER_PAID            => "已经支付",
        self::ORDER_COMPLETED       => "订单完成",
        self::ORDER_UN_PAY_CANCEL   => "超时未支付",
        self::ORDER_APP_REFUND      => "申请退款",
        self::ORDER_REFUND          => "退款",
    ];

    // 未发货
    const LOGISTICS_PENDING = 1;
    // 待收货
    const LOGISTICS_DELIVERED = 2;
    // 已收货
    const LOGISTICS_RECEIVED = 3;

    const LOGISTICS_MAP = [
        self::LOGISTICS_PENDING   =>'未发货',
        self::LOGISTICS_DELIVERED =>'待收货',
        self::LOGISTICS_RECEIVED  =>'已收货',
    ];

    //普通订单
    const SEC_COMMON = 1;
    //秒杀订单
    const SEC_KILL = 2;

    const SEC_MAP = [
        self::SEC_COMMON => '普通订单',
        self::SEC_KILL   => '秒杀订单',
    ];

}
