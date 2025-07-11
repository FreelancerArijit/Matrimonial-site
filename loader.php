<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bootstrap 4.6 Page Loader</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap 4.6 CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Loader Overlay Styles */
    #loader {
      position: fixed;
      width: 100%;
      height: 100%;
      background: #fbe9ef;
      top: 0;
      left: 0;
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
</head>
<body>

  <!-- Loader -->
  <div id="loader">
    <div class="spinner-border text-primary" style="color: #c00745"; role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

 

  <!-- Bootstrap and jQuery Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Loader Script -->
  <script>
    // Hide loader and show content when page is fully loaded
    $(window).on('load', function () {
      $('#loader').fadeOut('slow', function () {
        $('#content').fadeIn('slow');
      });
    });
  </script>
</body>
</html>
