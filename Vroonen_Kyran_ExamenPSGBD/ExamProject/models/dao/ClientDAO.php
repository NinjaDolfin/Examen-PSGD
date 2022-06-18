<?php

class ClientDAO extends DAO {

    public function __construct () {
        # The value int this parameter will set what table to look in.
        parent::__construct("clients");
    }

    public function create ($data) {
        if ($data instanceof Client) {
            return $data;
        }

        if (!is_object($data)) {
            return new Client(
                # isset($data['id']) ? $data['id'] : 0,
                $data['ID'],
                $data['Name'],
                $data['Family_Name'],
                $data['E_Mail'],
                $data['Birthdate'],
                $data['Phone_Number'],
                $data['Postal_FK'],
                $data['Address']
                // The Data elements above corresponds to the column names.
            );
        }
        return false;
    }

    public function store ($data , $statement = false) {
        $client = $this->create($data);

        if (!$client) {
            return false;
        }
        $statement = $this->db->prepare("INSERT INTO {$this->table} (ID, Name, Family_Name, E_Mail, Birthdate, Phone_Number, Postal_FK, Address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        parent::store([$client->id, $client->fname, $client->lname, $client->e_mail, $client->birthdate, $client->telephone, $client->postal_code, $client->address], $statement);
    }

    public function update ($data, $statement = false) {
        $client = $this->create($data);
        if (!$client) {
            return false;
        }
        $statement = $this->db->prepare("UPDATE {$this->table} SET Name = ?, Family_Name = ?, E_Mail = ?, Phone_Number = ?, Postal_FK = ?, Address = ? WHERE ID = ?");
        parent::store([$client->fname, $client->lname, $client->e_mail, $client->telephone, $client->postal_code, $client->address, $client->id], $statement);
    }
}
