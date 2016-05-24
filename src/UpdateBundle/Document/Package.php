<?php
namespace UpdateBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Package
 *
 * @author ameni
 */

/**
 * @MongoDB\Document
 */
class Package {
  /** 
     * @MongoDB\Id(strategy="AUTO", type="int") 
     */
    private $id;
        /**
     * @MongoDB\Collection
     */
    private $parameters=array();

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set parameters
     *
     * @param collection $parameters
     * @return self
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * Get parameters
     *
     * @return collection $parameters
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
