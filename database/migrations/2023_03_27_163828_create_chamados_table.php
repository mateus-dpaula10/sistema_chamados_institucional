<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->Increments('id');
            // $table->string('id_user')->nullable()->default(NULL);
            $table->string('solicitante')->nullable()->default(NULL);
            $table->string('email_solicitante')->nullable()->default(NULL);
            $table->string('analista')->nullable()->default(NULL);
            $table->string('email_analista')->nullable()->default(NULL);
            $table->datetime('previsao_entrega')->nullable()->default(NULL);
            $table->string('formFile')->nullable()->default(NULL);
            $table->string('prioridade')->nullable()->default(NULL);
            $table->string('status')->nullable()->default(NULL);
            $table->string('descricao')->nullable()->default(NULL);
            $table->string('andamento')->nullable()->default(NULL);
            $table->string('resolucao')->nullable()->default(NULL);
            $table->softDeletes();
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
        Schema::dropIfExists('chamados');
    }
}
