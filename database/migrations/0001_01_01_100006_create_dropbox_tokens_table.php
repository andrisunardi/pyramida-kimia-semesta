<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropboxTokensTable extends Migration
{
    public function up()
    {
        Schema::create('dropbox_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('email')->nullable();
            $table->text('access_token');
            $table->text('refresh_token')->nullable();
            $table->datetime('expires_in');
            $table->string('token_type')->nullable();
            $table->string('uid');
            $table->string('account_id');
            $table->text('scope');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dropbox_tokens');
    }
}
