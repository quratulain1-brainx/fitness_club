<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->integer('id', true)->comment('Unique Record Id for system');
            $table->string('member_code', 50)->unique('member_id');
            $table->string('name', 50);
            $table->date('DOB');
            $table->string('email', 50)->unique('email');
            $table->string('address', 200);
            $table->boolean('status')->comment('0 for inactive , 1 for active');
            $table->char('gender', 50);
            $table->string('contact', 11)->unique('contact');
            $table->string('emergency_contact', 11);
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
