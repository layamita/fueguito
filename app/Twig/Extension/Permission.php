<?php
namespace App\Twig\Extension;

use Twig_Extension;
use Twig_SimpleFunction;

class Permission extends Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('isAuth', array($this, 'isAuth'))
            
        );
    }

    public function isAuth($permission,$permissions)
    {
        $permission     = strtolower($permission);
        $permissions    = array_map('strtolower', $permissions);

        dd(is_array($permission));
        dd($permission,$permissions);

        return(in_array($permission,$permissions));
    }
}