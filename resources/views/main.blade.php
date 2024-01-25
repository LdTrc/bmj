<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
    <link href="{{asset('css/notif.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}"
        rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}
    <style>
      .star-rating {
      font-size: 32px; /* Ukuran bintang, sesuaikan dengan keinginan Anda */
      color: lightgray; /* Warna bintang kosong, sesuaikan dengan keinginan Anda */
      cursor: pointer;
    }
    .star-rating:hover,
    .star-rating.selected {
      color: gold; /* Warna bintang terisi, sesuaikan dengan keinginan Anda */
    }
    </style>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('slidebar')

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            @include('navbar')
            @yield('container')

        </div>
        <!-- End of Main Content -->

        @include('footer')

      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form action="/logout" method="POST">
            @csrf
            <a class="btn btn-primary" type="submit">Logout</a>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js') }}"></script>
    <script src="{{ asset('js/notif.js') }}"></script>

    {{-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

    {{-- <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> --}}
    <script>
      function updateStarRating(event) {
      // Menanggapi klik pada bintang
      const starContainer = document.getElementById('starContainer');
      const starRatingElement = document.getElementById('starRating');

      if (event.target.classList.contains('star-rating')) {
        // Mendapatkan nilai bintang yang diklik
        const selectedValue = event.target.getAttribute('data-value');

        // Menetapkan nilai bintang yang dipilih ke elemen dengan ID "starRating"
        starRatingElement.textContent = selectedValue;

        // Mengisi semua bintang sebelumnya
        const allStars = starContainer.querySelectorAll('.star-rating');
        allStars.forEach((star, index) => {
          if (index < selectedValue) {
            star.classList.add('selected');
          } else {
            star.classList.remove('selected');
          }
        });
      }
    }
    </script>
</body>
</html>