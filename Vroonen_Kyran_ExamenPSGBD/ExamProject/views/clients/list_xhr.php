<?php if (isset($clients) && !empty($clients)): ?>
    <?php foreach($clients as $client): ?>
        <div class="clients">
           <input type="hidden" name="id" value="<?= $client->id ?>">
           <p> <?=$client->id." ".$client->fname." ".$client->lname." ".$client->e_mail." ".$client->birthdate." ".$client->telephone." ".$client->postal_code." ".$client->address;?></p>
           <button _id="<?=$client->id ?>" _current_folder="clients" class="delete">Supprimer</button>
           <button _id="<?=$client->id ?>" _current_folder="clients" class="single">Modifier</button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
