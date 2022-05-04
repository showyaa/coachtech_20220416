<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('status1')->nullable()->default('リード顧客');
            $table->string('status2')->nullable()->default('メール送信済');
            $table->string('status3')->nullable()->default('日程調整済');
            $table->string('status4')->nullable()->default('商談済');
            $table->string('status5')->nullable()->default('契約済');
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
        Schema::dropIfExists('new_statuses');
    }
}
