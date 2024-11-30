<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Dashboard Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <style>
      .sidebar {
  display: flex;
  flex-direction: column;
  height: 100vh; /* Mengatur tinggi sidebar menjadi 100% tinggi viewport */
}

.offcanvas-body {
  flex: 1; /* Membuat body fleksibel memenuhi ruang yang tersisa */
  display: flex;
  flex-direction: column;
  overflow-y: auto; /* Pastikan scroll bekerja jika konten terlalu banyak */
}

.nav {
  flex-grow: 1; /* Mengisi ruang kosong */
}

.sidebar-heading,
hr,
.nav:last-child {
  margin-top: auto; /* Menempatkan elemen di bagian bawah */
}

    </style>
  </head>
  <body>
    
    @include('layout.svg')

    @include('layout.header')

  <div class="container-fluid">
    <div class="row">
      
      @include('layout.sidebar')

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        @yield('content')
        
      </main>
    </div>
  </div>

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="{{ asset('js/dashboard.js') }}"></script></body>
</html>
