<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonCollaborationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_collaboration', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('family');
            $table->string('parentName');
            $table->string('NationalCode');
            $table->string('DegreeName');
            $table->string('UniversityName');
            $table->string('state');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('phoneNumber');
            $table->text('workAddress');
            $table->string('workPhone');
            $table->text('ScientificRecords');
            $table->text('collaborationType');
            $table->text('description');
            $table->string('information')->nullable($value=true);
            $table->text('Rezume')->nullable($value=true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_collaboration');
    }
}
