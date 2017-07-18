<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twig;
use Auth;


class ViewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show template.
     *
     * @return \Illuminate\Http\Response
     */
    public function module($pathToFile)
    {
        $this->file_request = $pathToFile;
        $this->base_path    = 'angular/modules/';
        return($this->getResponse());
    }

    /**
     * Show template.
     *
     * @return \Illuminate\Http\Response
     */
    public function directive($pathToFile)
    {
        $this->file_request = $pathToFile;
        $this->base_path    = 'angular/directives/';
        return($this->getResponse());
    }
    
    /**
     * Show template.
     *
     * @return \Illuminate\Http\Response
     */
    public function sidebar()
    {
        $this->file_request = 'sidebar';
        $this->base_path    = 'angular/blocks/';

        $user = Auth::user();
        return($this->getResponse(['user' => $user]));
    }


    /**
     * Show template.
     *
     * @return \Illuminate\Http\Response
     */
    public function block($pathToFile)
    {
        $this->file_request = $pathToFile;
        $this->base_path    = 'angular/blocks/';
        return($this->getResponse());
    }
    
    private function getResponse($vars = []){
        
        if (Auth::check()) {
            $this->setPath();
            $response = response(Twig::render($this->base_path.$this->path,$vars),200);
        }else{
            $response = response("acces denied",403);
        }
        return($response);
        
    }
    
    private function setPath(){
        
        $this->path    = '';
        $arrPath        = explode("-",$this->file_request);
        $last           = array_pop($arrPath);
        
        foreach($arrPath as $part){
            $this->path .= $part.'/';
        }
        if(str_contains($last, '.')){
            $file           = explode(".",$last);
            $this->path   .= $file[1]."/".$file[0];
        }else{
            $this->path   .= $last;
        }
        
    }
}
