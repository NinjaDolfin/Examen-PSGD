<?php

class Client extends Entity {

    protected $id;
    protected $fname;
    protected $lname;
    protected $e_mail;
    protected $birthdate;
    protected $telephone;
    protected $postal_code;
    protected $address;
    protected static $dao_name = "ClientDAO";

    public function __construct ($id, $fname, $lname, $e_mail, $birthdate, $telephone, $postal_code, $address) {
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->e_mail = $e_mail;
        $this->birthdate = $birthdate;
        $this->telephone = $telephone;
        $this->postal_code = $postal_code;
        $this->address = $address;
        parent::__construct(self::$dao_name);
    }

    public function __toString () {
        return $this->id." (". $this->name .") ".$this->race;
    }

    public function __get ($prop) {
        if (property_exists($this, $prop)) {
          if ($prop == "id") {
              $this->postal_code = $this->postal_code();
          }
          return $this->$prop;
        }
    }

    public function postal_code () {
        if($this->postal_code instanceof PostalCode) {
            return $this->postal_code;
        }
        $this->postal_code = PostalCode::find($this->postal_code);
        return $this->postal_code;
    }
}
