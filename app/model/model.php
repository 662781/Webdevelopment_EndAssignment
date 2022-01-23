<?php

class Model{

//Gets all the properties (fields)
    public function jsonSerialize():mixed
    {
        return get_object_vars($this);
    } 
}