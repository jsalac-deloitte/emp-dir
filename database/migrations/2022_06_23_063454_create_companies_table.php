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
            $table->id();
            $table->string("company_name")->nullable();
            $table->text("address")->nullable();
            $table->string("email")->nullable();
            $table->string("contact_person")->nullable();
            $table->string("contact_no")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table("users", function(Blueprint $table){
            $table->unsignedBigInteger("company_id");
            $table->foreign("company_id")->references("id")->on("companies")->onDelete("cascade");
        });

        Schema::table("employees", function(Blueprint $table){
            $table->foreign('company_id')->references('id')->on('companies')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function(Blueprint $table){
            $table->dropForeign(["company_id"]);
        });

        Schema::table("employees", function(Blueprint $table){
            $table->dropForeign(["company_id"]);
        });

        Schema::dropIfExists('companies');
    }
}
