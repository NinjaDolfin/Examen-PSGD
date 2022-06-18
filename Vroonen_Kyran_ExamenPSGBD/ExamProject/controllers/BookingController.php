<?php
include('DataController.php');
class BookingController extends Controller {
    public function index () {
        $bookings = Booking::all();
        include('../views/bookings/list.php');
    }

    public function store ($data) {
      $data = checkHtml($data);
      $booking = new Booking(
        0,
        $data['chip_id'],
        $data['booking_date'],
        $data['extra_contact']
      );
      $booking->save();
      return $this->list_xhr();
    }

    public function destroy ($id) {
        $id = checkHtml($id);
        $booking = Booking::find($id);
        if (!$booking) {
            return false;
        }
        $booking->delete();
        $this->list_xhr();
    }

    public function list_xhr() {
        $bookings = Booking::all();
        include('../views/bookings/list.php');
    }

    public function show ($id) {
        $id = checkHtml($id);
        $booking = Booking::find($id);
        if (!$booking) {
            return false;
        }
        include('../views/bookings/single.php');
    }

    public function edit ($data) {
        $data = checkHtml($data);
        $booking = Booking::find($data['chip_id']);
        $booking->booking_date = $data['booking_date'];
        $booking->extra_contact = $data['extra_contact'];
        if (!$booking) {
            return false;
        }
        $booking->save();
        include('../views/bookings/single.php');
    }

    public function create () {
        include('../views/bookings/add.php');
    }

}
