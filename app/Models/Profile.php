<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();

        return $results;

    }  

    /**
     * Get permission
     */

     public function permissions()
     {
        return $this->belongsToMany(Permission::class);
     }

     /**
      * Permission not linked with this profile
      */

     public function permissionsAvailable($filter =  null)
     {
        $permission = Permission::whereNotIn('id', function($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id = {$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
           if($filter)
            $queryFilter->where('name', 'LIKE', "%{$filter}%");    
        }) 
        ->paginate();

        return $permission;    

     }
}
