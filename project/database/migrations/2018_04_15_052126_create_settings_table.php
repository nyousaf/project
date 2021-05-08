<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('w_title')->nullable();
            $table->string('w_name')->nullable();
            $table->string('w_email')->nullable();
            $table->string('w_address')->nullable();
            $table->string('w_phone')->nullable();
            $table->string('w_time')->nullable();
            $table->string('keywords')->nullable();
            $table->string('f_title2')->nullable();
            $table->string('f_title3')->nullable();
            $table->string('f_title4')->nullable();
            $table->boolean('footer_layout')->default(0);
            $table->string('preloader')->nullable();
            $table->string('footer_logo')->nullable();
            $table->boolean('is_preloader')->default(1);
            $table->boolean('is_gotop')->default(1);
            $table->boolean('right_click')->default(0);
            $table->boolean('inspect')->default(0);
            $table->text('desc')->nullable();
            $table->text('footer_text')->nullable();
            $table->string('copyright')->nullable();
            $table->string('google_id')->nullable();
            $table->string('fb_pixel')->nullable();
            $table->boolean('is_mailchimp')->default(1);
            $table->boolean('is_app_icon')->default(1);
            $table->boolean('is_playstore')->default(1);
            $table->boolean('is_category')->default(1);
            $table->boolean('sidebar_left')->default(1);
            $table->string('app_link')->nullable();
            $table->string('playstore_link')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
