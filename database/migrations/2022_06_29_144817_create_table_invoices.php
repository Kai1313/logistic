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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('invoice_id');
            $table->char('invoice_code', 36)->unique();
            $table->char('awb_id', 36);
            $table->date('invoice_date');
            $table->text('invoice_information');
            $table->decimal('invoice_amount', $precision = 10, $scale = 2)->default(0);
            $table->decimal('invoice_tax', $precision = 10, $scale = 2)->default(0);
            $table->decimal('invoice_total', $precision = 10, $scale = 2)->default(0);
            $table->integer('invoice_status')->default(0);
            $table->char('created_by', 36)->nullable();
            $table->char('modified_by', 36)->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
