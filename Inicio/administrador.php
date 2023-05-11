<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="../css/cursos.css">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


</head>

<body>

    <!-- Inicio header -->

    <header>

        <div id="menu" class="fa-solid fa-bars"></div>

        <a href="#" class="logo"> <i class="fa-solid fa-user-graduate"> </i> LOGO </a>

        <nav class="navbar">

            <ul>

                <li><a class="active" href="#home">Inicio</a></li>
                <li><a href="#">Actulizar mis datos</a></li>
                <li><a href="#informacion">Información</a></li>

            </ul>

        </nav>

        <div id="login" class="fas fa-user-circle"></div>

    </header>

    <!-- Fin del header -->

    <!-- Imagen fondo -->

    <section class="home" id="home">

        <h1>la planificación a largo plazo no es pensar en decisiones futuras,
            sino el futuro de las decisiones presentes
        </h1>
        <p>Manten tu información actualizada</p>
        <a href="#"><button class="btn"> Información </button></a>

        <div class="shape"></div>

    </section>

    <!-- Tabla de la informacion que va ver el administrador -->
    <section class="#informacion" id="informacion">

        <div class="table">
            <div class="table_header">
                <p>Informacion</p>
                <div>

                </div>
            </div>
            <div class="table_section">

                <table>

                    <thead>

                        <tr>

                            <th>Dato</th>
                            <th>Accion</th>

                        </tr>

                        <tr>

                            <td>Cursos</td>
                            <td>

                                <a href="../IUsuario/InfoUsers.php"><button><i
                                            class="bi bi-info-circle-fill"></i></button></a>


                            </td>

                        </tr>
                        <tr>

                            <td>Profesores</td>
                            <td>

                                <a href="../IProfesor/InfoTeacher.php"><button><i
                                            class="bi bi-info-circle-fill"></i></button></a>


                            </td>

                        </tr>
                        <tr>

                            <td>Usuarios</td>
                            <td>

                                <a href="../IUsuario/InfoUsers.php"><button type="submitñ"><i
                                            class="bi bi-info-circle-fill"></i></button></a>

                            </td>

                        </tr>
                        <tr>

                            <td>Pagos</td>
                            <td>

                                <a href="../IUsuario/InfoUsers.php"><button type="submit"><i
                                            class="bi bi-info-circle-fill"></i></button></a>


                            </td>

                        </tr>

                    </thead>

                </table>

            </div>

        </div>


    </section>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>

</body>

</html>