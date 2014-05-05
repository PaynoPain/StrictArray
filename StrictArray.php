<?php

include_once("UndefinedKeyInStrictArrayException.php");

class StrictArray implements ArrayAccess{
    private $arr;

    public function __construct(array &$arr){
        $this->arr = $arr;
    }

    public function __get($key){
        return $this->get($key);
    }

    public function __set($key, $value){
        $this->unsupported();
    }

    public function offsetExists($offset){
        return $this->existsKey($offset);
    }

    public function offsetGet($offset){
        return $this->get($offset);
    }

    public function offsetSet($offset, $value){
        $this->unsupported();
    }

    public function offsetUnset($offset){
        $this->unsupported();
    }

    private function unsupported(){
        throw new RuntimeException("Unsupported operation!");
    }

    private function get($key){
        if (!$this->existsKey($key)) {
            throw new UndefinedKeyInStrictArrayException($key);
        }

        return $this->arr[$key];
    }

    private function existsKey($key){
        return array_key_exists($key, $this->arr);
    }

    public function containsAll(array $keys){
        return count(array_intersect($keys, array_keys($this->arr))) == count($keys);
    }
}