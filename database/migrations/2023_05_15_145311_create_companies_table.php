<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('title');
            $table->string('contact')->nullabnle();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('website')->nullable();
            $table->string('photo')->nullable();
            $table->integer('order_id')->default('0')->index();
            $table->tinyInteger('status')->default('1')->comment("1 for active 2 for inactive -1 for delete")->index();
            $table->integer('created_by');
            $table->timestamp('created_at')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
