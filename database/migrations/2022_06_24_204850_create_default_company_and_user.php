<?php

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultCompanyAndUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $company = Company::create([
            "company_name" => "Salacsoft",
            "address"   => "Tarlac",
            "email" => "joseph@salacsoft.com",
            "contact_person" => "Joseph Salac",
            "contact_no" => "09165107824"
        ]);

        User::create([
            "email" => "joseph@salacsoft.com",
            "password" => "password",
            "name" => "Joseph Salac",
            "user_type" => "CEO",
            "company_id" => $company->id,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_company_and_user');
    }
}
