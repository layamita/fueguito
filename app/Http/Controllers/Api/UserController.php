<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Auth;
use App\Users\UserTransformer;
use League\Fractal\Resource\Item;

class UserController extends ApiController
{
    
    public function __construct(\League\Fractal\Manager $manager)
    {
        $this->manager = $manager;
    }  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogued()
    {
        $user = Auth::user();

        $resource = new Item($user, new UserTransformer);
        $user = $this->manager->createData($resource)->toArray();
        return($user);
    }
}
