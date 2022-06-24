<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableSmsLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_logs', function (Blueprint $table) {
            $table->text("message")->after("id")->nullable();
            $table->text("payload")->after("message")->nullable();
            $table->text("remarks")->after("payload")->nullable();
            $table->text("api_response")->after("remarks")->nullable();
            $table->boolean("error")->nullable();
            $table->dropColumn("mobile_no");
            $table->dropColumn("info");
            $table->dropColumn("sender_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_logs', function (Blueprint $table) {
            $table->dropColumn("payload");
            $table->dropColumn("message");
            $table->dropColumn("remarks");
            $table->dropColumn("api_response");
            $table->dropColumn("error");
            $table->string("mobile_no", 15);
            $table->text("info")->nullable();
            $table->unsignedBigInteger("sender_id")->nullable();
        });
    }
}
