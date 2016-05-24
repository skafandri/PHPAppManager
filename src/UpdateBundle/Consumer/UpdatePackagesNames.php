<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UpdatePackagesNames
 *
 * @author ameni
 */

namespace UpdateBundle\Consumer;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Doctrine\Common\Persistence\ObjectManager;
use UpdateBundle\Connection;

class UpdatePackagesNames implements ConsumerInterface {

    private $documentManager;

    public function __construct(ObjectManager $om) {
        // The property $documentManager is now set to the DocumentManager


        $this->documentManager = $om;
    }

    public function execute(AMQPMessage $msg) {
        $message = $msg->body;
       Connection::connection($this->documentManager)->packages->insert(json_decode($message, true));
      
        
    }

}
