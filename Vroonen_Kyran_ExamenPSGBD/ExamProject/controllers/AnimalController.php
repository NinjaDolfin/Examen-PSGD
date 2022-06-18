<?php
include('DataController.php');
class AnimalController extends Controller {
    public function index () {
        $animals = Animal::all();
        include('../views/animals/list.php');
    }

    public function store ($data) {
      $data = checkHtml($data);
      // $errors = checkEmpty($data);
      if (!empty($errors)) {
        $animal = new Animal(
          0,
          $data['chip_id'],
          $data['pet_name'],
          $data['gender'],
          $data['sterilised'],
          $data['pet_birthdate'],
          $data['race_id'],
          $data['last_heat'],
          $data['owner_id'],
          $data['vet_id']
        );
        $animal->save();
      }
      return $this->list_xhr();
    }

    public function create () {
        include('../views/animals/add.php');
    }

    public function destroy ($id) {
        $id = checkHtml($id);
        $animal = Animal::find($id);
        if (!$animal) {
            return false;
        }
        $animal->delete();
        return $this->list_xhr();
    }

    public function show ($id) {
        $id = checkHtml($id);
        $animal = Animal::find($id);
        if (!$animal) {
            return false;
        }
        include('../views/animals/single.php');
    }

    public function edit ($data) {
        $data = checkHtml($data);
        $animal = Animal::find($data['id']);
        $animal->chip_id = $data['chip_id'];
        $animal->name = $data['name'];
        $animal->race_id = $data['race'];
        $animal->last_heat = $data['last_heat'];
        $animal->owner_id = $data['owner'];
        $animal->vet_id = $data['vet'];
        if (!$animal) {
            return false;
        }
        $animal->save();
        include('../views/animals/single.php');
    }

    public function list_xhr() {
        $animals = Animal::all();
        include('../views/animals/list.php');
    }
}
