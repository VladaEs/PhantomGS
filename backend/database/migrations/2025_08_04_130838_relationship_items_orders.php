<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('shop_items')->onDelete('cascade');
        });
        Schema::table('shop_items_gallery', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('shop_items')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('gallery_images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);
            $table->dropForeign(['item_id']);
            $table->dropColumn('item_id');
        });

        Schema::table('shop_items_gallery', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
            $table->dropColumn(['item_id']);
            $table->dropForeign(['image_id']);
            $table->dropColumn('image_id');
        });
    }
};
