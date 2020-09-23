<?php


namespace App\Services\Api;



use App\Constants\ErrorMsgConstants;
use App\Exceptions\ServiceException;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MerchantService
{

    /**
     * 添加商家信息
     * @param Request $request
     */
    public function add(Request $request)
    {
        $merchantModel = new Merchant();
        $merchantModel->property        = $request->input('property');
        $merchantModel->cp_name         = $request->input('cp_name');
        $merchantModel->cp_scale        = $request->input('cp_scale');
        $merchantModel->introduce       = $request->input('introduce');
        $merchantModel->business_number = $request->input('business_number');
        $merchantModel->legal_person    = $request->input('legal_person');
        $merchantModel->legal_id_card   = $request->input('legal_id_card');
        $merchantModel->phone           = $request->input('phone');
        $merchantModel->address         = $request->input('address');
        $merchantModel->bank            = $request->input('bank');
        $merchantModel->bank_number     = $request->input('bank_number');
        $merchantModel->category        = $request->input('category');
        $merchantModel->business_photo  = $request->input('business_photo');
        $merchantModel->id_card_photo_a = $request->input('id_card_photo_a');
        $merchantModel->id_card_photo_b = $request->input('id_card_photo_b');
        $merchantModel->code            = $this->getCode();// $request->input('code');
        $merchantModel->p_id            = $request->input('code')?$this->searchPid($request->input('code')):0;
        $merchantModel->save();
        return $merchantModel->code;
    }

    /**
     * 图片上传修改
     * @param Request $request
     * @return string
     */
    public function setPhoto(Request $request)
    {
            $file = $request->input('pic'); // image base64 encoded
//            $base  = preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
//            $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
//            $image = str_replace(' ', '+', $image);
//            if (!$base){
//                throw new ServiceException(ErrorMsgConstants::VALIDATION_DATA_ERROR,'上传的base64图片格式有误');
//            }
//            $imageName = 'photo/'.date('Y-m-d') . uniqid() . '.' . $image_extension[1]; //generating unique file name;
//            $disk      = Storage::disk('oss');
//            $path      = $disk->put($imageName,base64_decode($image));
//
//            return 'http://yandu2019.oss-cn-beijing.aliyuncs.com/'.$imageName;
        preg_match('/^(data:\s*image\/(\w+);base64,)/',$file,$res);
        $file=base64_decode(str_replace($res[1],'', $file));
        $new_file = 'photo';
        $ans=Storage::disk('oss')->put($new_file, $file);
        return $ans;
        $result = [
            'status' => 0,
            'msg' => '上传失败!',
            'data' => []
        ];
        //验证文件
        if($file->isValid()){
            $extension = $file->getClientOriginalExtension(); //上传文件的后缀.
            $filename = $file->getClientOriginalName();

            //验证后缀
            $allow_ext = ['jpg', 'png', 'jpeg', 'gif'];
            if(!in_array(strtolower($extension), $allow_ext)){
                $result['msg'] = '文件格式不正确!';
                return response()->json($result);
            }
            $pic = $file->getRealPath();

//            $image = $file->store('images');
//            $filepath = Storage::url($image);
            $imageName = 'photo'; //generating unique file name;
            return $pic;
            $disk      = Storage::disk('oss');

            $path      = $disk->put($imageName,$pic);
            return $disk->url($path);
//            $result['status'] = 1;
//            $result['msg'] = '上传成功!';
//            $result['data'] = [
//                'filename' => explode('.', $filename)[0],
//                'img' => "http://yandu2019.oss-cn-beijing.aliyuncs.com/".$image,
//                'img_url' => $filepath
//            ];
        }

        //返回响应
        return response()->json($result);
    }

    /**
     * 生成邀请识别码
     * @return string
     */
    private function getCode() {
        $code = $this->CreateCode();
        //把接收的邀请码再次返回给模型
        if ($this->recode($code)) {
            //不重复 返回验证码
            return $code;
        } else {
            //重复 再次生成
            while(true) {
                $this->getCode();
            }
        }
    }

    /**
     * 生成邀请码 并返回控制器
     * @return string
     */
    public function CreateCode() {
        $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rand = $code[rand(0,25)]
            .strtoupper(dechex(date('m')))
            .date('d').substr(time(),-5)
            .substr(microtime(),2,5)
            .sprintf('%02d',rand(0,99));
        for(
            $a = md5( $rand, true ),
            $s = '0123456789ABCDEFGHIJKLMNOPQRSTUV',
            $d = '',
            $f = 0;
            $f < 6;
            $g = ord( $a[ $f ] ),
            $d .= $s[ ( $g ^ ord( $a[ $f + 8 ] ) ) - $g & 0x1F ],
            $f++
        );
        return $d;
    }

    /**
     * 判断验证码是否存在数据库中
     * @param $code
     * @return bool
     */
    public function recode($code) {
        if (Merchant::whereCode($code)->first()) {
            return false;
        }
        return true;
    }

    /**
     * 邀请码查询上级商家ID
     * @param $code
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|int|mixed
     */
    public function searchPid($code)
    {
        $upper = strtoupper($code);
        $pid = Merchant::whereCode($upper)->first();
        if (empty($pid)){
            throw new ServiceException(ErrorMsgConstants::VALIDATION_DATA_ERROR,'查无此邀请码');
        }
        return $pid->id;
    }


}
