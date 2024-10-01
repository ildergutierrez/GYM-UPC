<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GYM UPC</title>
  <link
    href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet" />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />
  <link rel="stylesheet" href="../../assets/boostrap/css/bootstrap.min.css" />
  <link rel="icon" href="../../img/logo/Logo.png" />
</head>
<style>
  .nav-link:hover {
    border-bottom: solid 4px #ffcc53;
  }

  .dropdown-item {
    color: #ffffff;
    font-weight: bold;
  }

  .dropdown-item:hover {
    background: #ffffff;
    color: #000000;
    border: solid 2px #ffcc53;
    border-radius: 15px;
  }

  @media screen and (max-width: 900px) {
    main .container .d-flex img {
      position: fixed;
      top: 15px;
      left: 2px;
      width: 30%;
    }
  }

  @media screen and (max-width: 1200px) {
    main .container .d-flex img {
      position: fixed;
      top: 15px;
      left: 8px;
      width: 13%;
    }
  }
</style>

<body style="background: #1e1e1e">
  <header>
    <nav
      class="navbar navbar-expand-lg"
      style="
          padding-top: 30px;
          padding-bottom: 0px;
          background: #0b7f46;
          border-top: solid 4px #ffcc53;
        ">
      <div class="container-fluid" style="color: white">
        <a class="navbar-brand" href="#"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
          onclick="logo()">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul
            class="navbar-nav justify-content-end ms-auto mt-3 mb-2 mb-lg-0"
            style="width: 250%">
            <li class="nav-item">
              <a
                class="nav-link active"
                href="#"
                style="
                    color: #ffffff;
                    padding-right: 30px;
                    font-weight: bold;
                    font-size: 14px;
                    border-bottom: solid 4px #ffcc53;
                  "><span class="material-icons" style="vertical-align: middle">home</span>
                INICIO</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                style="color: #ffffff; padding-right: 30px; font-weight: bold"><span class="material-icons" style="vertical-align: middle">calendar_month</span>
                APARTAR CUPO</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                style="color: #ffffff; padding-right: 30px; font-weight: bold"><span class="material-icons" style="vertical-align: middle">qr_code</span>
                QR</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                style="color: #ffffff; padding-right: 30px; font-weight: bold"><span
                  class="material-symbols-outlined"
                  style="vertical-align: middle">cardiology</span>
                IMC</a>
            </li>
          </ul>
          <form
            class="d-flex justify-content-center align-items-center"
            style="width: 70%">
            <div
              class="container d-flex justify-content-center align-items-center"
              style="
                  width: 100%;
                  background: #ffcc53;
                  font-weight: bold;
                  border-radius: 10px;
                  margin-bottom: 3px;
                ">
              <div
                class="container d-flex justify-content-center align-items-center"
                style="padding: 0; width: 100%">
                <div
                  class="d-flex justify-content-center align-items-center"
                  style="
                      margin-top: 10px;
                      color: #000000;
                      font-size: 12px;
                      width: 95%;
                    ">
                  <p>Ilder Alberto Gutierrez Beleño</p>
                </div>
                <div class="dropdown" style="color: #000000">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"></a>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdown"
                    style="background: #1e1e1e">
                    <li>
                      <a class="dropdown-item" href="#">Configuración</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Cerrar Sesión</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container">
      <div
        class="d-flex"
        style="
            position: fixed;
            top: 25px;
            left: 40px;
            width: 20%;
            display: block;
          ">
        <img id="logo"
          style=" display: block;"
          src="../../img/logo/Logo.png"
          alt="Logo"
          width="50%"
          title="Logo" />
      </div>
      <div
        class="d-flex"
        style="position: fixed; top: 25px; left: 40px; width: 20%">
        <img
          id="logo_2"
          src="../../img/logo/Logo.png"
          alt="Logo"
          style="width: 6%; display: none"
          title="Logo" />
      </div>
    </div>
  </main>

  <footer>
    <div
      class="container-fluid"
      style="
          background-color: #0b7f46;
          padding-top: 25px;
          padding-bottom: 25px;
          border-top: solid 4px #ffcc53;
          position: fixed;
          bottom: 0;
        ">
      <div class="row">
        <div class="col-8" style="color: #ffffff; text-align: end">
          <h6>
            © copyright: Universidad Popular del Cesar, seccional Aguachica
          </h6>
        </div>
        <div class="col-4 d-flex justify-content-end">
          <div class="social-icons">
            <!-- Facebook -->
            <a
              href="https://www.facebook.com"
              target="_blank"
              style="color: #ffffff; margin-right: 16px">
              <i class="fab fa-facebook-f"></i>
            </a>

            <!-- Twitter -->
            <a
              href="https://www.twitter.com"
              target="_blank"
              style="color: #ffffff; margin-right: 16px">
              <i class="fab fa-twitter"></i>
            </a>

            <!-- Instagram -->
            <a
              href="https://www.instagram.com"
              target="_blank"
              style="color: #ffffff; margin-right: 16px">
              <i class="fab fa-instagram"></i>
            </a>

            <!-- LinkedIn -->
            <a
              href="https://www.linkedin.com"
              target="_blank"
              style="color: #ffffff; margin-right: 16px">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../js/bienvenida.js"></script>
</body>

</html>