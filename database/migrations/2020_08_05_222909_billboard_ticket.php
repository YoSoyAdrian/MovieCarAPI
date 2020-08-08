<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BillboardTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('billboard_ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('billboard_id');
            $table->unsignedInteger('ticket_id');
            $table->timestamps();
            $table->foreign('billboard_id')->references('id')->on('billboards');
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //
        Schema::table(
            'billboard_ticket',
            function (Blueprint $table) {
                $table->dropForeign('billboard_ticket_billboard_id_foreing');
                $table->dropForeign('billboard_ticket_ticket_id_foreing');
            }
        );
        Schema::dropIfExists('billboard_ticket');
    }
}
