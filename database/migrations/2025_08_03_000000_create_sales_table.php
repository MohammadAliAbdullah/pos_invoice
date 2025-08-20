<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('total_amount', 10, 2);
            $table->date('sale_date');
            $table->softDeletes();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
