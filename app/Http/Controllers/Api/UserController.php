<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiController;
use League\Fractal;
use App\Users\UserTransformer;

class UserController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\League\Fractal\Manager $manager)
    {
        //parent::__construct();

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

        $resource = new Fractal\Resource\Collection([$user], new UserTransformer);
        return $this->manager->createData($resource)->toArray();
    }
}
