<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManifestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manifests', function (Blueprint $table) {
            $table->id('id');
            $table->integer('manifest_id');
            $table->integer('income');
            $table->integer('cost');
            $table->foreignId('car_id')->constrained('cars');
            $table->foreignId('driver_id')->constrained('drivers');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('route_id')->constrained('routes');
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
        Schema::dropIfExists('manifests');
    }
}
