<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // use HasFactory;

    /**
     * the name attribute on the model should be "mass-assignable"
     *
     * @var array
     */
    protected $fillable = ['name'];
    
    /**
     * cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    /**
     * user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
