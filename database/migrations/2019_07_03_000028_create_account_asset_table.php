<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountAssetTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'account_asset';

    /**
     * Run the migrations.
     * @table account_asset
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('assetid');
            $table->enum('save_status', ['ซ่อมแซม', 'สินค้าใหม่'])->nullable()->default('สินค้าใหม่')->comment('การบันทึก');
            $table->enum('asset_type', ['บริจาค', 'ของแถม', 'สินทรัพย์ไม่มีตัวตน', 'ไม่มีมูลค่าสินทรัพย์'])->nullable()->default(null)->comment('ชนิด');
            $table->string('asset_code', 20)->comment('รหัสสินทรัพย์');
            $table->string('nameth', 50)->comment('ชื่อบัญชีสินทรัพย์');
            $table->string('nameen', 50)->nullable()->default(null)->comment('ชื่อบัญชีสินทรัพย์ภาษาอังกฤษ');
            $table->text('asset_detail')->nullable()->default(null)->comment('รายละเอียด');
            $table->enum('asset_unit', ['แกลอน', 'กิโลกรัม', 'ก้อน', 'กระสอบ', 'กระปุก', 'กระป๋อง', 'คัน', 'กล่อง', 'โหล', 'ชิ้น'])->nullable()->default(null)->comment('หน่วย');
            $table->float('asset_price')->nullable()->default('0')->comment('ราคาซื้อ');
            $table->date('buydate')->nullable()->default(null)->comment('วันที่ซื้อ');
            $table->enum('base_depreciation', ['ราคาคงเหลือล่าสุด', 'ราคาซื้อ'])->nullable()->default(null)->comment('ชนิดฐานคิดค่าเสื่อม');
            $table->enum('depreciation_method', ['Sum of Years'' Digits', 'Units - of - Production Method', 'Double - Declining Balance (DDB)', 'เส้นตรง'])->nullable()->default(null)->comment('วิธีคิดค่าเสื่อม');
            $table->float('brate_dprct_per')->nullable()->default('0')->comment('อัตราฐานคิดค่าเสื่อม (%)');
            $table->float('dprct_charge')->nullable()->default('0')->comment('ค่าจำกัดคิดค่าเสื่อม');
            $table->float('drate_per')->nullable()->default('0')->comment('อัตราค่าเสื่อม (%)');
            $table->float('cprice')->nullable()->default(null)->comment('ราคาค่าซาก');
            $table->string('parent_asset_code', 10)->nullable()->default(null)->comment('รหัสสินทรัพย์แม่');
            $table->enum('start_charge', ['No', 'Yes'])->nullable()->default(null)->comment('เริ่มคิดค่าเสื่อม');
            $table->date('date_dprct')->nullable()->default(null)->comment('วันที่ี่เรื่มคิดค่าเสื่อม');
            $table->integer('lifetime_year')->nullable()->default('0')->comment('อายุการใช้งาน (ปี)');
            $table->enum('dstatus', ['ยังไม่จำหน่าย', 'เสื่อมสภาพ', 'ขาย', 'บริจาค'])->nullable()->default('ยังไม่จำหน่าย')->comment('สถานะจำหน่าย');
            $table->string('asset_acccnt_code', 10)->comment('รหัสบัญชีสินทรัพย์');
            $table->string('dprct_acccnt_code', 10)->nullable()->default(null)->comment('รหัสบัญชีค่าเสื่อม');
            $table->string('acccnt_acode', 10)->nullable()->default(null)->comment('รหัสบัญชีค่าเสื่อมสะสม');
            $table->string('serialno', 10)->nullable()->default(null)->comment('Serial Number');
            $table->string('assets_note', 50)->nullable()->default(null)->comment('หมายเหตุ');
            $table->string('store_code', 50)->nullable()->default(null)->comment('คลังสินค้า/สถานที่เก็บ');
            $table->string('store_note', 50)->nullable()->default(null)->comment('หมายเหตุที่เก็บ');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข');
            $table->dateTime('tsdatetime_update')->nullable()->default(null)->comment('วันเวลาดึงข้อมูล');
            $table->integer('tsuser_update')->nullable()->default(null)->comment('ผู้ดึงข้อมูล');
            $table->enum('fag_allow', ['ลบ/บล็อค', 'ระงับ', 'ปกติ'])->nullable()->default('ปกติ')->comment('สถานะใช้งาน');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
