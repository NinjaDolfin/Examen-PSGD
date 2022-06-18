<?php

class RaceDAO extends DAO {

    public function __construct () {
        # The value int this parameter will set what table to look in.
        parent::__construct("races");
    }

    public function create ($data) {
        if ($data instanceof Race) {
            return $data;
        }

        if (!is_object($data)) {
            return new Race(
                isset($data['ID']) ? $data['ID'] : 0,
                $data['Name']
                // The Data elements above corresponds to the column names.
            );
        }
        return false;
    }

    public function store ($data , $statement = false) {
        $race = $this->create($data);
        if (!$race) {
            return false;
        }

        $statement = $this->db->prepare("INSERT INTO {$this->table} (ID, Name) VALUES (?, ?)");
        parent::store([$race->id, $race->name], $statement);
    }
}
