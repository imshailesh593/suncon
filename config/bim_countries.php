<?php

/*
|--------------------------------------------------------------------------
| BIM Country Pages
|--------------------------------------------------------------------------
| Individual landing pages targeting BIM services by country.
| Reference structure: acurabim.com/bim-services-in-uae/
*/

return [

    'uk' => [
        'name'        => 'United Kingdom',
        'code'        => 'uk',
        'currency'    => 'GBP',
        'flag'        => '🇬🇧',
        'title'       => 'BIM Services in the UK',
        'tagline'     => 'Revit Modeling & BIM Coordination for UK Architecture and Engineering Firms',
        'description' => 'Suncon BIM delivers high-quality Building Information Modeling services to architecture, engineering, and construction firms across the United Kingdom. From Architectural Revit modeling and Structural BIM through to MEP Coordination and Scan to BIM, we support UK firms with cost-effective, ISO 9001-certified BIM production that follows UK BIM Framework and PAS 1192 standards.',
        'hero_image'  => 'photo-1513635269975-59663e0ac1ad',
        'standards'   => 'UK BIM Framework, PAS 1192, BS EN ISO 19650',
        'city_focus'  => ['London', 'Manchester', 'Birmingham', 'Leeds', 'Glasgow', 'Edinburgh'],
        'why_points'  => [
            'UK BIM Framework compliant deliverables (BS EN ISO 19650)',
            'Experienced with RIBA Plan of Work stage requirements',
            'GMT-aligned review windows and UK bank-holiday awareness',
            'NDA and confidentiality agreements as standard',
            'Competitive GBP-denominated pricing',
            'Revit, Navisworks, AutoCAD, ArchiCAD, and OpenBIM (IFC) outputs',
        ],
        'services_intro' => 'We support UK architects, structural engineers, MEP consultants, and main contractors across the full project lifecycle — from feasibility through to as-built handover.',
    ],

    'usa' => [
        'name'        => 'United States',
        'code'        => 'usa',
        'currency'    => 'USD',
        'flag'        => '🇺🇸',
        'title'       => 'BIM Services in the USA',
        'tagline'     => 'Offshore Revit & BIM Coordination for US AEC Firms — On Time, Every Time',
        'description' => 'Suncon BIM partners with US-based architecture, engineering, and construction firms to deliver cost-effective BIM production services. Our team works overnight US hours to ensure deliverables land on your desk by morning. We follow US BIM standards, AIA contract protocols, and building codes for all major states — giving your practice the capacity to take on more work without increasing headcount.',
        'hero_image'  => 'photo-1485738422979-f5bdbfcd2847',
        'standards'   => 'AIA BIM Protocol, NBIMS-US, AIA E203',
        'city_focus'  => ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Dallas', 'San Francisco', 'Seattle'],
        'why_points'  => [
            'Overnight US working hours — deliverables ready by morning',
            'NBIMS-US and AIA BIM Protocol-aligned deliverables',
            'IBC and local building code awareness built into modeling',
            'USD pricing with no hidden costs',
            'Secure file transfer via BIM 360 / Autodesk Construction Cloud',
            'Proven track record with US architectural and engineering firms',
        ],
        'services_intro' => 'We support US practices with overflow Revit production, dedicated BIM outsourcing, and full-project BIM coordination — helping your team maintain throughput without overtime or hiring delays.',
    ],

    'uae' => [
        'name'        => 'United Arab Emirates',
        'code'        => 'uae',
        'currency'    => 'AED',
        'flag'        => '🇦🇪',
        'title'       => 'BIM Services in the UAE',
        'tagline'     => 'BIM Modeling & Coordination for Dubai, Abu Dhabi, and Across the Emirates',
        'description' => 'Suncon BIM provides premium Building Information Modeling services to developers, consultants, and contractors across the United Arab Emirates. With Dubai\'s mandatory BIM requirement for large projects and Abu Dhabi\'s smart city ambitions, BIM is at the heart of UAE construction. Our team delivers coordinated Revit models, MEP clash detection, and construction documentation compliant with Dubai Municipality, Abu Dhabi City Municipality, and Trakhees requirements.',
        'hero_image'  => 'photo-1512453979798-5ea266f8880c',
        'standards'   => 'Dubai BIM Mandate, UAE Fire and Life Safety Code, Abu Dhabi City Municipality BIM Standards',
        'city_focus'  => ['Dubai', 'Abu Dhabi', 'Sharjah', 'Ajman', 'Ras Al Khaimah'],
        'why_points'  => [
            'Compliant with Dubai Municipality BIM requirements',
            'Abu Dhabi City Municipality and Trakhees submission experience',
            'UAE Fire & Life Safety Code incorporated in MEP coordination',
            'GST-free services for UAE clients (offshore provision)',
            'Arabic project naming and EPSG coordinate system support',
            'Fast turnaround aligned to UAE working week (Mon–Fri, Sun if required)',
        ],
        'services_intro' => 'From high-rise residential towers in Dubai Marina to mixed-use masterplans in Abu Dhabi, we deliver BIM services that meet the ambition of UAE projects and the requirements of UAE authorities.',
    ],

    'russia' => [
        'name'        => 'Russia',
        'code'        => 'russia',
        'currency'    => 'RUB',
        'flag'        => '🇷🇺',
        'title'       => 'BIM Services in Russia',
        'tagline'     => 'BIM Modeling and Documentation for Russian Architecture and Construction Projects',
        'description' => 'Suncon BIM supports Russian AEC firms with professional Revit modeling, structural BIM, and construction documentation services. With BIM becoming mandatory for state-funded construction projects in Russia, our experienced team helps local design institutes and international practices operating in Russia meet regulatory requirements efficiently and cost-effectively.',
        'hero_image'  => 'photo-1513326738677-b964603b136d',
        'standards'   => 'Russian BIM mandate (Government Decree No. 331), GOST standards',
        'city_focus'  => ['Moscow', 'Saint Petersburg', 'Novosibirsk', 'Yekaterinburg', 'Kazan'],
        'why_points'  => [
            'Familiar with Russian BIM mandate requirements (Decree No. 331)',
            'Support for state-funded project BIM submission requirements',
            'Cyrillic project naming and Russian coordinate system support',
            'Cost-effective USD/EUR pricing for Russian AEC clients',
            'NDA and IP protection agreements as standard',
            'Compatible with Renga, Revit, and ArchiCAD used in Russian practice',
        ],
        'services_intro' => 'We help Russian design institutes, international JV partners, and developer-driven design teams build coordinated BIM models that meet both local regulatory and international quality standards.',
    ],

    'canada' => [
        'name'        => 'Canada',
        'code'        => 'canada',
        'currency'    => 'CAD',
        'flag'        => '🇨🇦',
        'title'       => 'BIM Services in Canada',
        'tagline'     => 'Revit Modeling, Coordination & Construction Documentation for Canadian AEC Firms',
        'description' => 'Suncon BIM delivers high-quality BIM production and coordination services to architectural, engineering, and construction firms across Canada. From Vancouver to Toronto, we partner with Canadian practices to extend their BIM production capacity — working to NBC (National Building Code of Canada) standards and following Canadian BIM Council guidelines.',
        'hero_image'  => 'photo-1474440692490-2e83ae13ba29',
        'standards'   => 'Canadian BIM Council (CanBIM) Guidelines, National Building Code of Canada (NBC)',
        'city_focus'  => ['Toronto', 'Vancouver', 'Montreal', 'Calgary', 'Ottawa', 'Edmonton'],
        'why_points'  => [
            'National Building Code of Canada (NBC) awareness in all deliverables',
            'CanBIM guideline-aligned BIM Execution Plans',
            'EST/PST time zone overlap for real-time collaboration windows',
            'CAD-denominated project pricing available',
            'Experience with Canadian developer, municipal, and healthcare projects',
            'Bilingual project naming support (English / French) where required',
        ],
        'services_intro' => 'Whether you are a boutique architecture firm in Vancouver or a national engineering consultancy in Toronto, we provide the BIM production capacity you need to grow without proportionally growing your team.',
    ],

    'germany' => [
        'name'        => 'Germany',
        'code'        => 'germany',
        'currency'    => 'EUR',
        'flag'        => '🇩🇪',
        'title'       => 'BIM Services in Germany',
        'tagline'     => 'BIM Modeling & Coordination for German Architects and Engineering Offices',
        'description' => 'Suncon BIM supports German AEC firms with professional BIM modeling, coordination, and documentation services. With Germany\'s BIM mandate for federal infrastructure projects and the growing adoption of BIM across private-sector construction, we help German architecture offices and engineering consultancies deliver coordinated models that meet HOAI structure, German DIN standards, and openBIM interoperability requirements.',
        'hero_image'  => 'photo-1467269204594-f5b933c25f44',
        'standards'   => 'DIN EN ISO 19650, German BIM mandate (BIM4INFRA2020), HOAI, VDI 2552',
        'city_focus'  => ['Berlin', 'Munich', 'Hamburg', 'Frankfurt', 'Cologne', 'Stuttgart', 'Düsseldorf'],
        'why_points'  => [
            'DIN EN ISO 19650 and VDI 2552-compliant BIM deliverables',
            'Experience with HOAI project structure and phase requirements',
            'openBIM (IFC) outputs compatible with all German BIM platforms',
            'EUR pricing with transparent fixed-fee project structures',
            'CET time zone overlap for daily coordination calls',
            'German project naming conventions and DIN A0/A1 sheet formats',
        ],
        'services_intro' => 'From housing developments in Berlin to industrial facilities in Bavaria, we deliver the coordinated BIM models and construction documentation that German quality standards demand.',
    ],

    'australia' => [
        'name'        => 'Australia',
        'code'        => 'australia',
        'currency'    => 'AUD',
        'flag'        => '🇦🇺',
        'title'       => 'BIM Services in Australia',
        'tagline'     => 'BIM Modeling, Coordination & Documentation for Australian AEC Firms',
        'description' => 'Suncon BIM delivers professional Building Information Modeling services to architecture, engineering, and construction firms across Australia. We help Australian practices scale their BIM production capacity — working to NATSPEC BIM Object Library standards, NCC (National Construction Code) requirements, and state-level authority requirements for Victoria, New South Wales, Queensland, and Western Australia.',
        'hero_image'  => 'photo-1506973035872-a4ec16b8e8d9',
        'standards'   => 'NATSPEC BIM Guidelines, NCC, Australian Standards (AS), ISO 19650',
        'city_focus'  => ['Sydney', 'Melbourne', 'Brisbane', 'Perth', 'Adelaide', 'Canberra'],
        'why_points'  => [
            'NCC (National Construction Code) awareness in all modeling decisions',
            'NATSPEC BIM Object Library-compliant Revit families available',
            'AEST/AWST time zone overlap for morning briefings',
            'AUD-denominated pricing available',
            'Experience with Australian developer, government, and education sector projects',
            'IFC openBIM outputs compatible with Archicad and Vectorworks used in AU practice',
        ],
        'services_intro' => 'From apartment towers in Sydney to healthcare facilities in Melbourne and resources infrastructure in Perth, we provide the BIM depth and coordination rigour that Australian construction demands.',
    ],

];
