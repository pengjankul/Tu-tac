<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'institution';

    /**
     * Run the migrations.
     * @table institution
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('instid')->comment('ไอดีหน่วยงาน/คณะ');
            $table->string('instcode', 10)->comment('รหัสผู้ว่าจ้าง');
            $table->string('nameth', 50)->comment('ชื่อหน่วยงานภาษาไทย');
            $table->string('nameen', 50)->nullable()->default(null)->comment('ชื่อหน่วยงานภาษาอังกฤษ');
            $table->text('addr_psonth')->nullable()->default(null)->comment('ที่อยู่ ภาษาไทย');
            $table->text('addr_psonen')->nullable()->default(null)->comment('ที่อยู่ ภาษาอังกฤษ');
            $table->string('addr_msg_name_th', 50)->nullable()->default(null)->comment('ชื่อสำหรับการจัดส่ง ภาษาไทย');
            $table->text('addr_msg_th')->nullable()->default(null)->comment('ที่อยู่การจัดส่ง ภาษาอังกฤษ');
            $table->string('taxcode', 13)->nullable()->default(null)->comment('เลขที่ผู้เสียภาษี');
            $table->text('addr')->nullable()->default(null)->comment('ที่อยู่ หมู่บ้าน อาคาร');
            $table->string('telno', 50)->nullable()->default(null)->comment('ติดต่อ');
            $table->string('fax_addr', 15)->nullable()->default(null)->comment('ที่อยู่แฟกซ์');
            $table->string('email_addr', 50)->nullable()->default(null)->comment('อีเมล');
            $table->string('website_addr', 50)->nullable()->default(null)->comment('เว็บไซต์');
            $table->string('departtype', 30)->comment('ชนิดสาขา');
            $table->string('depart_lv_second', 100)->nullable()->default(null)->comment('สาขาระดับสอง');
            $table->string('depart_lv_third', 100)->nullable()->default(null)->comment('สาขาระดับสาม');
            $table->string('depart_lv_fourth', 100)->nullable()->default(null)->comment('สาขาระดับสี่');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->comment('ผู้แก้ไข');
            $table->dateTime('tsdatetime_update')->comment('วันเวลาดึงข้อมูล');
            $table->integer('tsuser_update')->comment('ผู้ดึงข้อมูล');
            $table->enum('fag_status', ['in', 'out'])->nullable()->default(null)->comment('สถานะสมาชิก');
            $table->enum('fag_allow', ['ปกติ', 'ระงับ', 'ลบ/บล็อก'])->nullable()->default(null)->comment('\'สถานะใช้งาน\'');
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
