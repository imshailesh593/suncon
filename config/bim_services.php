<?php

/*
|--------------------------------------------------------------------------
| BIM Service Categories
|--------------------------------------------------------------------------
| Single source of truth for the four BIM service-category pages, built
| from the reference sheets. Consumed by BimController and rendered by
| resources/views/bim/service-category.blade.php (+ the services index).
| Icons map to keys in resources/views/bim/partials/service-icon.blade.php
*/

return [

    /* ───────────────────────── 1. Building Information Modeling ───────── */
    'building-information-modeling' => [
        'name'        => 'Building Information Modeling',
        'menu'        => 'Building Information Modeling',
        'why_label'   => 'BIM',
        'icon'        => 'building',
        'tagline'     => 'Intelligent Models. Better Buildings. Smarter Future.',
        'description' => 'Our Building Information Modeling (BIM) services provide intelligent, coordinated, and data-rich 3D models for all types of buildings. From concept to construction and operations, we help architects, engineers, and contractors collaborate effectively, reduce errors, optimize costs, and deliver high-quality projects on time.',
        'value_props' => [
            ['icon' => 'sync',       'title' => 'Better Design',          'text' => 'Accurate models for better planning & visualization'],
            ['icon' => 'users',      'title' => 'Seamless Coordination',  'text' => 'Integrated models reduce clashes and rework'],
            ['icon' => 'coins',      'title' => 'Cost & Time Efficiency', 'text' => 'Optimized workflows for faster delivery'],
            ['icon' => 'leaf',       'title' => 'Sustainable Buildings',  'text' => 'Data-driven insights for greener & smarter buildings'],
        ],
        'services' => [
            ['icon' => 'building', 'title' => 'Architectural BIM',       'text' => '3D architectural modeling for conceptual design to construction documentation.', 'points' => ['Conceptual Design Modeling', 'Detailed 3D Modeling', 'Construction Documentation', 'Interior & Exterior Visualization']],
            ['icon' => 'frame',    'title' => 'Structural BIM',          'text' => 'Accurate structural modeling and detailing for safe and efficient construction.', 'points' => ['Structural 3D Modeling', 'Reinforcement Modeling', 'Steel & Concrete Detailing', 'Connection & Fabrication Drawings']],
            ['icon' => 'pipes',    'title' => 'MEP BIM',                 'text' => 'Integrated modeling of mechanical, electrical, and plumbing systems.', 'points' => ['Mechanical, Electrical & Plumbing Modeling', 'System Coordination', 'Clash Detection & Resolution', 'Shop Drawings & BOQ']],
            ['icon' => 'snow',     'title' => 'HVAC BIM',                'text' => 'Detailed HVAC system modeling for efficient design and performance.', 'points' => ['HVAC System Design & Modeling', 'Ducting & Piping Layouts', 'Load Calculation Integration', 'Energy Analysis & Optimization']],
            ['icon' => 'fire',     'title' => 'Firefighting BIM',        'text' => 'Comprehensive modeling of firefighting and life safety systems.', 'points' => ['Firefighting System Layouts', 'Sprinkler & Hydrant Modeling', 'Code Compliance Checking', 'Shop Drawings & Coordination']],
            ['icon' => 'factory',  'title' => 'Industrial Building BIM', 'text' => 'BIM solutions for industrial facilities and process-driven plants.', 'points' => ['Process Equipment Modeling', 'Pipe Rack & Structure Modeling', 'Plant Layout & Coordination', 'Construction & As-built Support']],
            ['icon' => 'office',   'title' => 'Commercial Building BIM', 'text' => 'Smart BIM models for offices, malls, hotels, and mixed-use buildings.', 'points' => ['Architectural & MEP Coordination', 'Clash Detection & Reporting', 'Quantity & Cost Estimation (5D)', 'Facility Management Support']],
            ['icon' => 'hospital', 'title' => 'Hospital / Campus BIM',   'text' => 'Specialized BIM for healthcare and campus infrastructure projects.', 'points' => ['Healthcare Facility Modeling', 'Medical Equipment Coordination', 'Campus Master Planning', 'Operations & Maintenance Support']],
        ],
        'why' => [
            ['icon' => 'users',   'text' => 'Experienced BIM Professionals'],
            ['icon' => 'network', 'text' => 'Collaborative Workflows'],
            ['icon' => 'shield',  'text' => 'High Accuracy & Quality'],
            ['icon' => 'clock',   'text' => 'On-Time Delivery'],
            ['icon' => 'coins',   'text' => 'Cost-Effective Solutions'],
            ['icon' => 'lifecycle', 'text' => 'End-to-End Support from Design to Operations'],
        ],
    ],

    /* ───────────────────────── 2. Infrastructure BIM ──────────────────── */
    'infrastructure-bim' => [
        'name'        => 'Infrastructure BIM',
        'menu'        => 'Infrastructure BIM',
        'why_label'   => 'Infrastructure BIM',
        'icon'        => 'bridge',
        'tagline'     => "Intelligent Modeling for Tomorrow's Infrastructure",
        'description' => 'Our Infrastructure BIM services deliver coordinated, data-rich 3D models for roads, bridges, utilities, water systems, and urban infrastructure. We help owners, engineers, and contractors improve planning, design accuracy, construction efficiency, and asset management across the entire infrastructure lifecycle.',
        'value_props' => [
            ['icon' => 'target',   'title' => 'Better Planning',       'text' => 'Accurate 3D models for informed decision-making'],
            ['icon' => 'users',    'title' => 'Improved Coordination', 'text' => 'Integrated models reduce clashes & delays'],
            ['icon' => 'coins',    'title' => 'Cost & Time Savings',   'text' => 'Optimized workflows deliver better outcomes'],
            ['icon' => 'shield',   'title' => 'Lifecycle Value',       'text' => 'Data-rich models for operations & maintenance'],
        ],
        'services' => [
            ['icon' => 'road',     'title' => 'Road & Highway BIM',      'text' => 'Comprehensive 3D modeling of highways, expressways, streets, and intersections for better planning and construction.', 'points' => ['Horizontal & Vertical Alignment', 'Corridor Modeling', 'Earthwork & Quantity Estimation', 'Construction Documentation']],
            ['icon' => 'rain',     'title' => 'Stormwater Drainage BIM', 'text' => 'Accurate modeling of stormwater systems to manage surface runoff and prevent urban flooding.', 'points' => ['Drainage Network Modeling', 'Catchment & Runoff Analysis', 'Stormwater Pits, Pipes & Chambers', 'Outfall & Discharge Structures']],
            ['icon' => 'sewer',    'title' => 'Sewerage Network BIM',    'text' => 'End-to-end 3D modeling of sewer networks for efficient wastewater collection and treatment.', 'points' => ['Gravity & Pressure Sewer Modeling', 'Manholes, Chambers & Pumping Stations', 'Sewer Network Analysis', 'Treatment Plant Integration']],
            ['icon' => 'tap',      'title' => 'Water Supply BIM',        'text' => '3D modeling of water supply networks to ensure reliable and continuous distribution.', 'points' => ['Water Mains & Distribution Networks', 'Valves, Hydrants & Fittings', 'Reservoirs, Tanks & Pumping Stations', 'Hydraulic Analysis Integration']],
            ['icon' => 'layers',   'title' => 'Utility Corridor Modelling', 'text' => 'Integrated modeling of multiple underground utilities in a common corridor.', 'points' => ['Multi-Utility Coordination', 'Duct Banks & Cable Trays', 'Asset Mapping & Visualization', 'Clash Detection & Resolution']],
            ['icon' => 'bridge',   'title' => 'Bridge & Culvert BIM',    'text' => 'Detailed 3D modeling of bridges, culverts, and associated structures for safe and efficient delivery.', 'points' => ['Bridge Superstructure & Substructure', 'Culvert & Minor Bridge Modeling', 'Reinforcement Modeling', 'BOQ & Construction Drawings']],
            ['icon' => 'waves',    'title' => 'Canal / Nalla Corridor BIM', 'text' => '3D modeling of canals, drains, and nallas for effective water management and urban planning.', 'points' => ['Canal & Drain Modeling', 'Cross-Sections & Long Sections', 'Encroachments & ROW Mapping', 'Flood & Capacity Analysis']],
            ['icon' => 'city',     'title' => 'Smart City BIM',          'text' => 'Data-driven BIM models to support smart infrastructure planning, monitoring, and operations.', 'points' => ['Urban 3D Modeling', 'Asset Management Integration', 'IoT & Sensor Data Integration', 'Digital Twin for Smart Cities']],
        ],
        'why' => [
            ['icon' => 'users',   'text' => 'Experienced Team of BIM Professionals'],
            ['icon' => 'globe',   'text' => 'Industry-Leading Standards & Workflows'],
            ['icon' => 'tools',   'text' => 'Advanced Tools & Technologies'],
            ['icon' => 'shield',  'text' => 'High Accuracy & Quality'],
            ['icon' => 'lifecycle', 'text' => 'End-to-End Support from Design to Operations'],
        ],
    ],

    /* ───────────────────────── 3. Digital Engineering & BIM ───────────── */
    'digital-engineering-bim' => [
        'name'        => 'Digital Engineering & BIM',
        'menu'        => 'Digital Engineering & BIM',
        'why_label'   => 'Digital Engineering',
        'icon'        => 'chip',
        'tagline'     => 'Smarter Models. Better Coordination. Efficient Delivery.',
        'description' => 'Our Digital Engineering & BIM services leverage intelligent 3D models and data-driven workflows to improve collaboration, reduce errors, optimize costs, and accelerate project delivery across the entire asset lifecycle.',
        'value_props' => [
            ['icon' => 'target',  'title' => 'Improved Accuracy',    'text' => 'Data-driven models for precise planning & design'],
            ['icon' => 'users',   'title' => 'Better Collaboration', 'text' => 'Streamlined coordination across all disciplines'],
            ['icon' => 'coins',   'title' => 'Cost & Time Savings',  'text' => 'Fewer reworks, optimized resources & schedules'],
            ['icon' => 'shield',  'title' => 'Lifecycle Value',      'text' => 'From design to operations with reliable data'],
        ],
        'services' => [
            ['icon' => 'cube',      'title' => 'BIM Modelling',                'text' => 'We create intelligent, data-rich 3D BIM models that serve as a reliable foundation for design, analysis, and construction.', 'points' => ['Architectural, Structural & MEP Modelling', 'Level of Detail (LOD 100 to 500)', 'Parametric & Data-Rich Models', 'Model Standards: ISO 19650, BIM Execution Plan (BEP)']],
            ['icon' => 'network',   'title' => 'BIM Coordination',             'text' => 'We integrate multidisciplinary models to ensure seamless coordination and information flow across all trades.', 'points' => ['Multi-disciplinary Model Integration', 'Interdisciplinary Coordination', 'Model Review & Validation', 'Collaboration using Common Data Environment (CDE)']],
            ['icon' => 'alert',     'title' => 'Clash Detection',              'text' => 'We identify and resolve design conflicts before construction, minimizing rework and delays.', 'points' => ['Clash Detection (Hard & Soft Clashes)', 'Clash Reports with Markups', 'Issue Tracking & Resolution', 'Tools: Navisworks, Solibri, BIMcollab']],
            ['icon' => 'calendar',  'title' => '4D Construction Simulation',   'text' => 'We link BIM models with construction schedules to visualize the sequence of work over time.', 'points' => ['4D Model Development', 'Construction Sequencing', 'Time-lapse Simulations', 'Tools: Navisworks, Synchro 4D']],
            ['icon' => 'database',  'title' => '5D Quantity & Cost Estimation','text' => 'We extract accurate quantities and associate costs with BIM models for better financial control.', 'points' => ['Quantity Take-off (QTO)', 'Cost Estimation & Budgeting', 'Cost Planning & Cash Flow Analysis', 'Tools: CostX, Revit, Excel Integration']],
            ['icon' => 'clipboard', 'title' => 'As-Built BIM',                 'text' => 'We capture existing conditions and deliver accurate as-built BIM models for operations and future planning.', 'points' => ['Site Surveys & Data Capture', 'As-Built Model Development (LOD 300+)', 'Model Validation & Documentation', 'Asset Information Handover (COBie)']],
        ],
        'why' => [
            ['icon' => 'users',    'text' => 'Experienced BIM Professionals'],
            ['icon' => 'globe',    'text' => 'Global Standards & Best Practices'],
            ['icon' => 'tools',    'text' => 'Advanced Tools & Technologies'],
            ['icon' => 'network',  'text' => 'Scalable Engagement Models'],
            ['icon' => 'database', 'text' => 'Secure & Reliable Data Management'],
            ['icon' => 'lifecycle','text' => 'End-to-End Delivery & Support'],
        ],
    ],

    /* ───────────────────────── 4. Reality Capture & Scan-to-BIM ───────── */
    'reality-capture-scan-to-bim' => [
        'name'        => 'Reality Capture & Scan-to-BIM',
        'menu'        => 'Reality Capture & Scan-to-BIM',
        'why_label'   => 'Reality Capture',
        'icon'        => 'scanner',
        'tagline'     => 'Capture Reality. Create Accuracy. Deliver Intelligence.',
        'description' => 'We use advanced laser scanning, drone technology, and point cloud processing to capture real-world conditions with millimeter accuracy and convert them into intelligent 3D BIM models. Our solutions help you better plan, design, renovate, and manage assets throughout their lifecycle.',
        'value_props' => [
            ['icon' => 'target',  'title' => 'High Accuracy',          'text' => 'Millimeter-level accuracy for reliable deliverables'],
            ['icon' => 'clock',   'title' => 'Fast & Efficient',       'text' => 'Advanced technology for faster data capture & delivery'],
            ['icon' => 'layers',  'title' => 'Data-Rich Deliverables', 'text' => 'Point clouds, 3D models & insightful documentation'],
            ['icon' => 'shield',  'title' => 'Better Decision Making',  'text' => 'Accurate data for planning, design & operations'],
        ],
        'services' => [
            ['icon' => 'scanner',  'title' => 'LiDAR Scanning',           'text' => 'High-precision laser scanning for accurate data capture of buildings, structures, and sites.', 'points' => ['Terrestrial Laser Scanning (TLS)', 'High Density Point Cloud', 'Large Area & Complex Structure Capture', 'Millimeter Accuracy']],
            ['icon' => 'drone',    'title' => 'UAV / Drone Survey',       'text' => 'Aerial data capture using drones for mapping, surveying and site documentation.', 'points' => ['Aerial Photography & Mapping', 'Orthomosaic & 3D Mesh', 'Topographic Surveys', 'Progress Monitoring']],
            ['icon' => 'scatter',  'title' => 'Point Cloud Processing',   'text' => 'Advanced processing of raw scan data to deliver clean, accurate and reliable point clouds.', 'points' => ['Noise Filtering & Classification', 'Registration & Georeferencing', 'Point Cloud Segmentation', 'High Quality Deliverables']],
            ['icon' => 'convert',  'title' => 'Scan-to-BIM Conversion',   'text' => 'Convert point clouds into intelligent BIM models with accurate geometry and data-rich information.', 'points' => ['LOD 100 to LOD 500', 'Architectural, Structural & MEP', 'Clash-Free & Coordinated Models', 'As-Built BIM Deliverables']],
            ['icon' => 'digitize', 'title' => 'Existing Asset Digitization', 'text' => 'Digitize existing assets and facilities for better visualization, planning and lifecycle management.', 'points' => ['As-Built Documentation', 'Asset Information Modeling', 'Renovation & Retrofit Planning', 'Facility Management Support']],
            ['icon' => 'landmark', 'title' => 'Heritage Documentation',   'text' => 'Detailed 3D documentation of heritage structures for preservation, restoration and analysis.', 'points' => ['Detailed 3D Scanning', 'Ortho Images & Drawings', 'Historic Building Information Modeling', 'Restoration Support']],
            ['icon' => 'factory',  'title' => 'Industrial Plant Scanning','text' => 'Accurate scanning of industrial plants, equipment and structures for design and operations.', 'points' => ['Plant & Equipment Scanning', 'Piping & Structure Capture', 'Shutdown & Turnaround Support', '3D Plant Modeling']],
        ],
        'why' => [
            ['icon' => 'target',   'text' => 'High Accuracy & Reliability'],
            ['icon' => 'clock',    'text' => 'Fast Turnaround Time'],
            ['icon' => 'tools',    'text' => 'Advanced Technology & Tools'],
            ['icon' => 'users',    'text' => 'Experienced Professionals'],
            ['icon' => 'database', 'text' => 'Data Security & Quality'],
            ['icon' => 'headset',  'text' => 'End-to-End Support & Consultation'],
        ],
    ],

];
