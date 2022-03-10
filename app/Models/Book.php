<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 *
 * @property $id
 * @property $name
 * @property $author
 * @property $category_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Book extends Model
{
    
    static $rules = [
		'name' => 'required|regex:/^[\pL\s\-]+$/u',
		'author' => 'required|regex:/^[\pL\s\-]+$/u',
		'category_id' => 'required',
        'estatus_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 5;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','author','category_id','estatus_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookstat()
    {
        return $this->hasOne('App\Models\Bookstat', 'id', 'estatus_id');
    }
    

}
