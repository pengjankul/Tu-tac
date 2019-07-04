<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountChartTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'account_chart';

    /**
     * Run the migrations.
     * @table account_chart
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('achart_id')->comment('ไอดีแผนผังบัญชี\\r\\n');
            $table->integer('grp_chartid')->nullable()->default(null)->comment('ไอดีกลุ่ม\\r\\n');
            $table->integer('achart_parent_id')->nullable()->default(null);
            $table->string('chart_code', 10)->comment('เลขผังบัญชี');
            $table->string('nameth', 100)->comment('ชื่อภาษาไทย\\r\\n');
            $table->string('nameen', 100)->nullable()->default(null)->comment('ชือภาษาอังกฤษ');
            $table->text('chart_detail')->nullable()->default(null)->comment('รายละเอียด\\r\\n');
            $table->string('chartcate_type', 45)->nullable()->default(null)->comment('ประเภทผังบัญชี');
            $table->enum('accnt_type', ['Debit', 'Credit', 'all'])->nullable()->default(null)->comment('ลักษณะรายการบัญชี');
            $table->enum('chartchart_type', ['ได้', 'ไม่ได้'])->nullable()->default(null)->comment('สามารถลงบัญชีได้/ไม่ได้');
            $table->text('chart_remark')->nullable()->default(null)->comment('หมายเหตุ');
            $table->integer('mapid')->nullable()->default(null)->comment('เชื่อมโยงกับผังบัญชี');
            $table->integer('chartyear')->nullable()->default(null)->comment('ปีงบประมาณ');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม\\r\\n');
            $table->integer('user_add')->comment('ผู้เพิ่ม\\r\\n');
            $table->dateTime('datetime_update')->comment('วันเวลาแก้ไข\\r\\n');
            $table->integer('user_update')->comment('ผู้แก้ไข\\r\\n');
            $table->enum('fag_allow', ['ปกติ', 'ระงับ', 'ลบ/บล็อก'])->nullable()->default('ปกติ')->comment('สถานะใช้งาน\\r\\n');
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
