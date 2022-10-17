<script src="./views/js/core.min.js"></script>
<script src="./views/js/script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="./views/js/sweetalert.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>

<script>
    const login = sessionStorage.getItem("login");
    if (login == 0) {
        SingIn.fire({
            icon: 'success',
            title: 'Ha iniciado sesion con exito!'
        })
        sessionStorage.removeItem("login");
    }

    const logout = sessionStorage.getItem("logout");
    if (logout == 0) {
        SingIn.fire({
            icon: 'success',
            title: 'Desconectado con exito!'
        })
        sessionStorage.removeItem("logout");
    }
    
    const accion = sessionStorage.getItem("accion");
    if (accion == 0) {
        const name = sessionStorage.getItem("name");
        Swal.fire(
            name,
            '',
            'success'
        )
        sessionStorage.removeItem("accion");
        sessionStorage.removeItem("name");
    }
</script>
<script>
  Dropzone.discover();
</script>