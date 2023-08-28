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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();

            $table->string('title',191);
            $table->string('slug',191);

            $table->string('description',191);

            $table->unsignedBigInteger('parent_id');

            $table->timestamps();
        });

        Schema::create('blog_category_blog_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('blog_post_id');
            $table->foreign('blog_post_id')->references('id')->on('blog_posts')->cascadeOnDelete();

            $table->unsignedBigInteger('blog_category_id');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->cascadeOnDelete();

            $table->primary(['blog_post_id', 'blog_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_category_blog_tag');
        Schema::dropIfExists('blog_categories');
    }
};
