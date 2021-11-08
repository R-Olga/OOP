<?php 

include_once('Product.php');

class Phone extends Product {
    public $cpu;
    public $ram;
    public $countSim;
    public $hdd;
    public $os;

    public function __construct($name, $price, $description, $brand, $cpu, $ram, $countSim, $hdd, $os)
    {
        parent:: __construct($name, $price, $description, $brand);
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->countSim = $countSim;
        $this->hdd = $hdd;
        $this->os = $os;
    }

    public function getProduct() {
        $info = parent::getProduct();
        $info .= ", CPU: " . $this->cpu . ", RAM: " . $this->ram . ", Count Sim: " . $this->countSim . ", HDD: " . $this->hdd . ", OS: " . $this->os;

        return $info;
    }

}
