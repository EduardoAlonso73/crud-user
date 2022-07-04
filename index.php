<!DOCTYPE html>
<html lang="en">

<head>
    <title> Registros</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
<link rel="stylesheet" href="./css/loadInit.css">
</head>

<body>
        <main id="main" >
        <div class="container mt-0">
            <br>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"> <i class="fa-solid fa-user-plus"></i></button>
            <br><br>
            <div class="row">


                <div class="col-md-0">
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
                                <td><button type='button' class='btn btn-danger' id='eliminar' @click="deleteUser(item.id)"><i class="fa-solid fa-trash"></i></button></td>
                                <td><button type='button' class='btn btn-success ' id='Editar' @click="getDataUser(item)" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-pen-to-square"></i></button></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    
        <?php require('html/modal_add_user.html'); ?>
        <?php require('html/modal_update.html'); ?>

        <div v-show="loading" class="loadStart">
		<img src="./img/load1.gif" alt="..." id="img-load">
        </div>
    

    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="controlador/start_vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7f91a4ca25.js" crossorigin="anonymous"></script>

</body>

</html>