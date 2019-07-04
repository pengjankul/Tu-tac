<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountStatementOrderTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'account_statement_order';

    /**
     * Run the migrations.
     * @table account_statement_order
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('acsid')->comment('ไอดีรายการ');
            $table->string('doccode', 20)->comment('รหัสเอกสาร');
            $table->string('accnt_code', 10)->comment('รหัสบัญชี');
            $table->float('accnt_balance')->nullable()->default('0')->comment('ยอดเงิน');
            $table->dateTime('date_order')->comment('วันที่รายการ');
            $table->string('accnt_note', 50)->nullable()->default(null)->comment('หมายเหตุุ');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null);
            $table->dateTime('tsdatetime_update')->nullable()->default(null)->comment('วันเวลาดึงข้อมูล');
            $table->integer('tsuser_update')->nullable()->default(null);
            $table->enum('accnt_type', ['Credit', 'Debit'])->nullable()->default(null)->comment('ประเภท');
            $table->enum('fag_allow', ['ลบ/บล็อค', 'ระงับ', 'ปกติ'])->default('ระงับ')->comment('สถานะใช้งาน');
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
