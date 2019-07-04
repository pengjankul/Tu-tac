<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountChartTmpTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'account_chart_tmp';

    /**
     * Run the migrations.
     * @table account_chart_tmp
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('AccChartID');
            $table->integer('AccChartParentrtID')->nullable()->default(null);
            $table->integer('AccGroupID');
            $table->longText('AccChartNumber');
            $table->longText('NameTh')->nullable()->default(null);
            $table->longText('NameEn')->nullable()->default(null);
            $table->longText('Detail')->nullable()->default(null);
            $table->longText('Type')->nullable()->default(null);
            $table->longText('ChartType')->nullable()->default(null);
            $table->longText('Format')->nullable()->default(null);
            $table->binary('DateTimeAdd');
            $table->integer('UserAdd');
            $table->binary('DateTimeUpdate');
            $table->integer('UserUpdate');
            $table->longText('Allow')->nullable()->default(null);
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
