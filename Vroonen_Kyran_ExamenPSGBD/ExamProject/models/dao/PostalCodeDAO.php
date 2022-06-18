<?php

class PostalCodeDAO extends DAO {

    public function __construct () {
        # The value int this parameter will set what table to look in.
        parent::__construct("postal_codes");
    }

    public function create ($data) {
        if ($data instanceof PostalCode) {
            return $data;
        }

        if (!is_object($data)) {
            return new PostalCode(
                isset($data['ID']) ? $data['ID'] : 0,
                $data['Postal_Code'],
                $data['City_Name']
                // The Data elements above corresponds to the column names.
            );
        }
        return false;
    }

    public function store ($data , $statement = false) {
        $postalCode = $this->create($data);

        if (!$postalCode) {
            return false;
        }

        $statement = $this->db->prepare("INSERT INTO {$this->table} (ID, Postal_Code, City_Name) VALUES (?, ?, ?)");
        parent::store([$postalCode->id, $postalCode->postal_code, $postalCode->city], $statement);
    }
}
