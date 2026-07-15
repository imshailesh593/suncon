{{-- Inline SVG icon set for BIM service pages.
     Usage: @include('bim.partials.service-icon', ['icon' => 'building', 'class' => 'w-6 h-6'])
     All icons are 24×24, stroke = currentColor so they inherit the accent colour. --}}
@php
  $icons = [
    // ── Building disciplines ──────────────────────────────
    'building'  => '<path d="M4 21V4a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v17M14 9h5a1 1 0 0 1 1 1v11M3 21h18M7 7h1M11 7h1M7 11h1M11 11h1M7 15h1M11 15h1M17 13h.5M17 17h.5"/>',
    'frame'     => '<path d="M3 20h18M4 20 12 6l8 14M6 20l6-9 6 9M9 20l3-4.5 3 4.5"/>',
    'pipes'     => '<path d="M3 8h7a3 3 0 0 1 3 3v0a3 3 0 0 0 3 3h5M4 5v6M4 8H3M21 11v6M17 20h-3"/><circle cx="4" cy="5" r="1"/>',
    'snow'      => '<path d="M12 2v20M3.5 7l17 10M20.5 7l-17 10M12 6l-2.2 1.3M12 6l2.2 1.3M12 18l-2.2-1.3M12 18l2.2 1.3M5.7 9.5l.2 2.5M18.3 14.5l-.2-2.5M18.3 9.5l-.2 2.5M5.7 14.5l.2-2.5"/>',
    'fire'      => '<path d="M12 3s4.5 3.5 4.5 8.5a4.5 4.5 0 0 1-9 0c0-1.7.8-2.8.8-2.8s.4 1.7 1.9 2C10.2 8 12 6 12 3z"/>',
    'factory'   => '<path d="M3 21V11l6 3.5V11l6 3.5V7l6 3v11H3z"/><path d="M7 21v-3M12 21v-3M17 21v-3"/>',
    'office'    => '<rect x="4" y="3" width="16" height="18" rx="1"/><path d="M8 7h2M14 7h2M8 11h2M14 11h2M8 15h2M14 15h2M10 21v-2.5h4V21"/>',
    'hospital'  => '<rect x="4" y="3" width="16" height="18" rx="1"/><path d="M12 7.5v5M9.5 10h5M10 21v-3h4v3"/>',
    // ── Infrastructure ────────────────────────────────────
    'road'      => '<path d="M7 21 9 3M17 21 15 3M12 5v2.5M12 10.5v2.5M12 16.5v2.5"/>',
    'rain'      => '<path d="M7.5 15a4 4 0 1 1 .9-7.9A5 5 0 0 1 18 8.3a3.5 3.5 0 0 1 .3 6.7M8 18.5l-1 2.5M12 18.5l-1 2.5M16 18.5l-1 2.5"/>',
    'sewer'     => '<circle cx="12" cy="12" r="8"/><path d="M4 12h16M12 4v16M6.3 6.3l11.4 11.4M17.7 6.3 6.3 17.7"/>',
    'tap'       => '<path d="M2 8h7v3H2zM9 9.5h4a4 4 0 0 1 4 4M17 13.5V16M13.5 20h7M17 16.5a1.75 1.75 0 0 0-1.75 1.75V20h3.5v-1.75A1.75 1.75 0 0 0 17 16.5z"/>',
    'layers'    => '<path d="M12 3 2.5 8 12 13l9.5-5L12 3zM2.5 12 12 17l9.5-5M2.5 16 12 21l9.5-5"/>',
    'bridge'    => '<path d="M2 9c4-2.5 6-3 10-3s6 .5 10 3M3 9v9M21 9v9M2 13h20M8 13v5M12 13v5M16 13v5M2 18h20"/>',
    'waves'     => '<path d="M2 8c2 0 2.5 1.8 4.5 1.8S9 8 11 8s2.5 1.8 4.5 1.8S18 8 20 8M2 13c2 0 2.5 1.8 4.5 1.8S9 13 11 13s2.5 1.8 4.5 1.8S18 13 20 13M2 18c2 0 2.5 1.8 4.5 1.8S9 18 11 18s2.5 1.8 4.5 1.8S18 18 20 18"/>',
    'city'      => '<path d="M3 21V9l5-2.5V21M11 21V4l5 2.5V21M3 21h18M16 21v-8l4-2v10M6 12h1.5M6 15.5h1.5M12.5 9h1.5M12.5 12.5h1.5M12.5 16h1.5"/>',
    // ── Digital engineering ───────────────────────────────
    'cube'      => '<path d="M12 2.5 3 7.5v9l9 5 9-5v-9l-9-5zM3 7.5l9 5 9-5M12 12.5v9"/>',
    'network'   => '<circle cx="12" cy="4.5" r="2.2"/><circle cx="4.5" cy="19" r="2.2"/><circle cx="19.5" cy="19" r="2.2"/><path d="M12 6.7v3.8M11 11 5.6 17M13 11l5.4 6"/>',
    'alert'     => '<path d="M12 3 2 20.5h20L12 3z"/><path d="M12 10v4.5M12 17.5h.01"/>',
    'calendar'  => '<rect x="3" y="4.5" width="18" height="16" rx="2"/><path d="M3 9.5h18M8 2.5v4M16 2.5v4M12 13v3l2 1.2"/>',
    'database'  => '<ellipse cx="12" cy="5.5" rx="8" ry="3"/><path d="M4 5.5v13c0 1.7 3.6 3 8 3s8-1.3 8-3v-13M4 12c0 1.7 3.6 3 8 3s8-1.3 8-3"/>',
    'clipboard' => '<path d="M9 4H6a1 1 0 0 0-1 1v15a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-3"/><rect x="9" y="2.5" width="6" height="3.5" rx="1"/><path d="M8.5 11h7M8.5 14.5h7M8.5 18h4"/>',
    // ── Reality capture ───────────────────────────────────
    'scanner'   => '<circle cx="12" cy="5.5" r="3"/><path d="M12 8.5v3.5M5.5 21 12 12l6.5 9M9 16.5h6M12 2.5V2"/>',
    'drone'     => '<circle cx="5" cy="6" r="2"/><circle cx="19" cy="6" r="2"/><path d="M3 6h4M17 6h4M5 8v1.5h14V8M9.5 9.5 8.5 13h7l-1-3.5M9.5 13h5v2.5h-5z"/>',
    'scatter'   => '<circle cx="6" cy="8" r=".9"/><circle cx="10" cy="5" r=".9"/><circle cx="14" cy="7" r=".9"/><circle cx="18" cy="5.5" r=".9"/><circle cx="8" cy="12" r=".9"/><circle cx="12" cy="11" r=".9"/><circle cx="16" cy="13" r=".9"/><circle cx="6" cy="16" r=".9"/><circle cx="11" cy="16" r=".9"/><circle cx="15" cy="18" r=".9"/><circle cx="19" cy="16" r=".9"/>',
    'convert'   => '<path d="M4 9h12l-3.5-3.5M20 15H8l3.5 3.5"/>',
    'digitize'  => '<rect x="3" y="3.5" width="7" height="7" rx="1"/><rect x="14" y="3.5" width="7" height="7" rx="1"/><rect x="3" y="13.5" width="7" height="7" rx="1"/><path d="M14 13.5h7M14 17h7M14 20.5h4"/>',
    'landmark'  => '<path d="M3 21h18M12 3 4 8h16l-8-5zM5 21V11M9.3 21V11M14.7 21V11M19 21V11M4 11h16"/>',
    'chip'      => '<rect x="6" y="6" width="12" height="12" rx="1.5"/><path d="M9.5 9.5h5v5h-5zM9 3v3M15 3v3M9 18v3M15 18v3M3 9h3M3 15h3M18 9h3M18 15h3"/>',
    // ── Value-prop / why-choose (generic) ─────────────────
    'sync'      => '<path d="M20.5 12a8.5 8.5 0 1 1-2.6-6.1M20.5 4v4.5H16"/>',
    'users'     => '<circle cx="9" cy="8" r="3"/><path d="M3.5 20a5.5 5.5 0 0 1 11 0M16 5.5a3 3 0 0 1 0 6M15.5 20h5a5 5 0 0 0-4-4.9"/>',
    'coins'     => '<circle cx="12" cy="12" r="8.5"/><path d="M12 6.5v11M14.3 9a2.6 2.1 0 0 0-2.3-1.3c-1.5 0-2.6.9-2.6 2s1 1.7 2.6 2.1 2.6 1 2.6 2.1-1.1 2-2.6 2A2.6 2.1 0 0 1 9.7 15"/>',
    'leaf'      => '<path d="M4 20c0-8.5 6.5-14 16-14 0 10-6 15.5-14 15.5M4.5 19.5S8 13 14 10"/>',
    'target'    => '<circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="4.5"/><circle cx="12" cy="12" r="1"/>',
    'shield'    => '<path d="M12 3 5 6v5.5c0 4.5 3 8 7 9.5 4-1.5 7-5 7-9.5V6l-7-3z"/><path d="M9 12l2 2 4-4.2"/>',
    'clock'     => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7v5.2l3.2 2"/>',
    'globe'     => '<circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17M12 3.5c3 2.6 3 14.4 0 17M12 3.5c-3 2.6-3 14.4 0 17"/>',
    'tools'     => '<path d="M15.5 7.2a3.8 3.8 0 0 1-5 5L5 17.7 6.3 19l1.3 1.3L13 15a3.8 3.8 0 0 0 5-5l-2.4 2.4L14 11l-1.4-1.4 2.9-2.4z"/>',
    'lifecycle' => '<path d="M4 12a3.8 3.8 0 0 1 7.6 0 3.8 3.8 0 0 0 7.6 0 3.8 3.8 0 0 0-7.6 0 3.8 3.8 0 0 1-7.6 0z"/>',
    'headset'   => '<path d="M4 13v-1a8 8 0 0 1 16 0v1M4 13a2 2 0 0 1 2 2v2a2 2 0 0 1-4 0v-2a2 2 0 0 1 2-2zM20 13a2 2 0 0 0-2 2v2a2 2 0 0 0 4 0v-2a2 2 0 0 0-2-2zM20 19a3 3 0 0 1-3 3h-2.5"/>',
  ];
  $inner = $icons[$icon ?? 'cube'] ?? $icons['cube'];
@endphp
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="{{ $class ?? 'w-6 h-6' }}" aria-hidden="true">{!! $inner !!}</svg>
