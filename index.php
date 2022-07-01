<!DOCTYPE html>
<html lang="en">

<head>
    <title> Registros</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <main id="main">
        <div class="container mt-5">
            <div class="row">


                <div class="col-md-0">
                    <h1>{{name}}</h1>
                    <table class="table table-striped table-hover">
                        <thead class=" table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Fecha</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item of nUserList">
                                <td>{{item.id}}</td>
                                <td>{{item.username}}</td>
                                <td>{{item.email}}</td>
                                <td>{{item.created_at}}</td>
                                <td><button type='button' class='btn btn-danger' id='eliminar' @click="deleteUser(item.id)">Eliminar</button></td>
                                <td><button type='button' class='btn btn-success ' id='Editar' @click="fn_editar()" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Editar</button></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </main>
    
    <?php require('html/modal_update.html'); ?>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="controlador/start_vue.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>