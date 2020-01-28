<head>
  <title>Potion API - Twitter like in Laravel PHP</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous"
  />

  <style>
    body {
      background-color: #eeeeee;
    }

    .h7 {
      font-size: 0.8rem;
    }

    .gedf-wrapper {
      margin-top: 0.97rem;
    }

    .gedf-card {
      margin-bottom: 2.77rem;
    }

    @media (min-width: 992px) {
      .gedf-main {
        padding-left: 4rem;
        padding-right: 4rem;
      }
    }

    /**Reset Bootstrap*/
    .dropdown-toggle::after {
      content: none;
      display: none;
    }

    .btn.is-loading {
      position: relative;
      color: transparent !important;
      pointer-events: none;
    }

    .btn.is-loading * {
      color: transparent !important;
    }

    .btn.is-loading:after {
      animation: rotate-loading 0.4s infinite linear;
      border: 2px solid #fff;
      border-radius: 50%;
      border-right-color: transparent;
      border-top-color: transparent;
      content: "";
      display: block;
      height: 16px;
      width: 16px;
      position: absolute;
      left: 50%;
      margin-left: -8px;
      margin-top: -8px;
      top: 50%;
    }

    #stream {
      position: relative;
    }

    .loader {
      animation: rotate-loading 0.4s infinite linear;
      border: 2px solid rgb(31, 30, 30);
      border-radius: 50%;
      border-right-color: transparent;
      border-top-color: transparent;
      display: block;
      height: 32px;
      width: 32px;
      position: absolute;
      left: 50%;
      margin-left: -16px;
    }

    @keyframes rotate-loading {
      from {
        transform: rotate(0deg);
      }
      to {
        transform: rotate(359deg);
      }
    }
  </style>
</head>
