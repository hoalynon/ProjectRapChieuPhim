
  <meta charset="UTF-8">
  <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
  <title>{{ $title }}</title>
  <link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />      
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/template/css/menu.css">

  @yield('head')