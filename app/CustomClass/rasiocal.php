<?php
namespace App\CustomClass;

$result = "";
class rasiocal
{
    var $a;
    var $b;
    var $d;

    function checkopration($oprator)
    {
        switch($oprator)
        {
            case 'Utang Terhadap Total Aset':
            case 'Utang Terhadap Ekuitas':
            case 'Cakupan Bunga':
            case 'Rasio Lancar':
            return $this->a / $this->b;
            break;

            case 'Rasio Cepat':
            return ($this->a - $this->d)/$this->b;
            break;

        }
    }
    function getresult($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        return $this->checkopration($c);
    }

    function rasiocepat($a, $b, $c, $d)
    {
        $this->a = $a;
        $this->b = $b;
        $this->d = $d;
        return $this->checkopration($c);
    }
}



