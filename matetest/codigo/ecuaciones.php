<?php
class ecuacion {

    protected $ecuacion = array();

    function __construct() {
        $this->ecuacion[0] = '';
        $this->ecuacion[1] = 0;
    }

    function compDeDecimales() {
        $x1 = mt_rand(1, 100) / 10;
        $x2 = mt_rand(1, 100) / 10;
        if ($x1 == $x2) {
            $x1 = mt_rand(1, 100) / 10;
        }
        $this->ecuacion[0] = $this->ecuacion[0] . "¿Cual es mayor $x1 o $x2?";

        if ($x1 > $x2) {
            $this->ecuacion[1] = $x1;
        } else {
            $this->ecuacion[1] = $x2;
        }
        return $this->ecuacion;
    }

    function sumRest() {
        $x1 = mt_rand(1, 50);
        $x2 = mt_rand(1, 50);
        if ($x1 > $x2) {
            $this->ecuacion[0] .= "$x1 - $x2 = ?";
            $this->ecuacion[1] = $x1 - $x2;
        } else {
            $this->ecuacion[0] .= "$x1 + $x2 = ?";
            $this->ecuacion[1] = $x1 + $x2;
        }
        return $this->ecuacion;
    }

    function fracDec() {
        $x1 = mt_rand(1, 100);
        $x2 = mt_rand(1, 100);
        $this->ecuacion[0] .= "<sup>$x1</sup>&frasl;<sub>$x2</sub>";
        $this->ecuacion[1] = round($x1 / $x2, 1, PHP_ROUND_HALF_DOWN); 
        return $this->ecuacion;
    }

    function secNum() {
        $x1 = mt_rand(1, 100);
        $this->ecuacion[0] = "";
        $this->ecuacion[1] = $x1 + 2;
        for ($i = 0; $i < 5; $i++) {
            $x2 = $x1 + $i;
            if ($i == 2) {
                $this->ecuacion[0] .= "x, ";
            } elseif ($i == 4) {
                $this->ecuacion[0] .= "$x2";
            } else {
                $this->ecuacion[0] .= "$x2, ";  
            }
        }
        return $this->ecuacion;
    }


    function porcentaje() {
        $x1 = mt_rand(10, 100);
        $x2 = mt_rand(1, 100);
        $this->ecuacion[0] = $this->ecuacion[0] . "Ingrese el $x2 % de $x1";
        $this->ecuacion[1] = round($x1 * $x2 / 100, 1, PHP_ROUND_HALF_DOWN);
        return $this->ecuacion;
    }
    
    
    function lol() {
        $x1 = mt_rand(0, 4);
        switch ($x1) {
            case '0':
            $x1 = mt_rand(1, 100) / 10;
            $x2 = mt_rand(1, 100) / 10;
            if ($x1 == $x2) {
                $x1 = mt_rand(1, 100) / 10;
            }
            $this->ecuacion[0] = $this->ecuacion[0] . "¿Cual es mayor $x1 o $x2?";
    
            if ($x1 > $x2) {
                $this->ecuacion[1] = $x1;
            } else {
                $this->ecuacion[1] = $x2;
            }
            break;
            case '1':
            $x1 = mt_rand(1, 50);
            $x2 = mt_rand(1, 50);
            if ($x1 > $x2) {
                $this->ecuacion[0] .= "$x1 - $x2 = ?";
                $this->ecuacion[1] = $x1 - $x2;
            } else {
                $this->ecuacion[0] .= "$x1 + $x2 = ?";
                $this->ecuacion[1] = $x1 + $x2;
            }
            break;
            case '2':
            $x1 = mt_rand(1, 100);
            $x2 = mt_rand(1, 100);
            $this->ecuacion[0] .= "<sup>$x1</sup>&frasl;<sub>$x2</sub>?";
            $this->ecuacion[1] = round($x1 / $x2, 1, PHP_ROUND_HALF_DOWN); 
            break;
            case '3':
            $x1 = mt_rand(1, 100);
            $this->ecuacion[0] = "";
            $this->ecuacion[1] = $x1 + 2;
            for ($i = 0; $i < 5; $i++) {
                $x2 = $x1 + $i;
                if ($i == 2) {
                    $this->ecuacion[0] .= "x, ";
                } elseif ($i == 4) {
                    $this->ecuacion[0] .= "$x2";
                } else {
                    $this->ecuacion[0] .= "$x2, ";  
                }
            }
            break;
            case '4':
            $x1 = mt_rand(10, 100);
            $x2 = mt_rand(1, 100);
            $this->ecuacion[0] = $this->ecuacion[0] . "Ingrese el $x2 % de $x1";
            $this->ecuacion[1] = round($x1 * $x2 / 100, 1, PHP_ROUND_HALF_DOWN);
            break;
        }
        return $this->ecuacion;
    }
}