<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAudit extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $fillable = ['stockanterior','id_articulo','articulo','stockactual','codigo','usuario'];
}
