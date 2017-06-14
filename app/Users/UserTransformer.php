<?php
namespace App\Users;

use App\User;
use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
	public function transform(User $user)
	{
	    return [
			'name'    => $user->name,
	        'email'   => $user->email,
	    ];
	}
}