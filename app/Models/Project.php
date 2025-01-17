<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Project extends Model
{
    use HasFactory;
    use AsSource;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'image_path',
    ];
}
