<?php

if (file_exists("/xampp/htdocs/contactos_app/static/contacts.json")) {
  $contacts = [json_decode(file_get_contents("/xampp/htdocs/contactos_app/static/contacts.json"), true)];
} else {
  $contacts = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
include "/xampp/htdocs/contactos_app/static/head.php";
?>

<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand">Mis Contactos</a>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Contacto" aria-label="Contacto" />
        <button class="btn btn-secondary" type="submit">Buscar</button>
      </form>
      <div class="btn-group dropstart">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Menú
        </button>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
          <li><a class="dropdown-item" href="index.php">Contactos</a></li>
          <li><a class="dropdown-item" href="static/add.php">Añadir contacto</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <main>
    <div class="container d-flex align-items-center justify-content-center" id="container-" style="height: 100vh;">

      <?php if (count($contacts) == 0) : ?>
        <div class="card text-center border-light m-4" style="width: 15rem; height: 15rem;" id="card">
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title mb-2">No tienes ningún contacto agregado.</h5>
            <div class="container d-flex justify-content-center flex-wrap mt-3">
              <a href="../contactos_app/static/add.php" class="btn btn-primary mt-4">Añade uno presionando aquí!</a>
            </div>
          </div>
        </div>
      <?php endif ?>

      <?php foreach ($contacts as $contact) : ?>
        <div class="card text-center border-light m-4" style="width: 18rem;" id="card">
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title mb-2"><?= $contact["name"] ?></h5>
            <p class="card-text m-1"><?= $contact["phone_number"] ?></p>
            <div class="container d-flex justify-content-center mt-3">
              <a href="#" class="btn btn-secondary m-1">Editar</a>
              <a href="#" class="btn btn-danger m-1">Borrar</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </main>
</body>

</html>