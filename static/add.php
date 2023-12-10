<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $contact = [
    "name" => $_POST["name"],
    "phone_number" => $_POST["phone_number"]
  ];

  if (file_exists("contacts.json")) {
    $contacts = json_decode(file_get_contents("contacts.json"), true);
  } else {
    $contacts = [];
  }


  $contacts[] = $contact;

  file_put_contents("contacts.json", json_encode($contact), true);

  header("Location: ../index.php");
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
          <li><a class="dropdown-item" href="../index.php">Contactos</a></li>
          <li><a class="dropdown-item" href="add.php">Añadir contacto</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-4 d-flex align-items-center" style="height: 100vh;">
    <div class="row justify-content-center" style="width: 100vw;">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-body-tertiary text-dark">Añadir nuevo contacto:</div>
          <p class="text-danger">
          </p>
          <div class="card-body">
            <form method="POST" action="../static/add.php">
              <div class="mb-3 row">
                <label for="name" class="col-md-4 col-form-label text-md-end">Apellido y Nombre</label>
                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="phone_number" class="col-md-4 col-form-label text-md-end">Número telefónico</label>
                <div class="col-md-6">
                  <input id="phone_number" type="tel" class="form-control" name="phone_number" required autocomplete="phone_number" autofocus>
                </div>
              </div>
              <div class="mb-3 row">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>