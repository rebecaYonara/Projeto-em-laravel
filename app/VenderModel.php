<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenderModel extends Model
{
    protected $fillable = ['vrtotal', 'quantidade', 'vrunit','fk_usuario','fk_drink'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'tbl_vendas';
}
