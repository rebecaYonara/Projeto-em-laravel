<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrinksModel extends Model
{
    protected $fillable = ['nmdrink','vrdrink','qtd_ml_principal','qtd_ml_adicional', 'fk_ingrediente_principal', 'fk_ingrediente_adicional'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'tbl_drinks';
}
