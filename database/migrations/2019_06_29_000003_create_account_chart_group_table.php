<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountChartGroupTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'account_chart_group';

    /**
     * Run the migrations.
     * @table account_chart_group
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('grp_chartid')->comment('ไอดีกลุ่มบัญชี\\r\\n');
            $table->string('grp_chart_name', 50)->comment('ชื่อกลุ่ม');
            $table->text('grp_chart_detail')->nullable()->default(null)->comment('รายละเอียด\\r\\n');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม\\r\\n');
            $table->integer('user_add')->comment('ผู้เพิ่ม\\r\\n');
            $table->dateTime('datetime_update')->comment('วันเวลาแก้ไข\\r\\n');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข\\r\\n');
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
