<?php

abstract class Model implements JsonSerializable{

//Gets all the properties (fields)
    public function jsonSerialize():mixed
    {
        return get_object_vars($this);
    } 
}