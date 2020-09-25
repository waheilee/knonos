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

        $file = request()->file('file');

            if($file->isValid()){
                $ext = $file->getClientOriginalExtension();//文件扩展名
                return $ext;
                $file_name = date("YmdHis",time()).'-'.uniqid().".".$ext;//保存的文件名
                if(!in_array($ext,['jpg','jpeg','gif','png']) ) return response()->json('文件类型不是图片');
                //把临时文件移动到指定的位置，并重命名
                $path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'wchat_img'.DIRECTORY_SEPARATOR.date('Y').DIRECTORY_SEPARATOR.date('m').DIRECTORY_SEPARATOR.date('d').DIRECTORY_SEPARATOR;
                $bool =  $file->move($path,$file_name);
                if($bool){
                    $img_path = '/uploads/wchat_img/'.date('Y').'/'.date('m').'/'.date('d').'/'.$file_name;
                    $data = [
//                        'domain_img_path'=>get_domain().$img_path,
                        'img_path'=>$img_path,
                    ];
                    return response()->json($data);
                }else{
                    return response()->json("图片上传失败！");
                }
            }else {
                return response()->json("图片上传失败！");
            }
    }
}
