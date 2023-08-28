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
        Schema::create('blog_tags', function (Blueprint $table) {
            $table->id();

            $table->string('title',191);

            $table->string('slug',191);

            $table->string('meta_title',191);

            $table->timestamps();
        });

        Schema::create('blog_post_blog_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('blog_post_id');
            $table->foreign('blog_post_id')->references('id')->on('blog_posts')->cascadeOnDelete();

            $table->unsignedBigInteger('blog_tag_id');
            $table->foreign('blog_tag_id')->references('id')->on('blog_tags')->cascadeOnDelete();

            $table->primary(['blog_post_id', 'blog_tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_post_blog_tag');
        Schema::dropIfExists('blog_tags');
    }
};
