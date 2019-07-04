<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChart Of Account1Table extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'CHART OF ACCOUNT1';

    /**
     * Run the migrations.
     * @table CHART OF ACCOUNT1
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->longText('f1')->nullable()->default(null);
            $table->longText('f2')->nullable()->default(null);
            $table->longText('f3')->nullable()->default(null);
            $table->longText('f4')->nullable()->default(null);
            $table->longText('f5')->nullable()->default(null);
            $table->longText('f6')->nullable()->default(null);
            $table->longText('f7')->nullable()->default(null);
            $table->longText('f8')->nullable()->default(null);
            $table->longText('f9')->nullable()->default(null);
            $table->longText('f10')->nullable()->default(null);
            $table->longText('f11')->nullable()->default(null);
            $table->longText('f12')->nullable()->default(null);
            $table->longText('f13')->nullable()->default(null);
            $table->longText('f14')->nullable()->default(null);
            $table->longText('f15')->nullable()->default(null);
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
