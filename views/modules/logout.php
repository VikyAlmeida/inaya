<?php
    unset($_SESSION["user"]);
?>
<script>
    sessionStorage.setItem('logout', 0);
    window.location='home';
</script>