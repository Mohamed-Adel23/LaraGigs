<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    // Fillable Property To Allow Mass Assignment
    // protected $fillable = ['title', 'company', 'tags', 'description', 'website', 'email', 'location'];

    // Filter All Gigs
    public function scopeFilter($query, array $filters) {
        // dd($filters['search']);
        if($filters['tag'] ?? false) {
            $query->where('tags', 'LIKE', '%' . $filters['tag'] . '%');
        }
        else if($filters['search'] ?? false) {
            $query->where('tags', 'LIKE', '%' . $filters['search'] . '%')
            ->orWhere('title', 'LIKE', '%' . $filters['search'] . '%')
            ->orWhere('description', 'LIKE', '%' . $filters['search'] . '%');
        }
    }
}