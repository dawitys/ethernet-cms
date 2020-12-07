<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'order'
    ];
    protected $with = [
        'page'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
