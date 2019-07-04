<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookBranchTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'book_branch';

    /**
     * Run the migrations.
     * @table book_branch
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('BankBranchID')->comment('ไอดีสาขาธนาคาร\\r\\n');
            $table->string('Name', 50)->nullable()->default(null)->comment('ชื่อสาขา\\r\\n');
            $table->string('Note', 50)->nullable()->default(null)->comment('หมายเหตุ\\r\\n');
            $table->text('Address')->nullable()->default(null)->comment('ที่อยู่ หมู่บ้าน อาคาร\\r\\n');
            $table->string('PostCodeID', 5)->nullable()->default(null)->comment('รหัสไปรษณีย์\\r\\n');
            $table->dateTime('DateTimeAdd')->comment('วันเวลาเพิ่ม\\r\\n');
            $table->integer('UserAdd')->comment('ผู้เพิ่ม\\r\\n');
            $table->dateTime('DateTimeUpdate')->comment('วันเวลาแก้ไข\\r\\n');
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
