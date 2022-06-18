<?php if (isset($postalCodes) && !empty($postalCodes)): ?>
    <?php foreach($postalCodes as $postalCode): ?>
        <div class="postalCodes">
           <input type="hidden" name="id" value="<?= $postalCode->id ?>">
           <p> <?=$postalCode->id." ".$postalCode->postalCode." ".$postalCode->city;?></p>
           <button _id="<?=$postalCode->id ?>" _current_folder="postalCodes" class="delete">Supprimer</button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
