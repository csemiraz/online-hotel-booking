<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('about_heading');
            $table->text('about_content');
            $table->tinyInteger('about_status');
            $table->string('terms_heading');
            $table->text('terms_content');
            $table->tinyInteger('terms_status');
            $table->string('privacy_heading');
            $table->text('privacy_content');
            $table->tinyInteger('privacy_status');
            $table->string('disclaimer_heading');
            $table->text('disclaimer_content');
            $table->tinyInteger('disclaimer_status');
            $table->string('contact_heading');
            $table->text('contact_map')->nullable();
            $table->tinyInteger('contact_status');
            $table->string('photo_gallery_heading');
            $table->tinyInteger('photo_gallery_status');
            $table->string('video_gallery_heading');
            $table->tinyInteger('video_gallery_status');
            $table->string('faq_heading');
            $table->tinyInteger('faq_status');
            $table->string('cart_heading');
            $table->tinyInteger('cart_status');
            $table->string('checkout_heading');
            $table->tinyInteger('checkout_status');
            $table->string('payment_heading');
            $table->string('signup_heading');
            $table->tinyInteger('signup_status');
            $table->string('signin_heading');
            $table->tinyInteger('signin_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
