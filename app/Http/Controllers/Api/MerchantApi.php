<?php


namespace App\Http\Controllers\Api;

use App\Constants\ErrorMsgConstants;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Models\UploadsModel;
use App\Services\Api\MerchantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
//        try{
            $validatorRules = [
                'property'        => 'required',
                'cp_name'         => 'required',
                'legal_person'    => 'required',
                'phone'           => 'required',
                'business_photo'  => 'required',


            ];
            $validatorMessages = [
                'property.required'        => "公司性质不能为空!",
                'cp_name.required'         => "公司名称不能为空",
                'legal_person.required'    => "姓名不能为空",
                'phone.required'           => "电话不能为空",
                'business_photo.required'  => "公司营业执照不能为空",
            ];
            $this->requestValidator($request, $validatorRules, $validatorMessages);
            $data = $this->merchantService->add($request);
            return $this->wrapSuccessReturn(compact('data'));
//        }catch (\Exception $exception){
//            return $this->wrapErrorReturn($exception);
//        }
    }

    public function photo(Request $request)
    {
        try{
            $data = $this->merchantService->setPhoto($request);
            return $this->wrapSuccessReturn(compact('data'));
        }catch (\Exception $exception){
            return $this->wrapErrorReturn($exception);
        }
    }

    public function test(Request $request)
    {
//        $file = $_FILES['logo'];
        $upload = new UploadsModel('logo', storage_path('app/public'));

        return $upload->upload();
    }
}
