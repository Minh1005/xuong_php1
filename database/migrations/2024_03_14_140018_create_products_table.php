<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table ->id();
            $table ->foreignId(Category::class)->constrained()->index();
            $table ->string('name');
            $table ->string('sku')->unique();
            $table ->string('img_thumb')->nullable() ->comment('Ảnh nhỏ khi hiển thị ở danh sách ');
            $table ->string('overview')->nullable()->comment('Mô tả ngắn ');
            $table -> longText('content')->nullable()->comment('Nội dung');
            $table ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
