<?php if (isset($animals) && !empty($animals)): ?>
    <?php foreach($animals as $animal): ?>
        <div class="animals">
           <input type="hidden" name="id" value="<?= $animal->id ?>">
           <p> <?=$animal->id." ".$animal->name." ".$animal->gender." ".$animal->sterilised." ".$animal->birthdate." ".$animal->race_id." ".$animal->last_heat." ".$animal->owner_id." ".$animal->vet_id;?></p>
           <button _id="<?=$animal->id ?>" _current_folder="animals" class="delete">Supprimer</button>
           <button _id="<?=$animal->id ?>" _current_folder="animals" class="single">Modifier</button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
