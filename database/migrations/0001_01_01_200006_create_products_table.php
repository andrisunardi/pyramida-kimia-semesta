<?php

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProductCategory::class)->constrained()->cascadeOnDelete();
            $table->string('name', 50)->unique();
            $table->text('description')->nullable();
            $table->string('image', 80)->nullable()->unique();
            $table->string('image_coa', 80)->nullable()->unique();
            $table->string('image_msds', 80)->nullable()->unique();
            $table->string('slug', 50)->unique();
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
        Schema::dropIfExists('products');
    }
};
