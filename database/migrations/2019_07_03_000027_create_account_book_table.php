<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountBookTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'account_book';

    /**
     * Run the migrations.
     * @table account_book
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('accntid')->comment('ไอดีหนังสือบัญชี');
            $table->integer('presvid')->nullable()->default(null)->comment('ไอดีบัญชีก่อนบันทึก');
            $table->integer('acsid')->nullable()->default(null)->comment('ไอดีรายการบัญชีเดบิต/เครดิต');
            $table->integer('accnt_tmpid')->nullable()->default(null)->comment('ไอดีเท็มเพล็ตบัญชี');
            $table->string('acccont_code', 10)->default('')->comment('รหัสแผนผังบัญชี');
            $table->string('doccode', 20)->nullable()->default(null)->comment('รหัสเอกสาร');
            $table->date('datein')->comment('วันที่ลงบัญชีหนังสือ');
            $table->text('book_detail')->nullable()->default(null)->comment('คำอธิบายรายการ');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->nullable()->default(null)->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข');
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
