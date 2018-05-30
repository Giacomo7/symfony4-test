<?php
namespace App\Service;

class RandomGeneratorService{

    public function getRandom(){
        return rand(1,100);
    }
}

?>