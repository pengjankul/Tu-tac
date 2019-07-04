<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebserviceLogTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'webservice_log';

    /**
     * Run the migrations.
     * @table webservice_log
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('websv_logid')->comment('ไอดีรายการ');
            $table->integer('websv_id')->nullable()->default(null)->comment('ไอดีรายการ');
            $table->string('log_name', 100)->comment('ชื่อ (Service Name)');
            $table->text('request_method')->nullable()->default(null);
            $table->text('respon_result')->nullable()->default(null)->comment('การตอบกลับ (Response)');
            $table->text('action_note')->nullable()->default(null)->comment('ข้อมูลเพิ่มเติม');
            $table->integer('exect_time')->nullable()->default(null)->comment('ระยะเวลาประมวลผล (วินาที)');
            $table->dateTime('datetime_acction')->comment('วันเวลาทำรายการ');
            $table->integer('user_action');
            $table->enum('rstate', ['Delete', 'Failed', 'Success'])->nullable()->default('Failed')->comment('สถานะใช้งาน');
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
