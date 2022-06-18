<?php

class ExtraContactDAO extends DAO {

    public function __construct () {
        # The value int this parameter will set what table to look in.
        parent::__construct("extra_contacts");
    }

    public function create ($data) {
        if ($data instanceof ExtraContact) {
            return $data;
        }

        if (!is_object($data)) {
            return new ExtraContact(
                # isset($data['id']) ? $data['id'] : 0,
                $data['ID'],
                $data['Name'],
                $data['Family_Name'],
                $data['Phone_Number'],
                $data['Is_Vet']
                // The Data elements above corresponds to the column names.
            );
        }
        return false;
    }

    public function store ($data , $statement = false) {
        $extraContact = $this->create($data);

        if (!$extraContact) {
            return false;
        }
        var_dump($extraContact);
        $statement = $this->db->prepare("INSERT INTO {$this->table} (ID, Name, Family_Name, Phone_Number, Is_Vet) VALUES (?, ?, ?, ?, ?)");
        parent::store([$extraContact->id, $extraContact->fname, $extraContact->lname, $extraContact->telephone, $extraContact->is_vet], $statement);
    }

    public function update ($data, $statement = false) {
        $contact = $this->create($data);
        if (!$contact) {
            return false;
        }
        $statement = $this->db->prepare("UPDATE {$this->table} SET Name = ?, Family_Name = ?, Phone_Number = ?, Is_Vet = ? WHERE ID = ?");
        parent::store([$contact->fname, $contact->lname, $contact->telephone, $contact->is_vet, $contact->id], $statement);
    }
}
