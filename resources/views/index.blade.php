<!DOCTYPE html>
<html>
    @include('partials/header')
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a href="#" class="navbar-brand">Potion API - Twitter like in Laravel PHP</a>

      <div id="user_dropdown" class="dropdown">
        <button
          class="btn btn-secondary dropdown-toggle"
          type="button"
          id="dropdownUserButton"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Change Current User
        </button>
        <div
          class="dropdown-menu dropdown-menu-right"
          aria-labelledby="dropdownUserButton"
        ></div>
      </div>
    </nav>

    <div class="container-fluid gedf-wrapper">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 gedf-main">
          @include('partials/status_form')
          <div id="stream"></div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>

    @include('partials/footer')

  </body>
</html>
