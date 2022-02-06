<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerGroupToMarketingCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('marketing_checkouts', function (Blueprint $table) {
           $table->string('customer_group', 25);
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('marketing_checkouts', function (Blueprint $table) {
           $table->dropColumn('customer_group');
       });
    }
}
