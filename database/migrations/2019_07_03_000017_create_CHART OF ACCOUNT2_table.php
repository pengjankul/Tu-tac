<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChart Of Account2Table extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'CHART OF ACCOUNT2';

    /**
     * Run the migrations.
     * @table CHART OF ACCOUNT2
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
