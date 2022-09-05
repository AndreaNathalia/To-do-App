<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'completed'
    ];
    

    public function users(){
    return $this->belongsToMany('App\Models\User', 'users_todo', 'todo_id', 'user_id');
    //RelatedModel, pivot_table, foreign_key (current model), foreign_key (next model)

    }
}
