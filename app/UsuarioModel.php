<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    protected $fillable = ['nmusuario','cargo','login','senha', 'ativo', 'dtnascimento'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'tbl_usuarios';
}
