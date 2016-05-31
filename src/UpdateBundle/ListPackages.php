<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace UpdateBundle;
use UpdateBundle\Connection;
use Doctrine\Common\Persistence\ObjectManager;
/**
 * Description of ListPackages
 *
 * @author ameni
 */
class ListPackages {

    private $urlListPackages;
    private $documentManager;
    private $producer;

    public function __construct($urlListPackages, $producer, ObjectManager $om) {
        $this->urlListPackages = $urlListPackages;

        $this->documentManager = $om;
        $this->producer = $producer;
    }

    public function process() {
        $packagesNames = json_decode(file_get_contents($this->urlListPackages), true)["packageNames"];
        Connection::connection($this->documentManager)->packages->drop();
        foreach ($packagesNames as $key => $value) {
            
            $this->producer->publish($value);
        }
    }

}
