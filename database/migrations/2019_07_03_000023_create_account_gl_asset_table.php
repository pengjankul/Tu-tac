<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountGlAssetTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'account_gl_asset';

    /**
     * Run the migrations.
     * @table account_gl_asset
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('assetgl_id')->comment('ไอดีสินทรัพย์');
            $table->string('assetg_code', 20)->comment('รหัสสินทรัพย์');
            $table->integer('acccnt_bookid')->nullable()->default(null)->comment('ไอดีหนังสือบัญชี');
            $table->string('nameth', 50)->nullable()->default(null)->comment('ชื่อบัญชีสินทรัพย์');
            $table->string('nameen', 50)->nullable()->default(null)->comment('ชื่อบัญชีสินทรัพย์ภาษาอังกฤษ');
            $table->text('gldetail')->nullable()->default(null)->comment('รายละเอียด');
            $table->enum('glunit', ['แกลอน', 'กิโลกรัม', 'ก้อน', 'กระสอบ', 'กระปุก', 'กระป๋อง', 'คัน', 'กล่อง', 'โหล', 'ชิ้น'])->nullable()->default(null)->comment('หน่วย');
            $table->float('glprice')->nullable()->default('0')->comment('ราคาซื้อ');
            $table->date('buydate')->nullable()->default(null)->comment('วันที่ซื้อ');
            $table->integer('lifetime_year')->nullable()->default('0')->comment('อายุการใช้งาน (ปี)');
            $table->string('serialno', 10)->nullable()->default(null)->comment('Serial Number');
            $table->string('glnote', 50)->nullable()->default(null)->comment('หมายเหตุ');
            $table->string('storecode', 50)->nullable()->default(null)->comment('คลังสินค้า/สถานที่เก็บ');
            $table->string('storenote', 50)->nullable()->default(null)->comment('หมายเหตุที่เก็บ');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->nullable()->default(null)->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข');
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
