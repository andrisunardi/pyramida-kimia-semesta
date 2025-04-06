<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('name_id', 100)->unique();
            $table->string('name_zh', 100)->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->text('description_zh')->nullable();
            $table->text('location')->nullable();
            $table->text('location_id')->nullable();
            $table->text('location_zh')->nullable();
            $table->string('link', 100)->nullable();
            $table->boolean('is_active')->unsigned()->default(true);
            $table->foreignIdFor(User::class, 'created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignIdFor(User::class, 'updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignIdFor(User::class, 'deleted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
