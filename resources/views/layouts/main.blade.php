<!doctype html>
<html lang="{{ $lang }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="manifest" href="{{ asset('/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    <title>{{ ($page->meta_title != null) ? $page->meta_title : $page->site->meta_title }}</title>
    <meta name="description" content="{{ ($page->meta_description != null) ? $page->meta_description : $page->site->meta_description }}">

    @if($page->form_id)
        {{-- reCAPTCHA --}}
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('distinct/css/app.css') }}">

    {{-- JSON SCHEMA --}}
    {!! $page->site->schema !!}


    <link rel="canonical" href="{{ url($page->perman_link) }}" />

    {{-- META SOCIALES --}}
    <meta name="dc.title" content="{{ ($page->meta_title != null) ? $page->meta_title : $page->site->meta_title }}" />
    <meta name="dc.description" content="{{ ($page->meta_description != null) ? $page->meta_description : $page->site->meta_description }}" />
    <meta name="dc.source" content="{{ url($page->perman_link) }}" />

    <meta property="og:locale" content="{{ $lang }}"/>
    <meta property="og:locale:alternate" content="{{ ($lang == 'en') ? 'es' : 'en' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ ($page->meta_title != null) ? $page->meta_title : $page->site->meta_title }}" />
    <meta property="og:description" content="{{ ($page->meta_description != null) ? $page->meta_description : $page->site->meta_description }}" />
    <meta property="og:url" content="{{ url($page->perman_link) }}" />
    <meta property="og:site_name" content="{{ $page->site->name }}" />
    <meta property="og:image" content="{{ ($featured = $page->getFirst('featured_image')) ? url($featured->path) : '#' }}" />

    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/favicon/favicon-96x96.png')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/favicon/apple-icon-57x57.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon/favicon-16x16.png')}}">

    {{-- <!-- Google Tag Manager --> --}}

    {{--

    Descomentar y añadir ID de Google Analytics

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','<ID de Google Analytics>');</script>
    --}}

    {{-- <!-- End Google Tag Manager --> --}}
</head>
<body class="body m6">

{{-- <!-- Google Tag Manager (noscript) --> --}}
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZHJHVC"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
{{-- <!-- End Google Tag Manager (noscript) --> --}}

{{-- Descomentar cuando las navegaciones estén creadas  --}}
{{-- @includeWhen($page, 'partials.nav') --}}
@includeWhen($page, 'templates.'.$page->template)
{{-- Decomentar cuando el footer estén creado  --}}
{{-- @includeWhen($page, 'partials.footer') --}}

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript" async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript" async></script>
<script type="text/javascript" async>!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>

<script src="{{ asset('/js/app.js') }}" async></script>

{{-- Descomentar cuando existan las opciones de Especial para las páginas --}}
{{-- @if($page->special)
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c9c52d6bb141953" async></script>
@endif --}}

</body>
</html>
