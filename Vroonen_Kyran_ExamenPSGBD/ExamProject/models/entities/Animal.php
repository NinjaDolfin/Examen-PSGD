<?php

class Animal extends Entity {

    protected $id;
    protected $chip_id;
    protected $name;
    protected $gender;
    protected $sterilised;
    protected $birthdate;
    protected $race_id;
    protected $last_heat;
    protected $owner_id;
    protected $vet_id;
    protected static $dao_name = "AnimalDAO";

    public function __construct ($id, $chip_id, $name, $gender, $sterilised, $birthdate, $race_id, $last_heat, $owner_id, $vet_id) {
        $this->id = $id;
        $this->chip_id = $chip_id;
        $this->name = $name;
        $this->gender = $gender;
        $this->sterilised = $sterilised;
        $this->birthdate = $birthdate;
        $this->race_id = $race_id;
        $this->last_heat = $last_heat;
        $this->owner_id = $owner_id;
        $this->vet_id = $vet_id;
        parent::__construct(self::$dao_name);
    }

    public function __toString () {
        return $this->id." (". $this->name .") ".$this->race;
    }

    public function __get ($prop) {
        if (property_exists($this, $prop)) {
          if ($prop == "id") {
                $this->owner_id = $this->owner();
                $this->vet_id = $this->vet();
                $this->race_id = $this->race();
          }
          return $this->$prop;
        }
    }

    public function owner () {
        if($this->owner_id instanceof Client) {
            return $this->owner_id;
        }

        $this->owner_id = Client::find($this->owner_id);
        return $this->owner_id;
    }

    public function race () {
        if($this->race_id instanceof Race) {
            return $this->race_id;
        }

        $this->race_id = Race::find($this->race_id);
        return $this->race_id;
    }

    public function vet () {
        if($this->vet_id instanceof ExtraContact) {
            return $this->vet_id;
        }

        $this->vet_id = ExtraContact::find($this->vet_id);
        return $this->vet_id;
    }
}
