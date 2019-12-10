<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstoqueModel extends Model
{
    protected $fillable = ['nmingrediente','tipo','quantidade_total_ml','validade', 'vrunitario', 'fk_drink'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'tbl_ingredientes';
}
