<?php

namespace App\Services\Web;


use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class IndexService
{

    public function create(Request $request)
    {
        $city = $request->input('checkbox');//地区
//        dd($city);
        $area = $request->input('area');//面积
        $name = $request->input('name');//姓名
        $phone = $request->input('phone');//电话
        $address = $request->input('address');//详细地址
        $product = $request->input('order');//订单详情
        $orderModel = new Order();
        $orderModel->name = json_encode($city,JSON_UNESCAPED_UNICODE);
        $orderModel->user_id = 1;
        $orderModel->total = 0;
        $orderModel->area = $area;
        $orderModel->consignee_name = $name;
        $orderModel->consignee_phone = $phone;
        $orderModel->consignee_address = $address;
        $orderModel->save();
        $this->product($product,$orderModel->id);

        return response()->json(['订单提交成功']);
    }

    public function product($data,$id)
    {
        foreach ($data as $k=>$v){
            if ($v['number'] == 0){
                continue;
            }else{
                $detailModel = new OrderDetail();
                $detailModel->order_id = $id;
                $detailModel->product_id = $k;
                $detailModel->price = 0;
                $detailModel->number = $v['number'];
                $detailModel->total = $v['total'];
                $detailModel->save();
            }
        }
    }
}