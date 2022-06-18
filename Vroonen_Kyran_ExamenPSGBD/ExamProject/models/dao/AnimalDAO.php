<?php

class AnimalDAO extends DAO {

    public function __construct () {
        # The value int this parameter will set what table to look in.
        parent::__construct("animals");
    }

    public function create ($data) {
        if ($data instanceof Animal) {
            return $data;
        }

        if (!is_object($data)) {
            return new Animal(
                isset($data['ID']) ? $data['ID'] : 0,
                $data['Chip_ID'],
                $data['Name'],
                $data['Gender'],
                $data['Sterilised'],
                $data['Birthdate'],
                $data['Race_FK'],
                $data['Last_Heat'],
                $data['Owner_FK'],
                $data['Vet_FK']
                // The Data elements above corresponds to the column names.
            );
        }
        return false;
    }

    public function store ($data , $statement = false) {

        $animal = $this->create($data);
        if (!$animal) {
            return false;
        }


        $statement = $this->db->prepare("INSERT INTO {$this->table} (Chip_ID, Name, Gender, Sterilised, Birthdate, Race_FK, Last_Heat, Owner_FK, Vet_FK) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        parent::store([$animal->chip_id, $animal->name, $animal->gender, $animal->sterilised, $animal->birthdate, $animal->race_id, $animal->last_heat, $animal->owner_id, $animal->vet_id ], $statement);
    }

    public function update ($data, $statement = false) {
        $animal = $this->create($data);
        if (!$animal) {
            return false;
        }
        if ($animal->last_heat != '')
        {
          $statement = $this->db->prepare("UPDATE {$this->table} SET Name = ?, Race_FK = ?, Last_Heat = ?, Owner_FK = ?, Vet_FK = ? WHERE ID = ?");
          parent::store([$animal->name, $animal->race_id, $animal->last_heat, $animal->owner_id, $animal->vet_id, $animal->id], $statement);
        }
        else
        {
          $statement = $this->db->prepare("UPDATE {$this->table} SET Name = ?, Race_FK = ?, Owner_FK = ?, Vet_FK = ? WHERE ID = ?");
          parent::store([$animal->name, $animal->race_id, $animal->owner_id, $animal->vet_id, $animal->id], $statement);
        }
    }
}
