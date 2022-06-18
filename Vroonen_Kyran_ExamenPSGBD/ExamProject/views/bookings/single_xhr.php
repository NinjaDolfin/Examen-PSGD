<?php if (isset($booking) && !empty($booking)): ?>
  <p> <?=$booking->id." ".$booking->booking_date." ".$booking->extra_contact;?></p>
  <div class="booking">
    <form action="/bookings/edit" method="post">
      <input type="hidden" name="chip_id" value="<?= $booking->id->id ?>">

      <label for="extra_contact">Nouveaux contact d'urgence:</label>
      <input type="text" name="extra_contact" value="<?= $booking->extra_contact->id ?>"><br>

      <label for="booking_date">Nouvelle date:</label>
      <input type="date" name="booking_date" value="<?= $booking->booking_date ?>"><br>
      <input type="submit" _id="<?=$booking->id->id?>" _current_folder="bookings" value="Confirmer">
    </form>
  </div>
<?php endif; ?>
