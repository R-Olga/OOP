<?php 

include_once('Category.php');

class PhoneCategory extends Category {

    public function __construct($_name, $_filters, $_ram, $_countSim, $_hdd, $_os)
    {
        parent:: __construct($_name, $_filters);
        $this->filters['OS'] = $_ram;
        $this->filters['Ram'] = $_os;
        $this->filters['CountSim'] = $_countSim;
        $this->filters['Hdd'] = $_hdd;
    }
}
