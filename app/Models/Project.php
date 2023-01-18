<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    public static function generate_slug($string){
        $slug = Str::slug($string, '-');

        $original_slug = $slug;
        $counter = 1;
        $slug_exists = Project::where('slug', $slug)->first();
        while($slug_exists){
            $slug = $original_slug . '-' . $counter;
            $slug_exists = Project::where('slug', $slug)->first();
            $counter++;
        }
        return $slug;
    }
}