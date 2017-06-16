<?php
namespace App\Users;

use League\Fractal;
use App\Users\UserTransformer;
use Illuminate\Support\Facades\Auth;
use League\Fractal\Manager;

class Logged
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->manager = new Manager();
    }    
    

    public function logged(){

        $user = Auth::user();

        $resource = new Fractal\Resource\Item($user, new UserTransformer);
        $user = $this->manager->createData($resource)->toArray();
        return $user['data'];

    }
	
}