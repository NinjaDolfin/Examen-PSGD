<?php if (isset($contact) && !empty($contact)): ?>
  <?php var_dump($contact); ?>
  <p> <?=$contact->id." ".$contact->fname." ".$contact->lname." ".$contact->telephone." ".$contact->is_vet;?></p>
  <div class="extra_contact">
    <form action="/extraContacts/edit" method="post">
      <input type="hidden" name="id" value="<?= $contact->id ?>">

      <label for="fname">Nouveaux prénom:</label>
      <input type="text" name="fname" value="<?= $contact->fname ?>"><br>

      <label for="lname">Nouveaux nom:</label>
      <input type="text" name="lname" value="<?= $contact->lname ?>"><br>

      <label for="telephone">Nouveaux numéro de téléphone:</label>
      <input type="tel" name="telephone" value="<?= $contact->telephone ?>"><br>

      <label for="is_vet">Est vétérinaire?:</label>
      <input type="text" name="is_vet" value="<?= $contact->is_vet ?>"><br>

      <input type="submit" _id="<?=$contact->id?>" _current_folder="extraContacts" value="Confirmer">
    </form>
  </div>
<?php endif; ?>
