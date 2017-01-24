<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateAttributeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('attribute_id');
            $table->string('locale', 255);
            $table->string('title', 255);
            $table->text('description');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('update_by');
            $table->timestamps();

            $table->unique(['attribute_id', 'locale'], 'attribute_translations_attribute_id_locale_unique');
            $table->index('locale', 'attribute_translations_locale_index');

            $table->foreign('attribute_id', 'attribute_translations_attribute_id_foreign')->references('id')->on('attributes')->onDelete('CASCADE
')->onUpdate('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_translations');
    }
}