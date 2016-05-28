<?php

namespace UpdateBundle;

/**
 * @author ameni
 */
class ListPackages {

    private $urlListPackages;
    private $producer;

    public function __construct($urlListPackages, $producer) {
        $this->urlListPackages = $urlListPackages;

        $this->producer = $producer;
    }

    public function process() {
        $packagesNames = json_decode(file_get_contents($this->urlListPackages), true)["packageNames"];
        foreach ($packagesNames as $key => $value) {

            $this->producer->publish($value);
        }
    }

}
