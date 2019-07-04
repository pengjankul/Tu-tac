<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTemplateTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'account_template';

    /**
     * Run the migrations.
     * @table account_template
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('accnt_tmpid')->comment('ไอดีเท็มเพล็ตบัญชี');
            $table->string('tmp_name', 100)->comment('ชื่อ');
            $table->string('tmp_case', 100)->nullable()->default(null)->comment('กรณี');
            $table->text('tmp_detail')->nullable()->default(null)->comment('รายละเอียด');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข');
            $table->enum('fag_allow', ['ปกติ', 'ระงับ', 'ลบ/บล็อค', ''])->nullable()->default('ปกติ')->comment('สถานะ');
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
