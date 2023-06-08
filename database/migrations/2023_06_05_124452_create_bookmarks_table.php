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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->longText('alt_names')->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->unsignedBigInteger('read_status_id')->default(1);
            $table->integer('current')->unsigned();
            $table->integer('latest')->unsigned();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');
            $table->foreign('read_status_id')->references('id')->on('read_statuses')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
