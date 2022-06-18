<?php

class BookingDAO extends DAO {

    public function __construct () {
        # The value int this parameter will set what table to look in.
        parent::__construct("bookings");
    }

    public function create ($data) {
        if ($data instanceof Booking) {
            return $data;
        }

        if (!is_object($data)) {
            return new Booking(
                isset($data['id']) ? $data['id'] : 0,
                $data['ID'],
                $data['Booking_Date'],
                $data['Extra_Contact_FK']
                // The Data elements above corresponds to the column names.
            );
        }
        return false;
    }

    public function store ($data , $statement = false) {
        $booking = $this->create($data);
        if (!$booking) {
            return false;
        }

        $statement = $this->db->prepare("INSERT INTO {$this->table} (ID, Booking_Date, Extra_Contact_FK) VALUES (?, ?, ?)");
        parent::store([$booking->chip_id, $booking->booking_date, $booking->extra_contact], $statement);
    }

    public function update ($data, $statement = false) {
        $booking = $this->create($data);
        if (!$booking) {
            return false;
        }
        $statement = $this->db->prepare("UPDATE {$this->table} SET Booking_Date = ?, Extra_Contact_FK = ? WHERE ID = ?");
        parent::store([$booking->booking_date, $booking->extra_contact, $booking->id], $statement);

    }
}
