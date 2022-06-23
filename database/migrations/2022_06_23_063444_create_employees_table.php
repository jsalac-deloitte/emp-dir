<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("emp_code", 20)->nullable();
            $table->string("first_name",70)->nullable();
            $table->string("last_name",70)->nullable();
            $table->string("middle_name",70)->nullable();
            $table->string("position",70)->nullable();
            $table->unsignedBigInteger("company_id")->nullable();
            $table->unsignedBigInteger("department_id")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
