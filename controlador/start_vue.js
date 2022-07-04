let frmAdd = ["Adduser", "Addemail", "Addpasswor"];
const url = "modelo/modelo_user.php";
let app = new Vue({
    el: "#main",
    data: {
        nUserList: [],
        idUser: 0,
        usernameV: "",
        emailV: "",
        loading: false
    },
    methods: {
        submit: function (e) {
            let modalAdd = document.querySelector('#exampleModal');
            let modal = bootstrap.Modal.getInstance(modalAdd);
            let form = document.getElementById("datos_user");
            let formData = new FormData(form);
            formData.append("option", 1);
            axios.post(url, formData).then(
                (response) => {
                    alertSuccessful(response.data);
                    this.listardatos();
                    input_clear();
                    modal.hide();
                }
            );
        },
        async listardatos() {
            let formData = new FormData();
            formData.append("option", 4);
            await axios.post(url, formData).then((response) => {
                this.nUserList = response.data;
            });
        },
        deleteUser(id) {
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
                    let formData = new FormData();
                    formData.append("option", 2);
                    formData.append("key_user", id);
                    axios.post(url, formData).then((response) => {
                        alertSuccessful(response.data);
                        this.listardatos();
                    });
                }
            })
        },
        getDataUser(userDt) {
            const { username, email, id } = userDt;
            this.usernameV = username;
            this.emailV = email;
            this.idUser = id;
        },
        updateUser() {
            let modalUpdate = document.querySelector('#staticBackdrop');
            let modal = bootstrap.Modal.getInstance(modalUpdate);
            let id = this.idUser;
            let form = document.getElementById("datosEdit");
            let formData = new FormData(form);
            formData.append("option", 3);
            formData.append("key_user", id);
            axios.post(url, formData).then(
                (response) => {
                    alertSuccessful(response.data);
                    this.listardatos();
                    modal.hide();
                }
            );
        }
    },
    created: function () {
        this.loading = true;
        Promise.all([this.listardatos()]).then((err) => {
            this.loading = false;
        }).catch((err) => {
            this.loading = false;
        });
    }
});
/* *****************************************************
                 ---OTHER FUNCTION ---
 ***************************************************** */
function alertSuccessful(message) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500
    })
}
function input_clear() {

    frmAdd.forEach(function (frmAdd) {
        document.getElementById(frmAdd).value = "";

    })
}
