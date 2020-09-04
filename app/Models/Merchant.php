<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Merchant
 *
 * @property int $id
 * @property string $property 公司性质
 * @property string $cp_name 公司名称
 * @property string $cp_scale 公司规模
 * @property string|null $introduce 公司简介
 * @property string $business_number 纳税识别号
 * @property string $legal_person 法人姓名
 * @property string $legal_id_card 法人身份证号
 * @property string $phone 联系方式
 * @property string $address 地址
 * @property string|null $bank_number 银行开户账号
 * @property string|null $bank 开户银行
 * @property string|null $category 经营类目
 * @property string|null $business_photo 营业执照照片
 * @property string|null $id_card_photo_a 身份证照片正面
 * @property string|null $id_card_photo_b 身份证照片反面
 * @property string|null $code 邀请码
 * @property string|null $p_id 邀请人ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereBankNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereBusinessNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereBusinessPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereCpName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereCpScale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereIdCardPhotoA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereIdCardPhotoB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereIntroduce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereLegalIdCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereLegalPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant wherePId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Merchant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Merchant extends Model
{
    protected $table = 'merchant';


}
