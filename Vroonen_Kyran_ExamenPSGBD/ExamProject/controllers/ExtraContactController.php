<?php
include('DataController.php');
class ExtraContactController extends Controller {
    public function index () {
        $contacts = ExtraContact::all();
        include('../views/extraContacts/list.php');
    }

    public function store ($data) {
      $data = checkHtml($data);
        $contact = new ExtraContact(
          0,
          $data['extra_fname'],
          $data['extra_lname'],
          $data['extra_telephone'],
          $data['is_vet']
        );
        $contact->save();
        return $this->list_xhr();
    }

    public function destroy ($id) {
        $id = checkHtml($id);
        $contact = ExtraContact::find($id);
        if (!$contact) {
            return false;
        }
        $contact->delete();
        return $this->list_xhr();
    }

    public function show ($id) {
        $id = checkHtml($id);
        $contact = ExtraContact::find($id);
        if (!$contact) {
            return false;
        }
        include('../views/extraContacts/single.php');
    }

    public function create () {
        include('../views/extraContacts/add.php');
    }

    public function edit ($data) {
        $data = checkHtml($data);
        $contact = ExtraContact::find($data['id']);
        $contact->fname = $data['fname'];
        $contact->lname = $data['lname'];
        $contact->telephone = $data['telephone'];
        $contact->is_vet = $data['is_vet'];
        if (!$contact) {
            return false;
        }
        $contact->save();
        include('../views/extraContacts/single.php');
    }

    public function list_xhr() {
        $contacts = ExtraContact::all();
        include('../views/extraContacts/list.php');
    }
}
