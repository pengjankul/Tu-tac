<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookBankTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'book_bank';

    /**
     * Run the migrations.
     * @table book_bank
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('BookBankID')->comment('ไอดีบัญชีเงินฝาก\\r\\n');
            $table->integer('BankBranchID')->nullable()->default(null)->comment('ไอดีสาขาธนาคาร\\r\\n');
            $table->string('Name', 50)->nullable()->default(null)->comment('ชื่อบัญชีเงินฝาก\\r\\n');
            $table->string('Note', 50)->nullable()->default(null);
            $table->dateTime('DateTimeAdd')->comment('วันเวลาเพิ่ม\\r\\n');
            $table->integer('UserAdd')->comment('ผู้เพิ่ม\\r\\n');
            $table->dateTime('DateTimeUpdate')->comment('วันเวลาแก้ไข\\r\\n');
            $table->dateTime('tsDateTimeUpdate')->comment('วันเวลาดึงข้อมูล\\r\\n');
            $table->integer('tsUserUpdate')->comment('ผู้ดึงข้อมูล\\r\\n');
            $table->integer('UserUpdate')->comment('ผู้แก้ไข\\r\\n');
            $table->enum('Allow', ['ปกติ', 'ระงับ', 'ลบ/บล็อก'])->nullable()->default(null)->comment('สถานะใช้งาน\\r\\n');
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
