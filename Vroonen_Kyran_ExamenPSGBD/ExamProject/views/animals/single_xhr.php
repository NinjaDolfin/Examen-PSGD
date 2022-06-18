<?php if (isset($animal) && !empty($animal)): ?>
  <p> <?=$animal->id." ".$animal->name." ".$animal->gender." ".$animal->sterilised." ".$animal->birthdate." ".$animal->race_id." ".$animal->last_heat." ".$animal->owner_id." ".$animal->vet_id;?></p>
  <div class="animal">
    <form action="/animals/edit" method="post">
      <input type="hidden" name="id" value="<?= $animal->id?>">
      <input type="hidden" name="chip_id" value="<?= $animal->chip_id?>">
      <label for="name">Nouveaux nom:</label>
      <input type="text" name="name" value="<?= $animal->name ?>"><br>

      <label for="race">Nouvelle race:</label>
      <input type="text" name="race" value="<?= $animal->race_id->id ?>"><br>

      <label for="last_heat">Dernières chaleurs:</label>
      <input type="date" name="last_heat" value="<?= $animal->last_heat ?>"><br>

      <label for="owner">Nouvelle propriétaire:</label>
      <input type="text" name="owner" value="<?= $animal->owner_id?>"><br>

      <label for="vet">Nouveux vétérinaire:</label>
      <input type="text" name="vet" value="<?= $animal->vet_id->id ?>"><br>

      <input type="submit" _id="<?=$animal->id?>" _current_folder="animals" value="Confirmer">
    </form>
  </div>
<?php endif; ?>
