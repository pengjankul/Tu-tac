<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearcherTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'researcher';

    /**
     * Run the migrations.
     * @table researcher
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('userid')->comment('ไอดีนักวิจัย\\r\\n');
            $table->string('rescode', 10)->comment('รหัสนักวิจัย');
            $table->string('nameth', 50)->comment('ชื่อภาษาไทย');
            $table->string('nameen', 50)->nullable()->default(null)->comment('ชื่อภาษาอังกฤษ');
            $table->integer('cardid')->nullable()->default(null)->comment('รหัสบัตรประชาชน');
            $table->date('birthdate')->nullable()->default(null)->comment('วันเดือนปีเกิด');
            $table->text('addr_psonth')->nullable()->default(null)->comment('ที่อยู่ หมู่บ้าน อาคาร ภาษาไทย');
            $table->text('addr_psonen')->nullable()->default(null)->comment('ที่อยู่ หมู่บ้าน อาคาร ภาษาอังกฤษ');
            $table->text('addr_offth')->comment('ที่อยู่ ที่ทำงาน ภาษาไทย');
            $table->text('addr_offen')->nullable()->default(null)->comment('ที่อยู่ ที่ทำงาน ภาษาอังกฤษ');
            $table->string('addr_msg_nameth', 50)->nullable()->default(null)->comment('ชื่อสำหรับการจัดส่ง ภาษาไทย');
            $table->string('addr_msg_nameen', 50)->nullable()->default(null)->comment('ชื่อสำหรับการจัดส่ง ภาษาอังกฤษ');
            $table->text('addr_msgth')->nullable()->default(null)->comment('ที่อยู่จัดส่ง ภาษาไทย');
            $table->text('addr_msgen')->nullable()->default(null)->comment('ที่อยู่จัดส่ง ภาษาอังกฤษ');
            $table->string('sexcode', 3)->nullable()->default(null)->comment('เพศ');
            $table->string('phoneno', 15)->nullable()->default(null)->comment('เบอร์โทรศัพท์');
            $table->string('mbileno', 15)->nullable()->default(null)->comment('เบอร์โทรศัพท์มือถือ');
            $table->string('faxcode', 15)->nullable()->default(null)->comment('ที่อยู่แฟกซ์');
            $table->string('positionth', 100)->nullable()->default(null)->comment('ตำแหน่งภาษาไทย');
            $table->string('positionen', 100)->nullable()->default(null)->comment('ตำแหน่งภาษาอังกฤษ');
            $table->string('email_addr', 50)->nullable()->default(null)->comment('อีเมล');
            $table->enum('restype', ['0', '1'])->nullable()->default(null)->comment('ประเภทนักวิจัย "(\'นิติบุคคล\',\\r\\n \'บุคคลธรรมดา\')"');
            $table->string('postcode', 5)->comment('รหัสไปรษณีย์');
            $table->dateTime('datetime_add')->comment('วันเวลาเพิ่ม');
            $table->integer('user_add')->comment('ผู้เพิ่ม');
            $table->dateTime('datetime_update')->comment('วันเวลาแก้ไข');
            $table->integer('user_update')->comment('ผู้แก้ไข');
            $table->dateTime('tsdatetime_update')->comment('วันเวลาดึงข้อมูล');
            $table->integer('tsuser_update')->comment('ผู้ดึงข้อมูล');
            $table->integer('orgid')->nullable()->default(null)->comment('คณะที่สังกัด');
            $table->string('orgname', 100)->nullable()->default(null)->comment('ชื่อคณะ');
            $table->enum('fag_allow', ['ปกติ', 'ระงับ', 'ลบ/บล็อก'])->nullable()->default('ปกติ')->comment('\'สถานะใช้งาน\'');
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
