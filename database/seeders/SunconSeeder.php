<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Client;
use App\Models\Article;
use App\Models\Statistic;

class SunconSeeder extends Seeder
{
    public function run(): void
    {
        /* ---- PROJECTS ---- */
        $projects = [
            ['title'=>'Cadbury Manufacturing Facility','slug'=>'cadbury-manufacturing-facility','discipline'=>'architecture','location'=>'Pune, Maharashtra','year'=>'2010','image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture1-.jpg','description'=>"Suncon's landmark first architecture commission — a large-scale manufacturing and administrative complex for Cadbury India. The facility integrates industrial efficiency with thoughtfully designed employee amenities, natural daylighting, and robust structural systems suited to the food-grade production environment.",'client'=>'Cadbury India Ltd. (Mondelez)','area'=>'12,500 sqm','featured'=>true,'sort_order'=>1],
            ['title'=>'Castrol PMC Project','slug'=>'castrol-pmc-project','discipline'=>'architecture','location'=>'Mumbai, Maharashtra','year'=>'2015','image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture2-.jpg','description'=>"Suncon's first Project Management Consultancy commission at Castrol India's facility. Comprehensive PMC services spanning tender management, contractor supervision, quality assurance testing, and as-built documentation for the full building lifecycle.",'client'=>'Castrol India Ltd.','area'=>'8,200 sqm','featured'=>true,'sort_order'=>2],
            ['title'=>'Eklavya Model Residential School','slug'=>'eklavya-model-residential-school','discipline'=>'architecture','location'=>'West Singhbhum, Jharkhand','year'=>'2026','image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture3-.jpg','description'=>'Architectural and engineering consultancy services for a new EMRS campus serving tribal communities in Jharkhand. The design prioritises passive cooling, natural cross-ventilation, and connectivity with the surrounding landscape.','client'=>'Government of Jharkhand','area'=>'6,800 sqm','featured'=>false,'sort_order'=>3],
            ['title'=>'Coimbatore Integrated SWD System','slug'=>'coimbatore-storm-water-drainage','discipline'=>'urban','location'=>'Coimbatore, Tamil Nadu','year'=>'2025','image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/08/Picture5-min.png','description'=>'Detailed Project Report for an integrated storm water drainage system covering 257 sq km of Coimbatore city. The project involved topographic surveys, hydrological modelling, drainage network design, and environmental impact analysis to mitigate urban flooding.','client'=>'Coimbatore City Municipal Corporation','area'=>'257 sq km','featured'=>true,'sort_order'=>4],
            ['title'=>'Luxury Residential Township','slug'=>'residential-township-pune','discipline'=>'architecture','location'=>'Kothrud, Pune','year'=>'2022','image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture4-.jpg','description'=>"A premium residential township in Pune's Kothrud precinct comprising 120 units across four blocks. The design responds to Maharashtra's climate through shaded balconies, landscaped courts, and a central clubhouse that serves as the social heart of the community.",'client'=>'Private Developer','area'=>'22,000 sqm','featured'=>false,'sort_order'=>5],
            ['title'=>'Hospitality & Resort Complex','slug'=>'resort-hospitality-complex','discipline'=>'interior','location'=>'Mahabaleshwar, Maharashtra','year'=>'2023','image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture6-.jpg','description'=>'Complete architectural and interior design consultancy for a hill-station resort in Mahabaleshwar. The design weaves local materials — stone rubble, teak, terracotta — into a contemporary spatial language that evokes the region\'s heritage while meeting modern hospitality standards.','client'=>'Private Hospitality Group','area'=>'4,500 sqm','featured'=>false,'sort_order'=>6],
            ['title'=>'Bathinda Multi-Level Car Park','slug'=>'bathinda-multilevel-car-parking','discipline'=>'architecture','location'=>'Mall Road, Bathinda, Punjab','year'=>'2026','image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture7-.jpg','description'=>'Consultancy services for the design and construction management of a 1,001-bay multi-level car parking facility at Mall Road, Bathinda. The structure integrates public retail at street level with roof-level greenery to reduce the urban heat island effect.','client'=>'Municipal Corporation, Bathinda','area'=>'18,400 sqm','featured'=>false,'sort_order'=>7],
            ['title'=>'Healthcare Imaging Centre','slug'=>'healthcare-imaging-centre','discipline'=>'interior','location'=>'Pune, Maharashtra','year'=>'2021','image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/05/beautiful-modern-building-modern-architecture.jpg','description'=>'Interior architecture and planning consultancy for a diagnostic imaging centre in Pune. Specialised requirements — radiation shielding, infection-control workflows, and calm patient environments — were resolved through rigorous planning and material specification.','client'=>'Private Healthcare Group','area'=>'1,800 sqm','featured'=>false,'sort_order'=>8],
        ];
        foreach ($projects as $p) { Project::create($p); }

        /* ---- SERVICES ---- */
        $services = [
            ['title'=>'Architecture','slug'=>'architectural-design','description'=>'From residences to large industrial and commercial campuses, our architecture practice balances client needs, safety codes, structural rigour, and environmental responsiveness. We work across residential, commercial, hospitality, healthcare, industrial, and educational typologies all over India.','image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture1-.jpg','features'=>json_encode(['Concept & Schematic Design','Detailed Architectural Drawings','Working Drawings & Documentation','Town Planning & Layout Approvals','Structural Coordination','Construction Administration']),'sort_order'=>1],
            ['title'=>'Interior Design','slug'=>'interior-design','description'=>'Our interior design studio creates environments specific to their occupants — in palette, proportion, and mood. From healthcare imaging centres to luxury resorts and corporate offices, we begin with a careful reading of how a space will be lived and worked in.','image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture6-.jpg','features'=>json_encode(['Interior Architecture','Furniture & Joinery Design','Material & Finish Specification','Lighting Design','Healthcare & Specialised Interiors','Hospitality & Resort Interiors']),'sort_order'=>2],
            ['title'=>'Landscape Design','slug'=>'landscape-design','description'=>"Landscape design integrates outdoor planning with architecture to enhance aesthetics, ecology, and functionality. Suncon's landscape team designs outdoor environments for townships, campuses, industrial premises, and public spaces.",'image'=>'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture3-.jpg','features'=>json_encode(['Landscape Master Planning','Site Analysis & Ecology','Planting Design & Species Selection','Hardscape & Water Features','Township & Campus Landscapes','Environmental Impact Assessments']),'sort_order'=>3],
        ];
        foreach ($services as $s) { Service::create($s); }

        /* ---- TEAM ---- */
        $team = [
            ['name'=>'Rajendra Magar','role'=>'Director & CEO','bio'=>"With 26+ years in infrastructure development and a reputation for accountability, Rajendra leads Suncon's strategic direction. He is a Life Member of the Indian Society of Geomatics and the Indian Road Congress.",'image'=>'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80','sort_order'=>1],
            ['name'=>'Hemant Lele','role'=>'Principal Architect','bio'=>'Hemant has operated his own architectural practice since 1993 and brings over three decades of cross-sector design expertise to Suncon, spanning residential, commercial, hospitality, and healthcare typologies.','image'=>'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=600&q=80','sort_order'=>2],
            ['name'=>'Gaurav Magar','role'=>'Senior Architect','bio'=>'A B.Arch graduate from PVP College, Gaurav specialises in performative architecture that responds rigorously to climate, context, and structural logic. He leads project delivery for commercial and residential commissions.','image'=>'https://images.unsplash.com/photo-1531384441138-2736e62e0919?w=600&q=80','sort_order'=>3],
            ['name'=>'Aishwarya Magar','role'=>'Landscape Architect','bio'=>"Aishwarya holds a Master's degree from BNCA and leads Suncon's landscape design studio. Her work integrates ecological thinking with site-responsive design to create outdoor environments that are both beautiful and resilient.",'image'=>'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=600&q=80','sort_order'=>4],
            ['name'=>'Chandrashekhar Sabnis','role'=>'Senior Engineer','bio'=>"38 years of experience in planning, design, estimation, and construction management. A former MIDC employee, Chandrashekhar brings invaluable knowledge of Maharashtra's infrastructure landscape to every project.",'image'=>'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=600&q=80','sort_order'=>5],
            ['name'=>'Suresh Wagh','role'=>'Operations Director','bio'=>'An M.E. in Public Health Engineering with 40 years of professional experience, including senior advisory roles with the Government of Maharashtra. Suresh oversees project operations and quality management systems.','image'=>'https://images.unsplash.com/photo-1566492031773-4f4e44671857?w=600&q=80','sort_order'=>6],
        ];
        foreach ($team as $t) { TeamMember::create($t); }

        /* ---- CLIENTS ---- */
        $clients = [
            ['name'=>'Cadbury India','category'=>'Corporate','sort_order'=>1],
            ['name'=>'Castrol India','category'=>'Corporate','sort_order'=>2],
            ['name'=>'NRSC','category'=>'Government','sort_order'=>3],
            ['name'=>'MIDC','category'=>'Government','sort_order'=>4],
            ['name'=>'Govt. of Jharkhand','category'=>'Government','sort_order'=>5],
            ['name'=>'Govt. of Maharashtra','category'=>'Government','sort_order'=>6],
            ['name'=>'Coimbatore Corporation','category'=>'Municipal','sort_order'=>7],
            ['name'=>'Municipal Corp. Bathinda','category'=>'Municipal','sort_order'=>8],
            ['name'=>'Maharashtra PWD','category'=>'Government','sort_order'=>9],
            ['name'=>'Indian Railways','category'=>'Government','sort_order'=>10],
            ['name'=>'Talegaon MIDC','category'=>'Government','sort_order'=>11],
            ['name'=>'Prime Tech Park','category'=>'Private','sort_order'=>12],
        ];
        foreach ($clients as $c) { Client::create($c); }

        /* ---- ARTICLES ---- */
        $articles = [
            ['title'=>'BIM is Transforming How India Builds','slug'=>'bim-future-india-architecture','excerpt'=>'Building Information Modelling is reshaping the Indian construction industry — from complex infrastructure to residential towers. We explore how integrated 3D workflows are reducing cost overruns and improving coordination across disciplines.','image'=>'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=800&q=80','author'=>'Gaurav Magar','category'=>'Insights','published_at'=>'2025-03-18','read_time'=>'6 min read'],
            ['title'=>'The Missing Green: Landscape Design in Indian Cities','slug'=>'landscape-architecture-indian-cities','excerpt'=>'As Indian cities densify at record pace, the case for integrated landscape architecture has never been stronger. Thoughtful green infrastructure is not an aesthetic add-on — it is essential urban climate infrastructure.','image'=>'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=800&q=80','author'=>'Aishwarya Magar','category'=>'Opinion','published_at'=>'2025-01-22','read_time'=>'5 min read'],
            ['title'=>"Why Project Management Consultancy Matters for India's Infrastructure Push",'slug'=>'pmc-services-infrastructure','excerpt'=>"Government infrastructure investment in India is at an all-time high. But budget overruns and delayed handovers continue to erode value. Rigorous PMC services are the bridge between ambition and execution.",'image'=>'https://images.unsplash.com/photo-1480714378408-67cf0d13bc1b?w=800&q=80','author'=>'Rajendra Magar','category'=>'Research','published_at'=>'2024-11-05','read_time'=>'7 min read'],
            ['title'=>'Passive Design in Hot Climates: Lessons from Pune and Coimbatore','slug'=>'passive-design-hot-climate','excerpt'=>'Mechanical cooling is expensive and carbon-intensive. Drawing on projects across Maharashtra and Tamil Nadu, our architects share passive design strategies that genuinely reduce thermal loads without sacrificing spatial quality.','image'=>'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800&q=80','author'=>'Hemant Lele','category'=>'Studio Notes','published_at'=>'2024-09-14','read_time'=>'5 min read'],
        ];
        foreach ($articles as $a) { Article::create($a); }

        /* ---- STATISTICS ---- */
        $stats = [
            ['value'=>'250','suffix'=>'+','label'=>'Projects Completed','sort_order'=>1],
            ['value'=>'26','suffix'=>'+','label'=>'Years of Excellence','sort_order'=>2],
            ['value'=>'150','suffix'=>'+','label'=>'Happy Clients','sort_order'=>3],
            ['value'=>'12','suffix'=>'+','label'=>'States Covered','sort_order'=>4],
            ['value'=>'8','suffix'=>'+','label'=>'Service Disciplines','sort_order'=>5],
            ['value'=>'500','suffix'=>'k+','label'=>'Area Designed (sqm)','sort_order'=>6],
        ];
        foreach ($stats as $s) { Statistic::create($s); }
    }
}
