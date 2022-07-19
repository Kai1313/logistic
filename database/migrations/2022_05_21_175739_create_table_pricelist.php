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
        Schema::create('pricelists', function (Blueprint $table) {
            $table->char('pricelist_id', 36);
            $table->char('pricelist_code', 36)->unique();
            $table->string('province', 128)->nullable();
            $table->string('regency', 128)->nullable();
            $table->string('district', 128)->nullable();
            $table->string('village', 128)->nullable();
            $table->string('pricelist_destination', 128);
            $table->text('pricelist_note')->nullable();
            $table->char('pricelist_type', 36);
            $table->string('pricelist_destination_type', 128)->nullable();
            $table->decimal('pricelist_price', $precision = 10, $scale = 2)->default(0);
            $table->decimal('pricelist_price_cargo', $precision = 10, $scale = 2)->default(0);
            $table->decimal('pricelist_price_volume', $precision = 10, $scale = 2)->default(0);
            $table->decimal('pricelist_minimum_weight', $precision = 10, $scale = 2)->default(1);
            $table->decimal('pricelist_minimum_volume', $precision = 10, $scale = 2)->default(1);
            $table->integer('pricelist_minimum_duedate')->default(1);
            $table->integer('pricelist_maximum_duedate')->default(1);
            $table->integer('pricelist_status')->default(0);
            $table->char('created_by', 36)->nullable();
            $table->char('updated_by', 36)->nullable();
            $table->timestamps();
            $table->primary('pricelist_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricelists');
    }
};
