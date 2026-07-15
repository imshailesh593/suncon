<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', $globalSettings['site.seo_title'] ?? 'Suncon Engineers | Architecture, Landscape & Interior Design')</title>
  <meta name="description" content="@yield('description', $globalSettings['site.seo_description'] ?? 'Suncon Engineers Pvt. Ltd. — ISO-certified multidisciplinary consultancy delivering architecture, landscape, interior design, BIM, PMC and infrastructure across India since 1999.')">
  <link rel="canonical" href="{{ url()->current() }}" />
  <link rel="alternate" hreflang="en"    href="{{ url()->current() }}" />
  <link rel="alternate" hreflang="en-in" href="{{ url()->current() }}" />
  <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />
  @if(!empty($globalSettings['site.ga_id']))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $globalSettings['site.ga_id'] }}"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','{{ $globalSettings['site.ga_id'] }}');</script>
  @endif
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('head')
  @php
    $orgSchema = [
      '@context' => 'https://schema.org',
      '@graph'   => [
        [
          '@type' => 'WebSite',
          '@id'   => url('/') . '/#website',
          'name'  => $globalSettings['site.name'] ?? 'Suncon Engineers',
          'url'   => url('/'),
        ],
        [
          '@type'         => 'ProfessionalService',
          '@id'           => url('/') . '/#organization',
          'name'          => $globalSettings['site.name'] ?? 'Suncon Engineers Pvt. Ltd.',
          'url'           => url('/'),
          'logo'          => url('/images/hero-bg.jpg'),
          'foundingDate'  => $globalSettings['site.founded'] ?? '1999',
          'email'         => $globalSettings['site.email'] ?? 'bd@sunconengineers.com',
          'telephone'     => $globalSettings['site.phone'] ?? '+91 93716 54387',
          'areaServed'    => 'India',
          'address'       => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'P1/9, Sai Palace, Bhusari Colony (Right), Paud Road, Kothrud',
            'addressLocality' => 'Pune',
            'addressRegion'   => 'Maharashtra',
            'postalCode'      => '411038',
            'addressCountry'  => 'IN',
          ],
          'sameAs' => array_values(array_filter([
            $globalSettings['site.social_instagram'] ?? '',
            $globalSettings['site.social_linkedin']  ?? '',
            $globalSettings['site.social_facebook']  ?? '',
            $globalSettings['site.social_youtube']   ?? '',
          ])),
        ],
      ],
    ];
  @endphp
  <script type="application/ld+json">{!! json_encode($orgSchema, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
  @stack('schema')
</head>
<body class="bg-[#FAF7F3] text-[#1C1C1C] font-body antialiased overflow-x-hidden hide-cursor">

  <div id="cursor-dot"  class="fixed top-0 left-0 w-[8px] h-[8px] rounded-full pointer-events-none z-[9999] -translate-x-1/2 -translate-y-1/2" style="background:#1C1C1C;"></div>
  <div id="cursor-ring" class="fixed top-0 left-0 w-[36px] h-[36px] rounded-full pointer-events-none z-[9998] -translate-x-1/2 -translate-y-1/2" style="border:1.5px solid rgba(28,28,28,0.5);"></div>

  @include('partials.navbar')

  <main>@yield('content')</main>

  @include('partials.footer')

</body>
</html>
