<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moive extends Model
{
    use HasFactory;
    
    public $timestamps = true;
    
    protected $fillable = [
        'title',
        'poster',
        'intro',
        'release_date',
        'gene_id',
        
    ];

    public function Gene()
    {
        return $this->belongsTo(Gene::class);
    }
}
