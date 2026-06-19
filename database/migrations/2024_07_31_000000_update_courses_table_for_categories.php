<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Add the new foreign key. It's nullable for now to avoid issues with existing data.
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');

            // We will remove the old column in a separate step after migrating data.
            // For now, we keep it to avoid breaking the app immediately.
            // $table->dropColumn('category');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
