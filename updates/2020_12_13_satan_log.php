<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SatanLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satan_log',function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('url','255')
                ->comment('访问url')
                ->nullable(false);
            $table->string('method',40)
                ->comment('访问类型')
                ->nullable(false);
            $table->string('param',500)
                ->nullable()
                ->comment('访问参数');
            $table->string('headers',500)
                ->nullable()
                ->comment('头部参数');
            $table->integer('user_id')
                ->comment('访问用户id')
                ->nullable(false);
            $table->string('created_at',255)
                ->comment('创建时间')
                ->nullable(false);
            $table->string('ip',50)
                ->comment('ip')
                ->nullable(false);
            $table->string('updated_at',255)
                ->comment('更新时间')
                ->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('satan_log');
    }
}
