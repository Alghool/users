<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = ['name'];

    public static $validationRoles = [
        'name' => 'required|string|max:255'
    ];


    public static function default(){
        return self::firstWhere('is_default',1);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class)->withPivot(
            'value',
            'read_only'
        )->withTimestamps();
    }

}
