<?php
namespace App\Roles;

use Spatie\Permission\Models\Role;
use League\Fractal;

class RolTransformer extends Fractal\TransformerAbstract
{


	public function transform(Role $role)
	{
		
		return [
            'id' => $role->id,
			'name'  => $role->name
	    ];
	}

}