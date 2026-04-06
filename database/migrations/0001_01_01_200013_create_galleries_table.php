<?php

use App\Models\GalleryCategory;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(GalleryCategory::class)->constrained()->cascadeOnDelete();
            $table->string('name', 100);
            $table->string('name_id', 100);
            $table->string('name_zh', 100);
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->text('description_zh')->nullable();
            $table->string('image', 130)->nullable();
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
        Schema::dropIfExists('galleries');
    }
};
