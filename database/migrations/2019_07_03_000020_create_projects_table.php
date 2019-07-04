<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'projects';

    /**
     * Run the migrations.
     * @table projects
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('projid')->comment('ไอดีโครงการ');
            $table->string('proj_code', 10)->comment('รหัสโครงการ');
            $table->string('proj_name', 150)->comment('ชื่่อโครงการ');
            $table->string('acccnt_code', 10)->comment('รหัสบัญชี');
            $table->date('datestart')->comment('วันที่เริ่มโครงการ/ลงนาม');
            $table->date('dateend')->comment('วันที่สิ้นสุดโครงการ');
            $table->date('proj_year')->comment('ปีงบประมาณ');
            $table->text('proj_detail')->nullable()->default(null)->comment('รายละเอียด');
            $table->string('proj_note', 150)->nullable()->default(null)->comment('หมายเหตุ');
            $table->float('proj_value')->nullable()->default('0')->comment('มูลค่าโครงการ');
            $table->enum('proj_cate', ['สกว', '2.5', 'ปกติ']);
            $table->integer('instid')->nullable()->default(null);
            $table->enum('proj_status', ['''ช่วงขั้นตอนลงนาม', 'ช่วงขั้นตอนเตรียมงาน'])->comment('ประเภทโครงการ');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข');
            $table->dateTime('tsdatetime_update')->nullable()->default(null)->comment('วันเวลาดึงข้อมูล');
            $table->integer('tsuser_update')->nullable()->default(null)->comment('ผู้ดึงข้อมูล');
            $table->enum('fag_allow', ['ลบ/บล็อค', 'ระงับ', 'ปกติ'])->default('ปกติ');
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
