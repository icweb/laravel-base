<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHttpLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('http_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('actor_id')->nullable();
            $table->string('request_url')->nullable();
            $table->string('agent_environment')->nullable();
            $table->string('agent_browser')->nullable();
            $table->string('agent_device')->nullable();
            $table->string('agent_platform')->nullable();
            $table->string('agent_ip')->nullable();
            $table->string('agent_robot_name')->nullable();
            $table->string('agent_is_robot')->nullable();
            $table->string('agent_is_phone')->nullable();
            $table->string('agent_is_desktop')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('http_logs');
    }
}
