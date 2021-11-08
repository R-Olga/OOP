<?php 

include_once('Category.php');

class MonitorCategory extends Category {


    public function __construct($_name, $_filters, $_diagonal, $_frequency)
    {
        parent:: __construct($_name, $_filters);
        $this->filters['Diagonal'] = $_diagonal;
        $this->filters['Frequency'] = $_frequency;
    }
}
