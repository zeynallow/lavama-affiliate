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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->bigInteger('payout_period_id')->index()->unsigned();
            $table->boolean('is_sale_tracking');
            $table->string('sale_commission_type')->nullable();
            $table->float('sale_commission_value')->nullable();
            $table->boolean('is_click_tracking');
            $table->string('click_commission_type')->nullable();
            $table->float('click_commission_value')->nullable();
            $table->string('status');
            $table->bigInteger('owner_user_id')->index()->unsigned();
            $table->bigInteger('owner_vendor_id')->index()->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
