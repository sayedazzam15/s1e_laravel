<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * register(name,email,password,image) insert user into database and upload user file 
     * login (email,password)  log user in (hint: session) 
     * logout (hint: destroy session) 
     * profile if this page called without login it must redirect to login page else show logged in user data
     */
    public function up(): void
    {
        Schema::table('musician', function (Blueprint $table) {
            $table->boolean('top_producer')->default(0)->after('name')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('musician', function (Blueprint $table) {
            //
        });
    }
};
