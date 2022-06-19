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
        Schema::create('deposits', function (Blueprint $table) {
            $table->char('deposit_id', 36);
            $table->char('deposit_code', 36);
            $table->char('agent_id', 36);
            $table->text('deposit_proof')->nullable();
            $table->decimal('deposit_amount', $precision = 10, $scale = 2)->default(0);
            $table->text('deposit_note')->nullable();
            $table->integer('deposit_status')->default(0);
            $table->char('created_by', 36)->nullable();
            $table->char('modified_by', 36)->nullable();
            $table->timestamps();
            $table->primary('deposit_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
};
