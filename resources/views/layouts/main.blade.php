@include('../partials/header')
  <body>
    @include('../partials/top_nav')

    <div class="container-fluid">
      <div class="row">
        @include('../partials/side_nav')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          @if(session('message'))
            <div class="alert alert-success" role="alert">
              {{session('message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          @yield('content')
        </main>
      </div>
    </div>
@include('../partials/footer')