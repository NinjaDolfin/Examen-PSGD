<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Escale Canine</title>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="/scripts/script.js"></script>
  </head>
  <body>
    <?php
    include('../autoload.php');
    ?>

     <div class="update">
       <nav>
         <button _id="animals" class="navigation">Animaux</button>
         <button _id="bookings" class="navigation">Séjours</button>
         <button _id="clients" class="navigation">Clients</button>
         <button _id="extraContacts" class="navigation">Autres Contacts</button>
         <button _id="postalCodes" class="navigation">Codes Postals</button>
         <button _id="races" class="navigation">Races</button>
       </nav>
       <?php $router = new Router(); ?>
     </div>
  </body>
</html>
