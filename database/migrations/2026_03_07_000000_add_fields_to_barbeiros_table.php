<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barbeiros', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('telefone');
            $table->string('especialidade')->nullable()->after('foto');
            $table->text('bio')->nullable()->after('especialidade');
            $table->string('instagram')->nullable()->after('bio');
            $table->string('facebook')->nullable()->after('instagram');
            $table->integer('anos_experiencia')->nullable()->default(0)->after('facebook');
            $table->boolean('ativo')->default(true)->after('anos_experiencia');
        });
    }

    public function down(): void
    {
        Schema::table('barbeiros', function (Blueprint $table) {
            $table->dropColumn([
                'foto',
                'especialidade',
                'bio',
                'instagram',
                'facebook',
                'anos_experiencia',
                'ativo',
            ]);
        });
    }
};

