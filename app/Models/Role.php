<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    
    public static function getDefaultPermissions()
    {
        return ['admin', 'user'];
    }

    public static function createDefaultPermissions()
    {
        $defaultPermissions = Role::getDefaultPermissions();
        
        foreach ($defaultPermissions as $permission) {
            Role::create([
                'name' => $permission,
            ]);
        }
    }

    public static function getLowestRole(){
        return Role::where('name', 'user')->first();
    }

}
