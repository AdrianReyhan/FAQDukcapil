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
        Schema::table('faq_questions', function (Blueprint $table) {
            $table->unsignedInteger('faq_category_id')->nullable()->after('id');

            // Tambahkan foreign key
            $table->foreign('faq_category_id')
                ->references('id')
                ->on('faq_categories')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faq_questions', function (Blueprint $table) {
            // Hapus foreign key
            $table->dropForeign(['faq_category_id']);

            // Hapus kolom faq_category_id
            $table->dropColumn('faq_category_id');
        });;
    }
};
