<?php
namespace App\Users;

use App\User;
use League\Fractal;
use App\Roles\RolTransformer;

class UserTransformer extends Fractal\TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'roles'
    ];

	public function transform(User $user)
	{
		$roles = $user->roles()->pluck('name');
		
		return [
			'name'  => $user->name,
	        'email' => $user->email
	    ];
	}

	public function includeRoles(User $user)
    {
        $roles = $user->roles;

        return $this->collection($roles, new RolTransformer);
    }
}