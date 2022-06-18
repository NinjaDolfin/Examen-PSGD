<?php
include('DataController.php');
class PostalCodeController extends Controller {
    public function index () {
        $postalCodes = PostalCode::all();
        include('../views/postalCodes/list.php');
    }

    public function store ($data) {
        $data = checkHtml($data);
        $postalCode = new PostalCode(
          0,
          $data['postal_code'],
          $data['city']
        );
        $postalCode->save();
        return $this->list_xhr();
    }

    public function destroy ($id) {
        $id = checkHtml($id);
        $postalCode = PostalCode::find($id);
        if (!$postalCode) {
            return false;
        }
        $postalCode->delete();
        return $this->list_xhr();
    }

    public function create () {
        include('../views/postalCodes/add.php');
    }

    public function list_xhr() {
        $postalCodes = PostalCode::all();
        include('../views/postalCodes/list.php');
    }
}
