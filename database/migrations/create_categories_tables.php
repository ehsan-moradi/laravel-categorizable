<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;

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
            $table->tinyInteger('status')->default(1);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->text('body')->nullable();
            NestedSet::columns($table);
            $table->timestamps();
        });

        Schema::create('categories_models', function (Blueprint $table) {
            $table->integer('category_id');
            $table->morphs('model');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('categories_models');
    }
}
