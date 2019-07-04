<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountBookTemplateTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'account_book_template';

    /**
     * Run the migrations.
     * @table account_book_template
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('book_tmpid')->comment('ไอดีหนังสือเท็มเพล็ตบัญชี ');
            $table->integer('accnt_tmpid')->nullable()->default(null)->comment('ไอดีเท็มเพล็ตบัญชี');
            $table->string('accnt_code', 10)->comment('รหัสบัญชี');
            $table->enum('acccnt_tmp_type', ['Debit', 'Credit'])->nullable()->default(null)->comment('สถานะรายการบัญชี');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข');
            $table->enum('fag_allow', ['ปกติ', 'ระงับ', 'ลบ/บล็อค'])->nullable()->default('ปกติ');
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
