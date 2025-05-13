<?php
session_start();
session_destroy();
?>

<script>
    localStorage.removeItem('token');
    localStorage.removeItem('username');
    window.location.href = 'login.php';
</script>
