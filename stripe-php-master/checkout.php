<?php require('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Pay with Stripe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
  <form action="create-checkout-session.php" method="POST" style = "text-align: center;">
    <div class="p-5 text-center bg-body-tertiary rounded-3">
    <svg class="bi mt-4 mb-3" style="color: var(--bs-indigo);" width="100" height="100" aria-hidden="true"><use xlink:href="#bootstrap"></use></svg>
    <h1 class="text-body-emphasis">Donate Us</h1>
    <p class="col-lg-8 mx-auto fs-5 text-muted">
      Please help us spread the teachings of Srimad Bhagawad Geeta and Srimad Bhagawatam, which will make this world a better place. Your small contribution will be always remembered by the lord. Thank you for your valuable contribution. Hare Krishna!. 
    </p>
    <div class="d-inline-flex gap-2 mb-5">
      <button class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="submit">
        Pay ₹50
        <svg class="bi ms-2" width="24" height="24" aria-hidden="true"><use xlink:href="#arrow-right-short"></use></svg>
      </button>
      
    </div>
  </div>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
