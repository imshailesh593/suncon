<?php

/*
|--------------------------------------------------------------------------
| Individual BIM Service Pages
|--------------------------------------------------------------------------
| Six focused landing pages following the acurabim.com service structure.
| Consumed by BimController::servicePage() and bim.service-page view.
*/

return [

    'architectural-bim' => [
        'title'       => 'Architectural BIM Modeling',
        'tagline'     => 'Precision Revit Models from Concept to Construction Documentation',
        'description' => 'Our Architectural BIM service delivers intelligent, coordinated Revit models across all building typologies — from conceptual massing through to construction-ready LOD 400 documentation. We embed design intent, material data, and scheduling information into a single federated model, enabling architects, engineers, and contractors to collaborate without gaps.',
        'icon'        => 'building',
        'hero_image'  => 'photo-1503387762-592deb58ef4e',
        'services'    => [
            ['Conceptual & Schematic BIM Modeling', '3D massing and spatial planning models for early design exploration and client approval.'],
            ['Detailed Architectural BIM (LOD 300)', 'Accurate geometry and assembly information for permit documentation and coordination.'],
            ['Construction Documentation (LOD 400)', 'Fabrication-ready shop drawings and construction packages directly from the Revit model.'],
            ['Revit Family Creation', 'Custom Revit families — furniture, fixtures, cladding, and bespoke elements — built to manufacturer specifications.'],
            ['Interior Architectural BIM', 'Interior fit-out modeling including ceiling coordination, joinery detailing, and finish schedules.'],
            ['As-Built & LOD 500 Documentation', 'Verified in-place conditions for FM handover, integrated with COBie data where required.'],
        ],
        'value_props' => [
            ['icon' => 'building', 'title' => 'All Building Types',       'text' => 'Residential, commercial, hospitality, healthcare, industrial, and civic'],
            ['icon' => 'shield',   'title' => 'ISO-Certified QA',         'text' => 'Consistent quality across every deliverable'],
            ['icon' => 'clock',    'title' => 'On-Time Delivery',         'text' => 'Phased milestones agreed in the BIM Execution Plan'],
            ['icon' => 'coins',    'title' => 'Cost-Effective',           'text' => 'Competitive rates without compromising accuracy'],
        ],
        'faqs' => [
            ['What is Architectural BIM Modeling?', 'Architectural BIM Modeling is the process of creating intelligent 3D digital representations of buildings using software such as Autodesk Revit. Unlike traditional 2D drawings, BIM models contain geometry, material properties, cost data, and scheduling information — enabling all project stakeholders to collaborate from a single coordinated source of truth.'],
            ['What LOD levels do you model to?', 'We model from LOD 100 (conceptual massing) through to LOD 500 (as-built, verified conditions). The appropriate LOD is agreed in the BIM Execution Plan at the start of each project. Most construction documentation packages are delivered at LOD 300–400.'],
            ['Can you work from 2D CAD or PDF drawings?', 'Yes. We can create a full Revit model from 2D AutoCAD drawings, PDFs, or even hand-sketched plans. We review all source material before confirming scope and timelines.'],
            ['Do you create custom Revit families?', 'Yes. We create parametric Revit families for bespoke elements including custom windows, doors, cladding panels, furniture, and manufacturer-specific components.'],
            ['What file formats do you deliver?', 'We deliver Revit (.rvt) project files, IFC for interoperability, DWG for 2D output, and PDF for construction documents. COBie data for FM handover is available on request.'],
        ],
    ],

    'structural-bim' => [
        'title'       => 'Structural BIM Modeling',
        'tagline'     => 'Accurate Structural Models for Safe and Efficient Construction',
        'description' => 'Our Structural BIM service delivers precise, coordinated 3D structural models including reinforced concrete, structural steel, and composite frame buildings. We produce fabrication-ready shop drawings, rebar detailing, connection designs, and quantity takeoffs directly from the coordinated Revit model — reducing rework and improving construction accuracy.',
        'icon'        => 'frame',
        'hero_image'  => 'photo-1541888946425-d81bb19240f5',
        'services'    => [
            ['Structural 3D Modeling (RC & Steel)', 'Coordinated structural Revit models for reinforced concrete and structural steel buildings.'],
            ['Reinforcement (Rebar) Modeling', 'Detailed rebar modeling at LOD 400 for bar schedules, quantity takeoffs, and on-site placement.'],
            ['Steel Connection & Fabrication Drawings', 'Shop-drawing packages for structural steel connections, base plates, and moment connections.'],
            ['Clash Detection & Structural Coordination', 'Multi-discipline clash detection between structural, architectural, and MEP models.'],
            ['Quantity Takeoff & BOQ', 'Automated quantity extraction from the Revit model for accurate bills of quantities.'],
            ['As-Built Structural Documentation', 'LOD 500 verified structural models for handover and future renovation reference.'],
        ],
        'value_props' => [
            ['icon' => 'shield',   'title' => 'High Accuracy',           'text' => 'Fabrication-level detail from the model to site'],
            ['icon' => 'users',    'title' => 'Multi-Discipline',        'text' => 'Coordinated with Architectural and MEP models'],
            ['icon' => 'coins',    'title' => 'BOQ Extraction',          'text' => 'Accurate quantities directly from the Revit model'],
            ['icon' => 'clock',    'title' => 'Fast Turnaround',         'text' => 'Phased milestone delivery with weekly reviews'],
        ],
        'faqs' => [
            ['What is Structural BIM Modeling?', 'Structural BIM Modeling involves creating an intelligent 3D model of a building\'s structural system — foundations, columns, beams, slabs, walls, and connections — using Autodesk Revit or similar platforms. The model is coordinated with architectural and MEP models to detect clashes before construction begins.'],
            ['Do you model reinforced concrete and structural steel?', 'Yes. We model both RC and structural steel buildings. For RC structures we produce detailed rebar models and bar schedules. For steel structures we produce connection details, base plate designs, and fabrication-ready shop drawings.'],
            ['Can you extract quantities from the structural model?', 'Yes. Quantities for concrete, reinforcement (by diameter and length), structural steel sections, and other materials can be extracted directly from the Revit model as a bill of quantities.'],
            ['How do you handle coordination with the architectural model?', 'We federate the structural and architectural Revit models in Navisworks to run clash detection. Clash reports are issued at each project milestone and resolved through a coordinated RFI log before construction documentation is released.'],
            ['Do you deliver IFC files for interoperability?', 'Yes. We deliver IFC-compliant exports from Revit that are compatible with all major BIM platforms including Bentley, Tekla, and OpenBIM tools.'],
        ],
    ],

    'mep-coordination' => [
        'title'       => 'MEP BIM Coordination',
        'tagline'     => 'Integrated MEP Modeling with Zero-Clash Construction Packages',
        'description' => 'Our MEP BIM Coordination service models Mechanical, Electrical, and Plumbing systems in full 3D and federates them with the architectural and structural models for comprehensive clash detection. We produce coordinated shop drawings, spool sheets, and BOQ packages — eliminating expensive on-site clashes and rework.',
        'icon'        => 'pipes',
        'hero_image'  => 'photo-1497366811353-6870744d04b2',
        'services'    => [
            ['Mechanical BIM Modeling (HVAC)', 'Ductwork, chilled water piping, AHU, FCU, and plant room layouts modeled to LOD 300–400.'],
            ['Electrical BIM Modeling', 'Cable trays, containment, lighting, distribution boards, and earthing systems in full 3D.'],
            ['Plumbing & Drainage BIM', 'Water supply, sanitary drainage, hot water, and stormwater systems coordinated in Revit.'],
            ['Firefighting System BIM', 'Sprinkler layouts, hydrant mains, deluge systems, and fire alarm containment modeling.'],
            ['Multi-Discipline Clash Detection', 'Navisworks coordination runs between all disciplines with prioritised clash reports and resolution logs.'],
            ['MEP Shop Drawings & BOQ', 'Coordinated shop drawing packages and automated quantity takeoffs from the MEP Revit model.'],
        ],
        'value_props' => [
            ['icon' => 'sync',   'title' => 'Zero Clashes on Site',    'text' => 'Comprehensive clash detection before construction'],
            ['icon' => 'users',  'title' => 'All MEP Disciplines',     'text' => 'Mechanical, Electrical, Plumbing, and Firefighting'],
            ['icon' => 'coins',  'title' => 'Accurate BOQ',            'text' => 'Quantities extracted directly from the coordinated model'],
            ['icon' => 'shield', 'title' => 'Code Compliant',          'text' => 'Modeled to NBC and project-specific engineering standards'],
        ],
        'faqs' => [
            ['What is MEP BIM Coordination?', 'MEP BIM Coordination is the process of modeling Mechanical, Electrical, and Plumbing systems in 3D and coordinating them with the architectural and structural models to detect and resolve clashes before construction. It eliminates costly on-site rework and ensures all services can be installed as designed.'],
            ['Which MEP systems do you model?', 'We model HVAC (ductwork, pipework, plant rooms), electrical (cable trays, containment, lighting), plumbing (water supply, drainage, hot water), firefighting (sprinklers, hydrant mains, deluge), and BMS infrastructure.'],
            ['What software do you use for MEP coordination?', 'We use Autodesk Revit MEP for modeling and Navisworks Manage for clash detection and coordination. We can also work within BIM 360 / Autodesk Construction Cloud for cloud-based project environments.'],
            ['How are clashes reported and resolved?', 'Clash reports are generated from Navisworks at each milestone, categorised by severity and discipline. They are issued as Excel/PDF reports and discussed in weekly coordination calls. A resolution log tracks every clash from identification through to sign-off.'],
            ['Do you deliver coordinated shop drawings?', 'Yes. Once the model is clash-free, we extract coordinated shop drawings for each MEP discipline. These include plan drawings, sections, isometrics, and spool sheets for prefabrication.'],
        ],
    ],

    'scan-to-bim' => [
        'title'       => 'Scan to BIM',
        'tagline'     => 'Point Cloud to Accurate Revit Models for Renovation and Heritage',
        'description' => 'Our Scan to BIM service converts point cloud data from 3D laser scans or photogrammetry surveys into accurate, dimensionally faithful Revit models. Whether you are planning a renovation, assessing an existing structure, or creating a digital twin, our process delivers as-is BIM models that reflect the real-world geometry of your building at the required level of accuracy.',
        'icon'        => 'scanner',
        'hero_image'  => 'photo-1486325212027-8081e485255e',
        'services'    => [
            ['Point Cloud Processing & Registration', 'Raw scan data cleaned, registered, and prepared for BIM modeling. Compatible with Faro, Leica, and Matterport outputs.'],
            ['Architectural Scan to BIM', 'Existing walls, ceilings, floors, windows, doors, and structural elements modeled from point cloud to required LOD.'],
            ['Structural Scan to BIM', 'Existing structural frames, slabs, foundations, and connections captured and modeled for structural assessment.'],
            ['MEP Scan to BIM', 'Existing mechanical, electrical, and plumbing services captured from point cloud for clash checking against proposed works.'],
            ['Heritage & Conservation BIM', 'Detailed BIM models for listed buildings and heritage structures with millimeter-level accuracy for conservation planning.'],
            ['Digital Twin Creation', 'Fully attributed as-built Revit models with COBie data for facility management and ongoing operations.'],
        ],
        'value_props' => [
            ['icon' => 'target',  'title' => 'Millimetre Accuracy',    'text' => 'Models faithful to the real-world geometry of your building'],
            ['icon' => 'shield',  'title' => 'All Scan Formats',       'text' => 'Compatible with Faro, Leica, Matterport, and NavVis outputs'],
            ['icon' => 'leaf',    'title' => 'Heritage Specialists',   'text' => 'Experienced in conservation and listed building documentation'],
            ['icon' => 'clock',   'title' => 'Fast Turnaround',        'text' => 'Models delivered in 2–4 weeks depending on building size'],
        ],
        'faqs' => [
            ['What is Scan to BIM?', 'Scan to BIM is the process of converting point cloud data — captured by a 3D laser scanner or photogrammetry system — into an accurate Revit BIM model. The resulting model reflects the actual as-is geometry of the existing building, not just the design intent.'],
            ['What point cloud formats do you accept?', 'We accept data from all major laser scanners including Faro Focus, Leica BLK, Matterport, NavVis, and Trimble. Common file formats include .RCS, .RCP, .E57, .LAS, .LAZ, and .PTS.'],
            ['What LOD can you model Scan to BIM?', 'We typically deliver Scan to BIM at LOD 200 (approximate geometry for spatial planning) through LOD 400 (dimensional accuracy for renovation detailing). The appropriate LOD depends on the project brief and required downstream use.'],
            ['How accurate are your Scan to BIM models?', 'Accuracy depends on the quality of the scan data and the agreed LOD. For most renovation projects we achieve ±5–10mm positional accuracy. For heritage and conservation projects we can work to tighter tolerances with premium scan data.'],
            ['Can you process scans we have already captured?', 'Yes. If you have existing point cloud data from a scan you have already commissioned, we can process it directly into a Revit model without requiring a new survey.'],
        ],
    ],

    'cad-to-bim' => [
        'title'       => 'CAD to BIM Migration',
        'tagline'     => 'Legacy 2D Drawings Upgraded to Intelligent 3D BIM Models',
        'description' => 'Our CAD to BIM migration service converts existing 2D AutoCAD drawings, PDFs, and hand sketches into coordinated, data-rich Revit BIM models. We preserve your design intent, improve coordination between disciplines, and unlock the full value of BIM — clash detection, quantity takeoffs, and 4D scheduling — from your existing drawing set.',
        'icon'        => 'convert',
        'hero_image'  => 'photo-1497366216548-37526070297c',
        'services'    => [
            ['AutoCAD to Revit Conversion', '2D DWG floor plans, elevations, and sections converted to fully coordinated Revit models.'],
            ['PDF to Revit Modeling', 'Scanned or native PDF drawings traced and modeled in Revit with accurate geometry and parametric data.'],
            ['Multi-Discipline CAD to BIM', 'Architectural, structural, and MEP CAD drawings consolidated into a single federated BIM model.'],
            ['As-Built CAD to BIM', 'Legacy as-built drawings upgraded to LOD 400–500 Revit models for FM and renovation planning.'],
            ['Revit Family Creation from CAD', 'CAD blocks and details converted to intelligent, parametric Revit families.'],
            ['CAD Standard Clean-Up', 'Layer naming, line weights, and annotation standardised before and after BIM conversion.'],
        ],
        'value_props' => [
            ['icon' => 'sync',   'title' => 'All 2D Formats',         'text' => 'DWG, DXF, PDF, and scanned drawing inputs accepted'],
            ['icon' => 'users',  'title' => 'Multi-Discipline',       'text' => 'Architectural, structural, and MEP in one federated model'],
            ['icon' => 'coins',  'title' => 'Quantity Takeoffs',      'text' => 'BOQ and material schedules extracted from the Revit model'],
            ['icon' => 'clock',  'title' => 'Fast Delivery',          'text' => 'Most conversions completed in 1–3 weeks'],
        ],
        'faqs' => [
            ['What is CAD to BIM migration?', 'CAD to BIM migration is the process of converting existing 2D CAD drawings (typically AutoCAD DWG files or PDFs) into intelligent 3D Revit BIM models. The resulting BIM model enables clash detection, quantity takeoffs, 4D scheduling, and coordinated construction documentation that is not possible with 2D drawings.'],
            ['What CAD file formats do you accept?', 'We accept AutoCAD DWG, DXF, PDF (both native and scanned), and image files (JPG, PNG) of existing drawings. We can also work from hand-sketched plans that have been scanned to PDF.'],
            ['Will my design intent be preserved?', 'Yes. Our modelers review all source drawings carefully before starting work and raise RFIs for any ambiguities. Phased deliveries allow you to review and approve the model before we proceed to the next stage.'],
            ['Can you convert drawings from older versions of AutoCAD?', 'Yes. We accept DWG files from AutoCAD 2000 through to the current version. Older files are converted and cleaned before modeling begins.'],
            ['How long does a CAD to BIM conversion take?', 'A single-discipline architectural conversion for a mid-size building (10,000–20,000 sq ft) typically takes 1–2 weeks. Multi-discipline packages for larger buildings take 3–6 weeks. We provide a fixed timeline after reviewing your drawings.'],
        ],
    ],

    'construction-documentation' => [
        'title'       => 'Construction Documentation',
        'tagline'     => 'Complete, Coordinated Drawing Packages Ready for Site',
        'description' => 'Our Construction Documentation service extracts coordinated, construction-ready drawing packages directly from the BIM model. Every sheet — plans, sections, elevations, details, and schedules — is generated from the live Revit model, ensuring consistency across the full drawing set. We deliver packages for permit submission, tender, and site construction.',
        'icon'        => 'clipboard',
        'hero_image'  => 'photo-1524758631624-e2822e304c36',
        'services'    => [
            ['Permit & Approval Drawing Sets', 'Coordinated drawing packages formatted for local authority submission and building permit applications.'],
            ['Tender Documentation', 'Complete drawing and specification sets for contractor tendering including BOQ and scope-of-work schedules.'],
            ['Shop Drawing Production', 'Fabrication-ready shop drawings for structural steel, precast, MEP systems, and specialist subcontractors.'],
            ['As-Built Documentation', 'Final verified drawing packages reflecting actual construction, suitable for FM handover and record purposes.'],
            ['RFI & Variation Documentation', 'Structured RFI management and variation drawing issue, tracked through the BIM model.'],
            ['BIM Execution Plan (BEP)', 'Project-specific BEPs covering standards, LOD milestones, naming conventions, and handover requirements.'],
        ],
        'value_props' => [
            ['icon' => 'shield',   'title' => 'Model-Based',           'text' => 'All sheets generated from the live Revit model — always consistent'],
            ['icon' => 'target',   'title' => 'Permit-Ready',          'text' => 'Formatted to local authority submission requirements'],
            ['icon' => 'users',    'title' => 'Full Drawing Sets',     'text' => 'Plans, sections, elevations, details, and schedules'],
            ['icon' => 'clock',    'title' => 'On-Time Issue',         'text' => 'Drawing issue schedules agreed and tracked in the BEP'],
        ],
        'faqs' => [
            ['What is BIM-based Construction Documentation?', 'BIM-based construction documentation is the process of extracting construction-ready 2D drawings, schedules, and specifications directly from the coordinated BIM model. Because every sheet is generated from the same model, changes are automatically reflected across the entire drawing set — eliminating inconsistencies between plans, sections, and elevations.'],
            ['What drawing types do you produce?', 'We produce floor plans, reflected ceiling plans, elevations, building sections, wall sections, details, door and window schedules, room finish schedules, area schedules, and structural drawings — all extracted from the Revit model.'],
            ['Can you prepare drawings for local authority submission?', 'Yes. We format drawing sets to meet local authority requirements including title block standards, sheet sizes, revision protocols, and required notes. We are familiar with PMRDA, PCMC, MCGM, and other Maharashtra authority requirements.'],
            ['Do you handle construction-phase RFIs?', 'Yes. We manage RFI responses including issuing revised drawings, tracking changes in the Revit model, and maintaining a revision history. All changes are cloud-tracked and issued through a structured transmittal system.'],
            ['Do you produce a BIM Execution Plan?', 'Yes. We produce a project-specific BIM Execution Plan (BEP) at the start of every project. The BEP defines standards, naming conventions, LOD milestones, drawing issue schedule, and handover requirements.'],
        ],
    ],

];
