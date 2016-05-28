<?php

/**
 * @author ameni
 */

namespace UpdateBundle\Consumer;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class UpdatePackagesNames implements ConsumerInterface {

    private $urlDetailPackage;
    private $serviceStorePackagesDetails;

    public function __construct($urlDetailPackage, $serviceStorePackagesDetails) {
        $this->urlDetailPackage = $urlDetailPackage;
        $this->serviceStorePackagesDetails = $serviceStorePackagesDetails;
    }

    public function execute(AMQPMessage $msg) {
        $message = $msg->body;

        $parameters = json_decode(file_get_contents($this->urlDetailPackage . $message . ".json"), true);

        $this->serviceStorePackagesDetails->process(json_encode($parameters, true));
    }

}
