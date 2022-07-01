url = "modelo/modelo_user.php";
let app = new Vue({
    el: "#main",
    data: {
        name: 'Primeros pasos con vue js',
        nUserList: []
        /*  js_nombre: "",
         registros: [],
         js_apellidoPaterno: "",
         js_apellidoMaterno: "",
         js_edad: "",
         js_sexo: "",
         js_foto: "",
         save_id: [] */
    },
    methods: {
        listardatos() {
            var formData = new FormData();
            formData.append("option", 4);
            axios.post(url, formData).then((response) => {
                this.nUserList = response.data;
                /* this.cleartable(); */
            });
        },
        deleteUser(id) {

            swal({
                title: "¿Eliminar este registro?",
                text: "Una vez eliminado, no podrá  revertir los cambios!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        actionDelete(id);
                        swal("Eliminacion exitosa ", {
                            icon: "success",
                        });
                        this.listardatos();
                    } 
                });

        }

    },
    created: function () {
        this.listardatos();
    }
});



function actionDelete(key) {

    var formData = new FormData();
    formData.append("option", 2);
    formData.append("key_user", key);
    axios.post(url, formData).then((response) => {
       /*  alert(response.data); */
    });
}
