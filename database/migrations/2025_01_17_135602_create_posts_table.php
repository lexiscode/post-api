<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Post::getTableName(), static function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->foreignId('user_id')->constrained(User::getTableName());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Post::getTableName());
    }

};
