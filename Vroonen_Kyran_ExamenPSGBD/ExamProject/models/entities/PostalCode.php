<?php

class PostalCode extends Entity {

    protected $id;
    protected $postal_code;
    protected $city;
    protected static $dao_name = "PostalCodeDAO";

    public function __construct ($id, $postal_code, $city) {
        $this->id = $id;
        $this->postal_code = $postal_code;
        $this->city = $city;
        parent::__construct(self::$dao_name);
    }

    public function __toString () {
        return $this->id." (". $this->name .") ".$this->race;
    }

    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }
}
