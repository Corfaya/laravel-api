<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public static function generateSlug($title) {
        return Str::slug($title, '-');
    }

    // 1 to m con tabella projects
    public function projects() {
        return $this->hasMany(Project::class);
    }
}
