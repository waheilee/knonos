<?php


namespace App\Http\Controllers\Api;

use App\Constants\ErrorMsgConstants;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Services\Api\MerchantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MerchantApi extends Controller
{

    private $merchantService;

    public function __construct(MerchantService $merchantService)
    {
        $this->merchantService = $merchantService;
    }

    public function addMerchant(Request $request)
    {
        try{
            $validatorRules = [
                'property'        => 'required',
                'cp_name'         => 'required',
                'cp_scale'        => 'required',
                'business_number' => 'required',
                'legal_person'    => 'required',
                'legal_id_card'   => 'required',
                'phone'           => 'required',
                'business_photo'  => 'required',
                'id_card_photo_a' => 'required',
                'id_card_photo_b' => 'required',


            ];
            $validatorMessages = [
                'property.required'        => "公司性质不能为空!",
                'cp_name.required'         => "公司名称不能为空",
                'cp_scale.required'        => "公司规模不能为空",
                'business_number.required' => "纳税识别号不能为空",
                'legal_person.required'    => "法人姓名不能为空",
                'legal_id_card.required'   => "法人证件号码不能为空",
                'phone.required'           => "法人电话不能为空",
                'business_photo.required'  => "公司营业执照不能为空",
                'id_card_photo_a.required' => "法人身份证正面照片不能为空",
                'id_card_photo_b.required' => "法人身份证照片反面不能为空",
            ];
            $this->requestValidator($request, $validatorRules, $validatorMessages);
            $data = $this->merchantService->add($request);
            return $this->wrapSuccessReturn(compact('data'));
        }catch (\Exception $exception){
            return $this->wrapErrorReturn($exception);
        }
    }

    public function photo(Request $request)
    {
//        try{
            $data = $this->merchantService->setPhoto($request);
            return $this->wrapSuccessReturn(compact('data'));
//        }catch (\Exception $exception){
//            return $this->wrapErrorReturn($exception);
//        }
    }

    public function test(Request $request)
    {
        $image = $request->input('pic');
        $base  = preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
        $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
        $image = str_replace(' ', '+', $image);
        if (!$base){
            throw new ServiceException(ErrorMsgConstants::VALIDATION_DATA_ERROR,'上传的base64图片格式有误');
        }
        $imageName = 'photo/'.date('Y-m-d') . uniqid() . '.' . $image_extension[1]; //generating unique file name;

        $disk      = Storage::disk('qiniu');
        $disk->put($imageName,base64_decode($image));

        return env('QINIU_URL').$imageName;

//        try{
            $data = $this->merchantService->setPhoto($request);
            return $this->wrapSuccessReturn(compact('data'));
//        }catch (\Exception $exception){
//            return $this->wrapErrorReturn($exception);
//        }
    }
}
