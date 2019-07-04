<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankStatementOrderTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'bank_statement_order';

    /**
     * Run the migrations.
     * @table bank_statement_order
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('bnksm_id')->comment('ไอดีรายการ');
            $table->dateTime('bnk_pdate')->comment('วันที่รับเงิน');
            $table->float('bnk_apaid')->nullable()->default('0')->comment('จำนวนเงินจ่าย');
            $table->float('bnk_areceived')->nullable()->default('0')->comment('จำนวนเงินรับ');
            $table->float('bnk_balance')->nullable()->default('0')->comment('คงเหลือ');
            $table->dateTime('rec_docdate')->comment('วันที่ทำเอกสารสำคัญรับ');
            $table->string('reccode', 20)->comment('รหัสใบสำคัญรับ');
            $table->float('recvalue')->nullable()->default('0')->comment('จำนวนเงินรับ');
            $table->dateTime('pdocdate')->comment('วันที่ทำเอกสารสำคัญจ่าย');
            $table->string('pcode', 20)->comment('รหัสใบสำคัญจ่าย');
            $table->float('pvalue')->nullable()->default('0')->comment('จำนวนเงินจ่าย');
            $table->string('check_account', 30)->nullable()->default(null)->comment('เลขที่เช็ค');
            $table->date('pdate')->nullable()->default(null)->comment('วันที่จ่ายเงิน');
            $table->float('bnk_pbalance')->nullable()->default('0')->comment('คงเหลือ');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->nullable()->default(null)->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->nullable()->default(null)->comment('ผู้แก้ไข');
            $table->dateTime('tsdatetime_update')->nullable()->default(null)->comment('วันเวลาดึงข้อมูล');
            $table->integer('tsuser_update')->nullable()->default(null)->comment('ผู้ดึงข้อมูล');
            $table->enum('bank_statem_type', ['Credit', 'Debit'])->nullable()->default(null)->comment('ประเภท');
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
