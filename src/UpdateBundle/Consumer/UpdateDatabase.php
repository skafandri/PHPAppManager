<?php
namespace UpdateBundle\Consumer;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Doctrine\Common\Persistence\ObjectManager;
use UpdateBundle\Connection;

/**
 * Description of UpdateDatabase
 *
 * @author ameni
 */
class UpdateDatabase implements ConsumerInterface {

    private $documentManager;

    public function __construct(ObjectManager $om) {
        $this->documentManager = $om;
    }

    public function execute(AMQPMessage $msg) {
        $message = $msg->body;
        Connection::connection($this->documentManager)->packages->insert(json_decode($message, true), array("safe" => true, 'upsert' => true));
    }

}
