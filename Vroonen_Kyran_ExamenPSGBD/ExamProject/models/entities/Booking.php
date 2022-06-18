<?php

class Booking extends Entity {

    protected $id;
    protected $chip_id;
    protected $booking_date;
    protected $extra_contact;
    protected static $dao_name = "BookingDAO";

    public function __construct ($id, $chip_id, $booking_date, $extra_contact) {
        $this->id = $id;
        $this->chip_id = $chip_id;
        $this->booking_date = $booking_date;
        $this->extra_contact = $extra_contact;
        parent::__construct(self::$dao_name);
    }

    public function __toString () {
        return $this->chip_id." (". $this->booking_date .") ".$this->extra_contact;
    }

    public function __get ($prop) {
        if (property_exists($this, $prop)) {
          if ($prop == "chip_id") {
                // $this->chip_id = $this->animal();
                // $this->chip_id->race_id = $this->chip_id->race_id->race();
                // $this->chip_id->owner_id = $this->chip_id->owner_id->owner();
                // $this->chip_id->owner_id->postal_code = $this->chip_id->owner_id->postal_code->postal_code();
                // $this->chip_id->vet_id = $this->chip_id->vet();
                // $this->extra_contact = $this->extra_contact();
          }
          return $this->$prop;
        }
    }

    public function animal () {
        if($this->id instanceof Animal) {
            return $this->id;
        }

        $this->id = Animal::find($this->id);
        return $this->id;
    }

    public function extra_contact () {
        if($this->extra_contact instanceof ExtraContact) {
            return $this->extra_contact;
        }
        $this->extra_contact = ExtraContact::find($this->extra_contact);
        return $this->extra_contact;
    }
}
