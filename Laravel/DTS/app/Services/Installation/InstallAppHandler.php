<?php

namespace App\Services\Installation;

use App\Entities\Permission;
use App\Entities\Role;
use App\Entities\User;
use App\Services\Installation\Events\ApplicationWasInstalled;
use Closure;
use Illuminate\Validation\ValidationException;

/**
 * Class InstallAppHandler.
 */
class InstallAppHandler
{
    /**
     * @var array|\Illuminate\Support\Collection
     */
    public $roles = [
        ['name' => 'Administrator'],
    ];

    /**
     * @var array|\Illuminate\Support\Collection
     */
    public $permissions = [
        'users' => [
            ['name' => 'List users'],
            ['name' => 'Create users'],
            ['name' => 'Delete users'],
            ['name' => 'Update users'],
        ],

        'profiles' => [
            ['name' => 'List profile'],
            ['name' => 'Create profile'],
            ['name' => 'Delete profile'],
            ['name' => 'Update profile'],
        ],

        'roles' => [
            ['name' => 'List roles'],
            ['name' => 'Create roles'],
            ['name' => 'Delete roles'],
            ['name' => 'Update roles'],
        ],
        'permissions' => [
            ['name' => 'List permissions'],
        ],
      
       'user_profiles' => [
            ['name' => 'List user profiles'],
            ['name' => 'Create user profiles'],
            ['name' => 'Delete user profiles'],
            ['name' => 'Update user profiles'],
        ],
      
        'config_status' =>
        [
            ['name' => 'List config status'],
            ['name' => 'Create config status'],
            ['name' => 'Delete config status'],
            ['name' => 'Update config status'],
        ],

        'config_symptom' =>
        [
            ['name' => 'List config symptom'],
            ['name' => 'Create config symptom'],
            ['name' => 'Delete config symptom'],
            ['name' => 'Update config symptom'],
        ],

        'config_playing_position' =>
        [
            ['name' => 'List config playing position'],
            ['name' => 'Create config playing position'],
            ['name' => 'Delete config playing position'],
            ['name' => 'Update config playing position'],
        ],

        'config_skill' =>
        [
            ['name' => 'List config skill'],
            ['name' => 'Create config skill'],
            ['name' => 'Delete config skill'],
            ['name' => 'Update config skill'],
        ],

        'config_level' =>
        [
            ['name' => 'List config level'],
            ['name' => 'Create config level'],
            ['name' => 'Delete config level'],
            ['name' => 'Update config level'],
        ],

        'config_challenge_level' =>
        [
            ['name' => 'List config challenge level'],
            ['name' => 'Create config challenge level'],
            ['name' => 'Delete config challenge level'],
            ['name' => 'Update config challenge level'],
        ],

        'config_mission_type' =>
        [
            ['name' => 'List config mission type'],
            ['name' => 'Create config mission type'],
            ['name' => 'Delete config mission type'],
            ['name' => 'Update config mission type'],
        ],
        'config_age_group' =>
        [
            ['name' => 'List config age group'],
            ['name' => 'Create config age group'],
            ['name' => 'Delete config age group'],
            ['name' => 'Update config age group'],
        ],

        'config_stage' =>
        [
            ['name' => 'List config stage'],
            ['name' => 'Create config stage'],
            ['name' => 'Delete config stage'],
            ['name' => 'Update config stage'],
        ],


       
        'config_payment_status' =>
        [
            ['name' => 'List config payment status'],
            ['name' => 'Create config payment status'],
            ['name' => 'Delete config payment status'],
            ['name' => 'Update config payment status'],
        ],

        'config_challenge_status' =>
        [
            ['name' => 'List config challenge status'],
            ['name' => 'Create config challenge status'],
            ['name' => 'Delete config challenge status'],
            ['name' => 'Update config challenge status'],
        ],

        'config_mission_status' =>
        [
            ['name' => 'List config mission status'],
            ['name' => 'Create config mission status'],
            ['name' => 'Delete config mission status'],
            ['name' => 'Update config mission status'],
        ],

        'config_order_status' =>
        [
            ['name' => 'List config order status'],
            ['name' => 'Create config order status'],
            ['name' => 'Delete config order status'],
            ['name' => 'Update config order status'],
        ],

        
        'config_payment_mode' =>
        [
            ['name' => 'List config payment mode'],
            ['name' => 'Create config payment mode'],
            ['name' => 'Delete config payment mode'],
            ['name' => 'Update config payment mode'],
        ],

        'club' =>
        [
            ['name' => 'List club'],
            ['name' => 'Create club'],
            ['name' => 'Delete club'],
            ['name' => 'Update club'],
        ],

        'news' =>
        [
            ['name' => 'List news'],
            ['name' => 'Create news'],
            ['name' => 'Delete news'],
            ['name' => 'Update news'],
        ],

        'top_play' =>
        [
            ['name' => 'List top play'],
            ['name' => 'Create top play'],
            ['name' => 'Delete top play'],
            ['name' => 'Update top play'],
        ],

        'skill' =>
        [
            ['name' => 'List skill'],
            ['name' => 'Create skill'],
            ['name' => 'Delete skill'],
            ['name' => 'Update skill'],
        ],

        'challenge' =>
        [
            ['name' => 'List challenge'],
            ['name' => 'Create challenge'],
            ['name' => 'Delete challenge'],
            ['name' => 'Update challenge'],
        ],

        'order' =>
        [
            ['name' => 'List order'],
            ['name' => 'Create order'],
            ['name' => 'Delete order'],
            ['name' => 'Update order'],
        ],

        'challenge_payment' =>
        [
            ['name' => 'List challenge payment'],
            ['name' => 'Create challenge payment'],
            ['name' => 'Delete challenge payment'],
            ['name' => 'Update challenge payment'],
        ],



        'mission' =>
        [
            ['name' => 'List mission'],
            ['name' => 'Create mission'],
            ['name' => 'Delete mission'],
            ['name' => 'Update mission'],
        ],

        'mission_payment' =>
        [
            ['name' => 'List mission payment'],
            ['name' => 'Create mission payment'],
            ['name' => 'Delete mission payment'],
            ['name' => 'Update mission payment'],
        ],
        
        'player_challenge' =>
        [
            ['name' => 'List player challenge'],
            ['name' => 'Create player challenge'],
            ['name' => 'Delete player challenge'],
            ['name' => 'Update player challenge'],
        ],


         
        'player_mission' =>
        [
            ['name' => 'List player mission'],
            ['name' => 'Create player mission'],
            ['name' => 'Delete player mission'],
            ['name' => 'Update player mission'],
        ],

        'logtime' =>
        [
            ['name' => 'List logtime'],
            ['name' => 'Create logtime'],
            ['name' => 'Delete logtime'],
            ['name' => 'Update logtime'],
        ],

        'experience' =>
        [
            ['name' => 'List experience'],
            ['name' => 'Create experience'],
            ['name' => 'Delete experience'],
            ['name' => 'Update experience'],
        ],

        'myweek' =>
        [
            ['name' => 'List myweek'],
            ['name' => 'Create myweek'],
            ['name' => 'Delete myweek'],
            ['name' => 'Update myweek'],
        ],

        'purchase' =>
        [
            ['name' => 'List purchase'],
            ['name' => 'Create purchase'],
            ['name' => 'Delete purchase'],
            ['name' => 'Update purchase'],
        ],

        'injury' =>
        [
            ['name' => 'List injury'],
            ['name' => 'Create injury'],
            ['name' => 'Delete injury'],
            ['name' => 'Update injury'],
        ],

        'concussion' =>
        [
            ['name' => 'List concussion'],
            ['name' => 'Create concussion'],
            ['name' => 'Delete concussion'],
            ['name' => 'Update concussion'],
        ]




       
      
    ];

    /**
     * @var
     */
    public $adminUser;

    /**
     * InstallAppHandler constructor.
     */
    public function __construct()
    {
        $this->roles = collect($this->roles);
        $this->permissions = collect($this->permissions);
    }

    /**
     * @param $installationData
     * @param \Closure $next
     * @return mixed
     */
    public function handle($installationData, Closure $next)
    {
        $this->createRoles()->createPermissions()->createAdminUser((array) $installationData)->assignAdminRoleToAdminUser()->assignAllPermissionsToAdminRole();
        event(new ApplicationWasInstalled($this->adminUser, $this->roles, $this->permissions));

        return $next($installationData);
    }

    /**
     * @return $this
     */
    public function createRoles()
    {
        $this->roles = $this->roles->map(function ($role) {
            return Role::create($role);
        });

        return $this;
    }

    /**
     * @return $this
     */
    public function createPermissions()
    {
        $this->permissions = $this->permissions->map(function ($group) {
            return collect($group)->map(function ($permission) {
                return Permission::create($permission);
            });
        });

        return $this;
    }

    /**
     * @param array $attributes
     * @return $this
     * @throws ValidationException
     */
    public function createAdminUser(array $attributes = [])
    {
        $attributes['name'] = "Admin";
        $attributes['email'] = "admin@dts.com";
        $attributes['password'] = "Yaandu@123";
        $attributes['password_confirmation'] = "Yaandu@123";
        $attributes['mobile']='9999999991';
        $validator = validator($attributes, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'mobile'=>'required|min:10',
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $u = new User();
        $this->adminUser = $u->create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => $attributes['password'],
            'mobile' => $attributes['mobile'],
        ]);

        return $this;
    }

    /**
     * @return $this
     */
    public function assignAdminRoleToAdminUser()
    {
        $this->adminUser->assignRole('Administrator');

        return $this;
    }

    /**
     * @return $this
     */
    public function assignAllPermissionsToAdminRole()
    {
        $role = Role::where('name', 'Administrator')->firstOrFail();
        $this->permissions->flatten()->each(function ($permission) use ($role) {
            $role->givePermissionTo($permission);
        });

        return $this;
    }
}
