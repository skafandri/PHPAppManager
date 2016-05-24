<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace UpdateBundle;

/**
 * Description of Connection
 *
 * @author ameni
 */
class Connection {
   static $state=true;
   static $database;
   static function connection($documentmanager){
       if(self::$state==true){
       self::$database = $documentmanager->getConnection()->getMongo()->selectDB("test_database");
      self::$state=false;
      
       }
       return self::$database;
   }
}
