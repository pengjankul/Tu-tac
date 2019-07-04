<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayDocumentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pay_document';

    /**
     * Run the migrations.
     * @table pay_document
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('paydcid')->comment('ไอดีเอกสารจ่าย');
            $table->string('paydc_code', 20)->comment('รหัสเอกสาร');
            $table->string('instcode', 10)->nullable()->default(null)->comment('รหัสหน่วยงาน');
            $table->string('rescode', 10)->nullable()->default(null)->comment('รหัสนักวิจัย');
            $table->string('proj_code', 10)->comment('รหัสโครงการ');
            $table->string('fname_serv', 50)->nullable()->default(null)->comment('พนักงานลงบัญชี');
            $table->date('datedoc')->comment('วันที่เอกสาร');
            $table->enum('doccate', ['ใบสำคัญจ่ายทั่วไป', 'ใบสำคัญจ่าย'])->nullable()->default('ใบสำคัญจ่าย')->comment('ประเภทเอกสาร');
            $table->string('docname', 100)->comment('ชื่อเอกสาร');
            $table->integer('box_number')->nullable()->default(null)->comment('หมายเลขกล่อง');
            $table->integer('doc_order')->nullable()->default(null)->comment('ลำดับงวด');
            $table->float('money_rec')->nullable()->default('0')->comment('จำนวนเงินรับ');
            $table->float('bank_charge')->nullable()->default('0')->comment('ค่าธรรมเนียมธนาคาร');
            $table->float('turacc_charge')->nullable()->default('0')->comment('ค่าธรรมเนียม turac');
            $table->float('origin_charge')->nullable()->default('0')->comment('คธ.ต้นสังกัด 3%');
            $table->float('mulct')->nullable()->default('0')->comment('ค่าปรับ');
            $table->float('money_test_pay')->nullable()->default('0')->comment('เงินทดลองจ่าย');
            $table->float('reservepay')->nullable()->default('0')->comment('เงินสำรองจ่าย');
            $table->float('pay_value')->nullable()->default('0')->comment('จำนวนเงินรับสุทธิ');
            $table->text('pay_note')->nullable()->default(null)->comment('หมายเหตุ/รายละเอียดเพิ่มเติม');
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
