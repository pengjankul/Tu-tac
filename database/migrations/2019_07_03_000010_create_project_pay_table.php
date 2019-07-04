<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPayTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'project_pay';

    /**
     * Run the migrations.
     * @table project_pay
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('propid')->comment('ไอดีงวดเงินโครงการ');
            $table->integer('projid')->nullable()->default(null)->comment('ไอดีโครงการ');
            $table->integer('prop_order')->nullable()->default(null)->comment('ลำดับงวด');
            $table->date('date_start')->nullable()->default(null)->comment('วันครบกำหนด');
            $table->float('period_per')->nullable()->default('0')->comment('งวดเงินแต่ละงวด (%)');
            $table->float('warranty_per')->nullable()->default('0')->comment('ประกันผลงาน (%)');
            $table->float('advne_money')->nullable()->default('0')->comment('เงินล่วงหน้า');
            $table->float('mulct')->nullable()->default('0')->comment('ค่าปรับ');
            $table->float('money_rec')->nullable()->default('0')->comment('เงินที่ได้รับจากผู้ว่าจ้าง');
            $table->float('bank_charge')->nullable()->default('0')->comment('ค่าธรรมเนียมธนาคาร');
            $table->float('turac_charge')->nullable()->default('0')->comment('ค่าธรรมเนียม turac (%)');
            $table->float('depart_charge')->nullable()->default('0')->comment('ค่าธรรมเนียม คณะ (%)');
            $table->float('money_test_pay')->nullable()->default('0')->comment('เงินทดลองจ่าย');
            $table->float('reserve_pay')->nullable()->default('0')->comment('เงินสำรองจ่าย');
            $table->float('advne_payper')->nullable()->default('0')->comment('เงินรับล่วงหน้า (%)');
            $table->text('getdoc_code')->nullable()->default(null)->comment('เลขเอกสารรับ');
            $table->float('net_period')->nullable()->default('0')->comment('งวดเงินสุทธิ');
            $table->enum('period_status', ['Match', 'Not Match'])->nullable()->default('Not Match')->comment('สถานะงวด');
            $table->text('doccode')->nullable()->default(null)->comment('รหัสเอกสาร Match');
            $table->float('prop_value')->nullable()->default('0')->comment('มูลค่าโครงการ');
            $table->text('prop_detail')->nullable()->default(null)->comment('รายละเอียด');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข');
            $table->dateTime('tsdatetime_update')->nullable()->default(null)->comment('วันเวลาดึงข้อมูล');
            $table->integer('tsuser_update')->nullable()->default(null)->comment('ผู้ดึงข้อมูล');
            $table->enum('fag_allow', ['ปกติ', 'ระงับ', 'ลบ/บล็อค', ''])->nullable()->default('ปกติ')->comment('สถานะใช้งาน');
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
