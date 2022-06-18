<?php if (isset($races) && !empty($races)): ?>
    <?php foreach($races as $race): ?>
        <div class="races">
           <input type="hidden" name="id" value="<?= $race->id ?>">
           <p> <?=$race->id." ".$race->name;?></p>
           <button _id="<?=$race->id ?>" _current_folder="races" class="delete">Supprimer</button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
