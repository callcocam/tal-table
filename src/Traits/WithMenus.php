<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Table\Traits;

use Symfony\Component\Finder\Finder;

trait WithMenus
{
    
     /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function label(){
        $label = get_class($this);
        $label =\Str::beforeLast($label,"\\");
        $label =\Str::afterLast($label,"\\");
        return \Str::title($label);
     }
 
      
     /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function path($param=null){
       
        $path = \Str::replace("-", "/",$this->format_name());
        $path = \Str::replace(".", "/",$path);
        $path = \Str::replace("paginas/", "",$path);
        $path = \Str::replace("/list", "",$path);
        if($param){
            $path = \Str::of($path)->append('/{model}');
        }
        return $path;
     }
     
    /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function route_name($sufix=null){
       
        $name =  $this->format_name();
        if($sufix){
            $name = \Str::of($name)->append('.');
            $name = \Str::of($name)->append($sufix)->value;
        }
        return $name;
     }
   
     /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function format_name(){
        $name = \Str::afterLast($this->format_view(),"livewire.");
        return \Str::beforeLast($name,"-component");
     }

     public function format_view(){
        $path = \Str::lower(get_class($this));
        $path = \Str::replace("\\", ".",$path);
        $path = \Str::afterLast($path,"livewire.");
        $path = \Str::beforeLast($path,"component");
        $path = \Str::replace('.list','', $path);
        return $path;
     }

    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function icon(){
        return 'chevron-right';
     }

    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function ordering(){
        return 1;
     }

    /*
    |--------------------------------------------------------------------------
    |  Features model
    |--------------------------------------------------------------------------
    | Define model
    |
    */
    public function model(){
        return null;
     }
    
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function description(){
        return null;
     }
     
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function generate(){
        return true;
     }
     
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Restrito visivel no me menu
    |
    */
    public function restrito(){
        return true;
     }
}
