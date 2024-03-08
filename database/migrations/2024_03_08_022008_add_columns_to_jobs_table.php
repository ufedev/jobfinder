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
        Schema::table('jobs', function (Blueprint $table) {
            //
            $table->string('title');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('salary_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->text('description');
            $table->date('last_day');
            $table->string('image');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('published')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            //  
            $table->dropForeign('jobs_salary_id_foreign');
            $table->dropForeign("jobs_category_id_foreign");
            $table->dropForeign('jobs_user_id_foreign');
            $table->dropColumn(['title', 'category_id', 'salary_id', 'company', 'description', 'last_day', 'image', 'user_id']);
        });
    }
};
