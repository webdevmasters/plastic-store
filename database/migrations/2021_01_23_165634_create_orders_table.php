<?php

use App\Enums\OrderPayment;
use App\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('status')->default(OrderStatus::ORDERED);
            $table->string('payment')->default(OrderPayment::CASH_ON_DELIVERY);
            $table->unsignedInteger('total');
            $table->unsignedInteger('shipping')->default(0);
            $table->unsignedInteger('items');

            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('city');
            $table->string('country');
            $table->string('zip_code');
            $table->string('phone');
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders');
    }
}
