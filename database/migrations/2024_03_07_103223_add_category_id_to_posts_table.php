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
        Schema::table('posts', function (Blueprint $table) {
            // $table->unsignedBigInteger('category_id')->after('content')->nullable();
            // $table->foreign('category_id')
            //         ->references('id')
            //         ->on('categories')
            //         ->onDelete('set null')
            //         ->onUpdate('cascade');

            /*
                OPPURE
            */

            $table->foreignId('category_id')
                    ->after('content')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'category_id')) {
                // $table->dropForeign('posts_category_id_foreign');
                // OPPURE
                $table->dropForeign(['category_id']);

                $table->dropColumn('category_id');
            }
        });
    }
};
