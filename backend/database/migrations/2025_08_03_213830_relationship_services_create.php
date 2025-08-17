<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * 
     */
    public function up(): void
    {
        //foreign keys for tables related to services

        Schema::table('service_gallery', function(Blueprint $table){
            $table->foreign('service_id')->references('id')->on("services")->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on("gallery_images")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_gallery', function (Blueprint $table) {
            
            $table->dropForeign(['image_id']);
            $table->dropColumn(['image_id']);
            $table->dropForeign(['service_id']);
            $table->dropColumn('service_id');
        });
    }
};
