<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string("department_name",95)->nullable()->unique();
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });

        Schema::table("employees", function(Blueprint $table){
            $table->foreign('department_id')->references('id')->on('departments')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("employees", function(Blueprint $table){
            $table->dropForeign(["department_id"]);
        });

        Schema::dropIfExists('departments');
    }
}
