<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_code', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('discount_code', 50);
            $table->string('description', 255)->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->timestamp('duration')->nullable();
            $table->bigInteger('total_code')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('del_flag')->default(0);
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
        Schema::dropIfExists('coupon_code');
    }
};
