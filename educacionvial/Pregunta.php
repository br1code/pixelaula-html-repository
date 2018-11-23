<?php
class Pregunta{
    private $pregunta;
    private $idPregunta;
    private $respC;
    private $resp1;
    private $resp2;
    private $val1;
    private $val2;
    private $val3;
    private $img;

    public function __construct($pregunta, $id) {
        $this->pregunta = $pregunta;
        $this->idPregunta = $id;
    }
    
    public function setImg($img){
        $this->img = $img;
    }
    
    public function setRespuestas($resp1, $resp2, $resp3){
        $this->resp1 = $resp1;
        $this->resp2 = $resp2;
        $this->resp3 = $resp3;
    }
    
    public function setValores($val1, $val2, $val3){
        $this->val1 = $val1;
        $this->val2 = $val2;
        $this->val3 = $val3;
    }
    
    public function getResp1(){
        return $this->resp1;
    }
    
     public function getResp2(){
        return $this->resp2;
    }
    
     public function getResp3(){
        return $this->resp3;
    }
    
      public function getVal1(){
        return $this->val1;
    }
    
     public function getVal2(){
        return $this->val2;
    }
    
     public function getVal3(){
        return $this->val3;
    }
    
    public function getIdPregunta(){
        return $this->idPregunta;
    }
    
    public function getPregunta(){
        return $this->pregunta;
    }
    
    public function getImg(){
        return $this->img;
    }
}
