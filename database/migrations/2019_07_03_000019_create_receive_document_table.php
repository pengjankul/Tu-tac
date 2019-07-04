<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveDocumentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'receive_document';

    /**
     * Run the migrations.
     * @table receive_document
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('recdcid')->comment('ไอดีเอกสารจ่าย');
            $table->string('recdc_code', 20)->comment('รหัสเอกสาร');
            $table->string('instcode', 10)->nullable()->default(null)->comment('รหัสหน่วยงาน');
            $table->string('rescode', 10)->nullable()->default(null)->comment('รหัสนักวิจัย');
            $table->string('projcode', 10)->comment('รหัสโครงการ');
            $table->string('office_namesave', 50)->nullable()->default(null)->comment('พนักงานลงบัญชี');
            $table->enum('doccate', ['ใบสำคัญรับ', 'ใบสำคัญรับทั่วไป'])->nullable()->default('ใบสำคัญรับ')->comment('ประเภทเอกสาร');
            $table->date('docdate')->comment('วันที่เอกสาร');
            $table->string('recdoc_name', 100)->comment('ชื่อเอกสาร');
            $table->integer('box_number')->nullable()->default(null)->comment('หมายเลขกล่อง');
            $table->integer('rec_order')->nullable()->default(null)->comment('ลำดับงวด');
            $table->float('money_received')->nullable()->default('0')->comment('จำนวนเงินรับ');
            $table->float('bank_charge')->nullable()->default('0')->comment('ค่าธรรมเนียมธนาคาร');
            $table->float('turac_charge')->nullable()->default('0')->comment('ค่าธรรมเนียม turac');
            $table->float('origin_charge')->nullable()->default('0')->comment('คธ.ต้นสังกัด 3%');
            $table->float('mulct')->nullable()->default('0')->comment('ค่าปรับ');
            $table->float('money_test_pay')->nullable()->default('0')->comment('เงินทดลองจ่าย');
            $table->float('reserve_pay')->nullable()->default('0')->comment('เงินสำรองจ่าย');
            $table->float('rec_value')->nullable()->default('0')->comment('จำนวนเงินรับสุทธิ');
            $table->text('rec_note')->nullable()->default(null)->comment('หมายเหตุ/รายละเอียดเพิ่มเติม');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข');
            $table->dateTime('tsdatetime_update')->nullable()->default(null)->comment('วันเวลาดึงข้อมูล');
            $table->integer('tsuser_update')->nullable()->default(null)->comment('ผู้ดึงข้อมูล');
            $table->enum('fag_allow', ['ปกติ', 'ระงับ', 'ลบ/บล็อค'])->nullable()->default('ปกติ')->comment('สถานะใช้งาน');
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
