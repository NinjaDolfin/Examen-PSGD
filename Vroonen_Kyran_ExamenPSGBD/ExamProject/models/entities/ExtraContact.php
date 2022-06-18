<?php

class ExtraContact extends Entity {

    protected $id;
    protected $fname;
    protected $lname;
    protected $telephone;
    protected $is_vet;
    protected static $dao_name = "ExtraContactDAO";

    public function __construct ($id, $fname, $lname, $telephone, $is_vet) {
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->telephone = $telephone;
        $this->is_vet = $is_vet;
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
