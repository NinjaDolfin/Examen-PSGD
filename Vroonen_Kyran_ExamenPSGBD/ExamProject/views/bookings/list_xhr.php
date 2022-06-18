<?php if (isset($bookings) && !empty($bookings)): ?>
    <?php foreach($bookings as $booking): ?>
        <div class="bookings">
           <input type="hidden" name="id" value="<?= $booking->id ?>">
           <p> <?=$booking->chip_id." ".$booking->booking_date." ".$booking->extra_contact;?></p>
           <button _id="<?=$booking->id?>" _current_folder="bookings" class="delete">Supprimer</button>
           <button _id="<?=$booking->id?>" _current_folder="bookings" class="single">Modifier</button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
