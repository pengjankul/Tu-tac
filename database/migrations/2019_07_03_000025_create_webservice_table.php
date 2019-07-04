<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebserviceTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'webservice';

    /**
     * Run the migrations.
     * @table webservice
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('websv_id')->comment('ไอดีรายการ');
            $table->string('websv_name', 100)->comment('ชื่อ (Service Name)');
            $table->string('request_code', 4)->nullable()->default(null)->comment('รหัสการร้องขอ (Request Code)');
            $table->string('reply_code', 4)->nullable()->default(null)->comment('รหัสตอบกลับ (Reply Code)');
            $table->text('websv_definition')->nullable()->default(null)->comment('คําอธิบาย (Definition)');
            $table->string('websv_protocal', 4)->nullable()->default(null)->comment('มาตรฐานการเชื่อม (Protocal)');
            $table->string('websv_method', 4)->nullable()->default(null)->comment('ลักษณะข้อมูลการเรียก');
            $table->string('websv_port', 4)->nullable()->default(null)->comment('ช่องทางเชื่อมต่อ (Port)');
            $table->text('websv_link')->nullable()->default(null)->comment('ลิงค์ URL');
            $table->text('websv_chanel')->nullable()->default(null)->comment('เรียกเซอร์วิสผ่านทาง');
            $table->text('request_method')->comment('การร้องขอ (Request)');
            $table->text('respone_result')->nullable()->default(null)->comment('การตอบกลับ (Response)');
            $table->dateTime('datetime_add')->nullable()->default(null)->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->nullable()->default(null);
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
