<?php

namespace UpdateBundle;

/**
 * @author ameni
 */
class ListPackages {

    private $urlListPackages;
    private $urlDetailPackage;
    private $producer;

    public function __construct($urlListPackages, $urlDetailPackage, $producer) {
        $this->urlListPackages = $urlListPackages;
        $this->urlDetailPackage = $urlDetailPackage;
        $this->producer = $producer;
    }

    public function process() {
        $packagesNames = json_decode(file_get_contents($this->urlListPackages), true)["packageNames"];
        foreach ($packagesNames as $key => $value) {
            $parameters = json_decode(file_get_contents($this->urlDetailPackage . $value . ".json"), true);
            $this->producer->publish(json_encode($parameters, true));
        }
    }

}
