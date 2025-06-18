<?php
session_start();
session_destroy(); // Destroy session

echo "<script>
    alert('✅ Successfully logged out!');
    window.location.href = 'index.php'; // Redirect to home page
</script>";
?>
