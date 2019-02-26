<?php
/* Migrations generated by: Skipper (http://www.skipper18.com) */
/* Migration id: 3219b347-580b-4802-b075-dfb724bae04d */
/* Migration datetime: 2019-02-25 12:27:56.051529 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migrations20190225122756 extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
  */
  public function up()
  {
    Schema::create('part_movements', function (Blueprint $table) {
      $table->uuid('id')->unique();
      $table->integer('qty');
      $table->timestamp('movement_at')->useCurrent();
      $table->uuid('part_id')->nullable(true);
      $table->text('part_name')->nullable(true);
    });
    Schema::create('part_mvmnt_froms', function (Blueprint $table) {
      $table->uuid('id')->unique();
      $table->uuid('partMovement_id')->unique();
      $table->uuid('location_id')->nullable(true);
      $table->char('sublocation_type', 250);
      $table->uuid('sublocation_id')->nullable(true);
    });
    Schema::create('part_mvmnt_tos', function (Blueprint $table) {
      $table->uuid('id')->unique();
      $table->uuid('partMovement_id')->unique();
      $table->uuid('location_id')->nullable(true);
      $table->char('sublocation_type', 250);
      $table->uuid('sublocation_id')->nullable(true);
    });
    Schema::table('part_movements', function (Blueprint $table) {
      $table->foreign('part_id')->references('id')->on('parts');
    });
    Schema::table('part_mvmnt_froms', function (Blueprint $table) {
      $table->foreign('partMovement_id')->references('id')->on('part_movements');
    });
    Schema::table('part_mvmnt_froms', function (Blueprint $table) {
      $table->foreign('location_id')->references('id')->on('locations');
    });
    Schema::table('part_mvmnt_tos', function (Blueprint $table) {
      $table->foreign('partMovement_id')->references('id')->on('part_movements');
    });
    Schema::table('part_mvmnt_tos', function (Blueprint $table) {
      $table->foreign('location_id')->references('id')->on('locations');
    });
  }
  /**
   * Reverse the migrations.
   *
   * @return void
  */
  public function down()
  {
    Schema::table('part_mvmnt_tos', function (Blueprint $table) {
      $table->dropForeign('location_id');
    });
    Schema::table('part_mvmnt_tos', function (Blueprint $table) {
      $table->dropForeign('partMovement_id');
    });
    Schema::table('part_mvmnt_froms', function (Blueprint $table) {
      $table->dropForeign('location_id');
    });
    Schema::table('part_mvmnt_froms', function (Blueprint $table) {
      $table->dropForeign('partMovement_id');
    });
    Schema::table('part_movements', function (Blueprint $table) {
      $table->dropForeign('part_id');
    });
    Schema::dropIfExists('part_mvmnt_tos');
    Schema::dropIfExists('part_mvmnt_froms');
    Schema::dropIfExists('part_movements');
  }
}
