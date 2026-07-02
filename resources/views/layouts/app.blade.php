<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', $globalSettings['site.seo_title'] ?? 'Suncon Engineers | Architecture, Landscape & Interior Design')</title>
  <meta name="description" content="@yield('description', $globalSettings['site.seo_description'] ?? 'Suncon Engineers Pvt. Ltd. — ISO-certified multidisciplinary consultancy delivering architecture, landscape, interior design, BIM, PMC and infrastructure across India since 1999.')">
  @if(!empty($globalSettings['site.ga_id']))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $globalSettings['site.ga_id'] }}"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','{{ $globalSettings['site.ga_id'] }}');</script>
  @endif
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,200;0,9..144,300;0,9..144,400;0,9..144,500;1,9..144,200;1,9..144,300;1,9..144,400&family=Outfit:wght@200;300;400;500&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('head')
</head>
<body class="bg-[#FAF7F3] text-[#1C1C1C] font-body antialiased overflow-x-hidden">

  <div id="cursor-dot"  class="fixed top-0 left-0 w-[7px] h-[7px] bg-[#B5451B] rounded-full pointer-events-none z-[9999] -translate-x-1/2 -translate-y-1/2 transition-transform duration-100"></div>
  <div id="cursor-ring" class="fixed top-0 left-0 w-[36px] h-[36px] border border-white rounded-full pointer-events-none z-[9998] -translate-x-1/2 -translate-y-1/2"></div>

  @include('partials.navbar')

  <main>@yield('content')</main>

  @include('partials.footer')

</body>
</html>
