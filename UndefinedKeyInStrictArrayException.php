<?php

class UndefinedKeyInStrictArrayException extends RuntimeException {
    private $key;

    public function __construct($key){
        $this->key = $key;
        parent::__construct("$key is not defined!");
    }

    public function getUndefinedKey(){
        return $this->key;
    }
} 