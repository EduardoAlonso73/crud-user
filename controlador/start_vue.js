url = "modelo/modelo_user.php";
let app = new Vue({
    el: "#main",
    data: {
        nUserList: [],
        idUser: 0
    },
    methods:{
        submit: function(e){  
            var form = document.getElementById("datos_user");
            var formData = new FormData(form);
            formData.append("option", 1);
            axios.post(url, formData).then(
                (response) => {
                    alertSuccessful(response.data);
                    this.listardatos();
                }
            );
        },
        listardatos() {
            var formData = new FormData();
            formData.append("option", 4);
            axios.post(url, formData).then((response) => {
                this.nUserList = response.data;
            });
        },
        deleteUser(id){ 
            Swal.fire({
                title: "¿Eliminar este registro?",
                text: "Una vez eliminado, no podrá  revertir los cambios!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData();
                    formData.append("option", 2);
                    formData.append("key_user", id);
                    axios.post(url, formData).then((response) => {
                      Swal.fire( 'Eliminado!', response.data,'success'); 
                      this.listardatos();
                    }); 
                }
            })
        },
        getDataUser(userDt) {
            document.getElementById("updat_user").value = userDt.username;
            document.getElementById("updat_email").value = userDt.email;
            document.getElementById("updat_passwor").value = userDt.created_at;
            this.idUser = userDt.id; 
        },
        updateUser(){
            let id = this.idUser;
            var form = document.getElementById("datosEdit");
            var formData = new FormData(form);
            formData.append("option", 3);
            formData.append("key_user", id);
            axios.post(url, formData).then(
                (response) => {
                    alertSuccessful(response.data);
                    this.listardatos();
                }
            );
        }
    },
    created: function () {
        this.listardatos();
    }
});

function alertSuccessful(message) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500
    })
}