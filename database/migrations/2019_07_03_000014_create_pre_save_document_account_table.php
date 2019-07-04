<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreSaveDocumentAccountTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pre_save_document_account';

    /**
     * Run the migrations.
     * @table pre_save_document_account
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('presvid')->comment('ไอดีบัญชีก่อนบันทึก');
            $table->string('presv_code', 20)->comment('รหัสเอกสาร');
            $table->integer('box_number')->nullable()->default(null)->comment('หมายเลขกล่อง');
            $table->string('fname_serv', 50)->nullable()->default(null)->comment('พนักงานลงบัญชี');
            $table->date('datedoc')->comment('วันที่เอกสาร');
            $table->enum('doccate', ['ใบสำคัญจ่ายทั่วไป', 'ใบสำคัญรับทั่วไป', 'ใบสำคัญจ่าย', 'ใบสำคัญรับ', 'ใบแจ้งหนี้'])->nullable()->default('ใบแจ้งหนี้')->comment('ประเภทเอกสาร');
            $table->string('project_code', 10)->comment('รหัสโครงการ');
            $table->string('lnstcode', 10)->nullable()->default(null)->comment('รหัสหน่วยงาน');
            $table->string('rescode', 10)->nullable()->default(null);
            $table->integer('pre_order')->nullable()->default(null)->comment('ลำดับงวด');
            $table->float('pre_value')->nullable()->default('0')->comment('มูลค่ารวม');
            $table->float('pre_charge')->nullable()->default('0')->comment('ค่าธรรมเนียม');
            $table->float('waranty_value')->nullable()->default('0')->comment('ค่าประกันผลงาน');
            $table->float('waranty_value_charge')->nullable()->default('0')->comment('ธรรมเนียมค่าประกันผลงาน');
            $table->text('docnote')->nullable()->default(null)->comment('หมายเหตุ/รายละเอียดเพิ่มเติม');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข');
            $table->dateTime('tsdatetime_update')->nullable()->default(null)->comment('วันเวลาดึงข้อมูล');
            $table->integer('tsuser_update')->nullable()->default(null)->comment('ผู้ดึงข้อมูล');
            $table->enum('fag_allow', ['ลบ/บล็อค', 'ยกเลิก', 'ข้อมูลใหม่'])->nullable()->default('ข้อมูลใหม่');
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
