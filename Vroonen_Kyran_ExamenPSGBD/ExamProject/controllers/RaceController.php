<?php
include('DataController.php');
class RaceController extends Controller {
    public function index () {
        $races = Race::all();
        include('../views/races/list.php');
    }

    public function store ($data) {
        $data = checkHtml($data);
        $race = new Race(
          0,
          $data['race']
        );
        $race->save();
        return $this->list_xhr();
    }

    public function destroy ($id) {
        $id = checkHtml($id);
        $race = Race::find($id);
        if (!$race) {
            return false;
        }
        $race->delete();
        return $this->list_xhr();
    }

    public function create () {
        include('../views/races/add.php');
    }

    public function list_xhr() {
        $races = Race::all();
        include('../views/races/list.php');
    }
}
