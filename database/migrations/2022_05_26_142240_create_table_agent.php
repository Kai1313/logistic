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
        Schema::create('agents', function (Blueprint $table) {
            $table->char('agent_id', 36);
            $table->char('agent_code', 36)->unique();
            $table->string('agent_name', 128);
            $table->tinyInteger('agent_type');
            $table->string('province', 128);
            $table->string('regency', 128);
            $table->string('district', 128)->nullable();
            $table->string('village', 128)->nullable();
            $table->text('agent_description')->nullable();
            $table->text('agent_address')->nullable();
            $table->char('agent_phone', 36);
            $table->string('agent_email', 128)->unique();
            $table->decimal('agent_deposit', $precision = 10, $scale = 2)->default(0);
            $table->integer('agent_status')->default(0);
            $table->char('created_by', 36)->nullable();
            $table->char('updated_by', 36)->nullable();
            $table->timestamps();
            $table->primary('agent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
};
