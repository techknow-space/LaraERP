<?php
/* Migrations generated by: Skipper (http://www.skipper18.com) */
/* Migration id: 05338172-cbce-4d77-966a-21c62a799022 */
/* Migration datetime: 2019-02-26 07:47:27.310298 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migrations20190226074727 extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
  */
  public function up()
  {
    Schema::table('purchase_order_items', function (Blueprint $table) {
      $table->float('total_cost')->nullable(true)->virtualAs('qty * cost');
    });
    Schema::table('purchase_order_items', function (Blueprint $table) {
      $table->float('actual_cost')->nullable(true)->virtualAs('qty_received * cost');
    });
  }
  /**
   * Reverse the migrations.
   *
   * @return void
  */
  public function down()
  {
    Schema::table('purchase_order_items', function (Blueprint $table) {
      $table->dropColumn('actual_cost');
    });
    Schema::table('purchase_order_items', function (Blueprint $table) {
      $table->dropColumn('total_cost');
    });
  }
}
