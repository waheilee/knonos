<?php


namespace App\Http\Controllers\Api;

use App\Constants\ErrorMsgConstants;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
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
        if(!empty($_FILES['logo'])){

//            return $_FILES['logo'];

            Log::info($_FILES["logo"]["type"]."---".$_FILES["logo"]["name"]."---".$_FILES["logo"]["size"]);

            $uploaddir = 'app/public/uploads/';
            $uploadfile = $uploaddir . basename($_FILES['logo']['name']);
            return $uploadfile;
            Log::info($uploadfile);
            if (move_uploaded_file($_FILES['logo']['tmp_name'], storage_path($uploadfile))) {
                Log::info( "File is valid, and was successfully uploaded.\n");
            } else {
                Log::info(  "Possible file upload attack!\n");
            }


        }


        $ret['err']     = 0;
        $ret['msg']     = '成功';

        return response()->json($ret);
    }
}
