<?php

class Race extends Entity {

    protected $id;
    protected $name;
    protected static $dao_name = "RaceDAO";

    public function __construct ($id, $name) {
        $this->id = $id;
        $this->name = $name;
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
