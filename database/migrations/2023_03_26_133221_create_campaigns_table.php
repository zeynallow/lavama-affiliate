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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('program_id')->index()->unsigned();
            $table->datetime('start_datetime')->nullable();
            $table->datetime('end_datetime')->nullable();
            $table->string('name');
            $table->text('description');
            $table->string('name_for_publisher')->nullable();
            $table->string('cover')->nullable();
            $table->boolean('is_target_all')->default(1);
            $table->integer('cookie_lifetime')->default(30);
            $table->boolean('for_all_publishers')->default(1);
            $table->bigInteger('owner_user_id')->unsigned()->index();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
