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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->default(1);

            $table->string('title')->unique();
            $table->string('excerpt')->nullable();
            $table->text('body')->nullable()->fulltext('posts_body_fulltext_index');

            $table->string('slug')->unique();
            $table->string('slug_old')->nullable();

            $table->enum('type', ['A', 'E', 'F', 'I', 'P', 'V', 'X']
            )->default('I')->comment('A->Audio, E->Ebook, F->Iframe, I->Image, P->PDF, S->PSD, V->Video, X->XLSX');

            $table->enum('status', ['P', 'D', 'T'])->default('D')->comment('P->Published, D->Draft, T->Trash');
            $table->enum('feature', ['Y', 'N'])->default('N')->comment('Y->Yes, N->No');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });


        /**
         * Table Pivot
         */
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('posts');
    }
};
