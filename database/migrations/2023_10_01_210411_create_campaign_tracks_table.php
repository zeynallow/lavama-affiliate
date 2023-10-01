<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaign_tracks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('campaign_parnter_id')->index()->unsigned();
            $table->text('user_agent')->nullable();
            $table->string('user_ip');
            $table->boolean('is_click')->default(0);
            $table->string('is_sale')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_tracks');
    }
};
