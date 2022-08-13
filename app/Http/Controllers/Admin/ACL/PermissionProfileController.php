<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{

    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission )
    {
        $this->profile = $profile;
        $this->permission = $permission;

    }

    public function permission($idProfile)
    {
        $profiles= $this->profile->find($idProfile);
        if (!$profiles){
            return redirect()->back();
        }

        $permissions = $profiles->permissions()->paginate();

            return view('admin.pages.profiles.permissions.permissions', 
            compact('profiles', 'permissions'));
    }

    public function permissionsAvailable(Request $request, $idProfile)
    {
        
       
        if (!$profiles= $this->profile->find($idProfile)){
            return redirect()->back();
        }

        $filters = $request->except('_token');
 

        $permissions= $profiles->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', compact('profiles', 'permissions', 'filters'));
         
       
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        
        
            if (!$profiles= $this->profile->find($idProfile))
            {
                return redirect()->back();
            }

        if (!$request->permission || count( $request->permission) == 0 )  
        {
            return redirect()
                    ->back()
                    ->with('info', "Precisa escolher pelo menos uma permissão");
        }

        $profiles->permissions()->attach($request->permission);

        return redirect()->route('profiles.permissions', $profiles->id);   
         
       
    }
public function detachPermissionsProfile( $idProfile, $idPermission)
    {
        $profiles= $this->profile->find($idProfile);
        $permissions= $this->permission->find($idPermission);

        if(!$profiles || !$permissions) {
            return redirect()->back();
        }

        $profiles->permissions()->detach($permissions);
      
        return redirect()->route('profiles.permissions', $profiles->id);  
    }

    

}
