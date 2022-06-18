<?php if (isset($client) && !empty($client)): ?>
  <p> <?=$client->id." ".$client->fname." ".$client->lname." ".$client->e_mail." ".$client->birthdate." ".$client->telephone." ".$client->address." ".$client->postal_code->id;?></p>
  <div class="client">
    <form action="/clients/edit" method="post">
      <input type="hidden" name="id" value="<?= $client->id ?>">

      <label for="fname">Nouveaux prénom:</label>
      <input type="text" name="fname" value="<?= $client->fname ?>"><br>

      <label for="lname">Nouveaux nom:</label>
      <input type="text" name="lname" value="<?= $client->lname ?>"><br>

      <label for="e_mail">Nouveaux e-mail:</label>
      <input type="email" name="e_mail" value="<?= $client->e_mail ?>"><br>

      <label for="telephone">Nouveaux numéro de téléphone:</label>
      <input type="tel" name="telephone" value="<?= $client->telephone ?>"><br>

      <label for="postal_code">Nouveaux code postal:</label>
      <input type="text" name="postal_code" value="<?= $client->postal_code->id ?>"><br>

      <label for="address">Nouvelle address:</label>
      <input type="text" name="address" value="<?= $client->address ?>"><br>

      <input type="submit" _id="<?=$client->id?>" _current_folder="clients" value="Confirmer">
    </form>
  </div>
<?php endif; ?>
