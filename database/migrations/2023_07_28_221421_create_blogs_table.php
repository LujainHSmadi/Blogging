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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->bigInteger('category_id')->constrained('categories')->onDelete('cascade');
            $table->bigInteger('user_id')->constrained('users')->onDelete('cascade');
            $table->tinyInteger('status')->default(1)->comment="1=>Active, 2=>Inactive";
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_logs');
    }
};
