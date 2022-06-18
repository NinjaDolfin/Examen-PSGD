<?php
include('DataController.php');
class ClientController extends Controller {
    public function index () {
        $clients = Client::all();
        include('../views/clients/list.php');
    }

    public function store ($data) {
        $data = checkHtml($data);
        $client = new Client(
          0,
          $data['fname'],
          $data['lname'],
          $data['e_mail'],
          $data['birthdate'],
          $data['telephone'],
          $data['postal_code'],
          $data['address']
        );
        $client->save();
        return $this->list_xhr();
    }

    public function destroy ($id) {
        $id = checkHtml($id);
        $client = Client::find($id);
        if (!$client) {
            return false;
        }
        $client->delete();
        return $this->list_xhr();
    }

    public function show ($id) {
        $id = checkHtml($id);
        $client = Client::find($id);
        if (!$client) {
            return false;
        }
        include('../views/clients/single.php');
    }

    public function create () {
        include('../views/clients/add.php');
    }

    public function edit ($data) {
        $data = checkHtml($data);
        $client = Client::find($data['id']);
        $client->fname = $data['fname'];
        $client->lname = $data['lname'];
        $client->e_mail = $data['e_mail'];
        $client->telephone = $data['telephone'];
        $client->postal_code = $data['postal_code'];
        $client->address = $data['address'];
        if (!$client) {
            return false;
        }
        $client->save();
        include('../views/clients/single.php');
    }

    public function list_xhr() {
        $clients = Client::all();
        include('../views/clients/list.php');
    }
}
