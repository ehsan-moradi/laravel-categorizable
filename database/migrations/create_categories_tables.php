<?php

declare(strict_types=1);

use Kalnoy\Nestedset\NestedSet;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTables extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index()->unique();
            $table->string('name_en');
            $table->string('slug')->index()->unique();
            $table->string('type')->default('default');
            $table->string('url')->nullable();
            $table->string('img')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->text('body')->nullable();
            NestedSet::columns($table);
            $table->timestamps();
        });

        Schema::create('categories_models', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->morphs('model');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('categories_models');
    }
}
