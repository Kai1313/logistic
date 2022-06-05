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
        Schema::create('airwaybills', function (Blueprint $table) {
            $table->char('awb_id', 36);
            $table->char('awb_code', 36)->unique();
            $table->char('agent_id', 36)->nullable();
            $table->char('pricelist_id', 36);
            $table->char('promo_code', 36)->nullable();
            $table->integer('payment_method');
            $table->integer('acceptance_method');
            $table->text('description');
            $table->text('special_instruction')->nullable();
            $table->decimal('awb_weight', $precision = 10, $scale = 2)->default(0);
            $table->decimal('awb_length', $precision = 10, $scale = 2)->default(0);
            $table->decimal('awb_width', $precision = 10, $scale = 2)->default(0);
            $table->decimal('awb_height', $precision = 10, $scale = 2)->default(0);
            $table->decimal('awb_volume', $precision = 10, $scale = 2)->default(0);
            $table->integer('awb_packaging')->default(0);
            $table->integer('awb_weight_type')->default(0);
            $table->decimal('awb_cost', $precision = 10, $scale = 2)->default(0);
            $table->decimal('awb_packaging_cost', $precision = 10, $scale = 2)->default(0);
            $table->decimal('awb_additional_cost', $precision = 10, $scale = 2)->default(0);
            $table->decimal('awb_insurance_cost', $precision = 10, $scale = 2)->default(0);
            $table->decimal('awb_discount', $precision = 10, $scale = 2)->default(0);
            $table->decimal('awb_total_cost', $precision = 10, $scale = 2)->default(0);
            $table->text('origin_name');
            $table->text('origin_description');
            $table->text('origin_contact');
            $table->text('destination_name');
            $table->text('destination_description');
            $table->text('destination_contact');
            $table->text('alias_name')->nullable();
            $table->text('alias_description')->nullable();
            $table->text('alias_contact')->nullable();
            $table->integer('awb_status')->default(0);
            $table->char('created_by', 36)->nullable();
            $table->char('updated_by', 36)->nullable();
            $table->timestamps();
            $table->primary('awb_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airwaybills');
    }
};
