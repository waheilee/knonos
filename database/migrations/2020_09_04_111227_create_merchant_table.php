<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('property')->comment('公司性质');
            $table->string('cp_name')->comment('公司名称');
            $table->string('cp_scale')->comment('公司规模');
            $table->string('introduce')->comment('公司简介')->nullable();
            $table->string('business_number')->comment('纳税识别号');
            $table->string('legal_person',50)->comment('法人姓名');
            $table->string('legal_id_card',20)->comment('法人身份证号');
            $table->string('phone',15)->comment('联系方式');
            $table->string('address')->comment('地址');
            $table->string('bank_number')->comment('银行开户账号')->nullable();
            $table->string('bank')->comment('开户银行')->nullable();
            $table->string('category')->comment('经营类目')->nullable();
            $table->string('business_photo')->comment('营业执照照片')->nullable();
            $table->string('id_card_photo_a')->comment('身份证照片正面')->nullable();
            $table->string('id_card_photo_b')->comment('身份证照片反面')->nullable();
            $table->string('code')->comment('邀请码')->nullable();
            $table->string('p_id')->comment('邀请人ID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant');
    }
}
