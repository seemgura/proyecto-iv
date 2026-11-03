
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 120);
            $table->string('correo', 255);
            $table->string('asunto', 120);
            $table->text('mensaje');

            $table->boolean('leido')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
