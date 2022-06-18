<?php if (isset($contacts) && !empty($contacts)): ?>
    <?php foreach($contacts as $contact): ?>
        <div class="contacts">
           <input type="hidden" name="id" value="<?= $contact->id ?>">
           <p> <?=$contact->id." ".$contact->fname." ".$contact->lname." ".$contact->e_mail." ".$contact->birthdate." ".$contact->telephone." ".$contact->is_vet;?></p>
           <button _id="<?=$contact->id ?>" _current_folder="extraContacts" class="delete">Supprimer</button>
           <button _id="<?=$contact->id ?>" _current_folder="extraContacts" class="single">Modifier</button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
