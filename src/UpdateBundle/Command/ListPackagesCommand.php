<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListPackagesCommand
 *
 * @author ameni
 */
namespace UpdateBundle\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class ListPackagesCommand extends ContainerAwareCommand{
     protected function configure()
    {
        $this->setName('list:packages');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('list_packages')->process();
    }
   
}
