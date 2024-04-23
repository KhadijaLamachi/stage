<?php

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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
            // $table->foreign('utilisateur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
            // $table->unsignedBigInteger('utilisateur_id');
            // $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');    
            $table->foreignId('evenement_id')->constrained('evenements');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
