<div class="booking">
  <form action="/bookings/store" method="post">
    <input type="hidden" name="id" value=""><br>
    <label for="chip_id">N° Chip/Tatoo:</label>
    <input type="text" name="chip_id" value=""><br>

    <label for="booking_date">Date du séjour:</label>
    <input type="date" name="booking_date" value=""><br>

    <label for="extra_contact">Contact supplementaire:</label>
    <input type="text" name="extra_contact" value=""><br>

    <input type="submit" value="Ajouter">
  </form>
</div>
