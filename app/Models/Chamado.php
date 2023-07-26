<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    use SoftDeletes;

    protected $fillable = [
        // 'id_user',
        'solicitante',
        'analista',
        'previsao_entrega',
        'formFile',
        'prioridade',
        'status',
        'descricao',
        'andamento',
        'resolucao',
        'email_analista',
        'email_solicitante',
        'destinatario'
    ];

    protected $dates = ['deleted_at'];
}
