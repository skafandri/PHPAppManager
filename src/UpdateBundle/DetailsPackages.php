<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace UpdateBundle;

/**
 * Description of DetailsPackages
 *
 * @author ameni
 */
class DetailsPackages {
  
   private $producer;
    public function __construct($producer)
    {
    
        
        $this->producer = $producer;
        
    }
     public function process($parameters){
      
       $this->producer->publish($parameters);
   }
    
    
}
