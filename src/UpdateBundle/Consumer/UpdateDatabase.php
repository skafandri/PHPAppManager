<?php
namespace UpdateBundle\Consumer;

use Doctrine\Common\Persistence\ObjectManager;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Psr\Log\LoggerInterface;
use UpdateBundle\Connection;

/**
 * Description of UpdateDatabase
 *
 * @author ameni
 */
class UpdateDatabase implements ConsumerInterface {

    private $documentManager;
    
    /**
     *
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(ObjectManager $om, LoggerInterface $logger) {
        $this->documentManager = $om;
        $this->logger = $logger;
                
    }

    public function execute(AMQPMessage $msg) {
        $message = json_decode($msg->body, true);
        $this->logger->info('Received', $message);
        Connection::connection($this->documentManager)->packages->insert($message, array("safe" => true, 'upsert' => true));
        $this->logger->info('Inserted');
    }

}
