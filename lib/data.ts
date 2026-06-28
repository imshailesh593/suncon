import { Project, Person, Article, Statistic, Service, Client } from './types'

/* ---- PROJECTS ---- */
export const projects: Project[] = [
  {
    id: '1',
    slug: 'cadbury-manufacturing-facility',
    title: 'Cadbury Manufacturing Facility',
    discipline: 'architecture',
    location: 'Pune, Maharashtra',
    year: 2010,
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture1-.jpg',
    images: [
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture1-.jpg',
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture2-.jpg',
    ],
    description:
      'Suncon\'s landmark first architecture commission — a large-scale manufacturing and administrative complex for Cadbury India. The facility integrates industrial efficiency with thoughtfully designed employee amenities, natural daylighting, and robust structural systems suited to the food-grade production environment.',
    client: 'Cadbury India Ltd. (Mondelez)',
    area: '12,500 sqm',
    tags: ['Industrial', 'Commercial', 'Architecture'],
    featured: true,
  },
  {
    id: '2',
    slug: 'castrol-pmc-project',
    title: 'Castrol PMC Project',
    discipline: 'architecture',
    location: 'Mumbai, Maharashtra',
    year: 2015,
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture2-.jpg',
    images: [
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture2-.jpg',
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture3-.jpg',
    ],
    description:
      'Suncon\'s first Project Management Consultancy commission at Castrol India\'s facility. Comprehensive PMC services spanning tender management, contractor supervision, quality assurance testing, and as-built documentation for the full building lifecycle.',
    client: 'Castrol India Ltd.',
    area: '8,200 sqm',
    tags: ['Commercial', 'PMC', 'Industrial'],
    featured: true,
  },
  {
    id: '3',
    slug: 'eklavya-model-residential-school',
    title: 'Eklavya Model Residential School',
    discipline: 'architecture',
    location: 'West Singhbhum, Jharkhand',
    year: 2026,
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture3-.jpg',
    images: [
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture3-.jpg',
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture4-.jpg',
    ],
    description:
      'Architectural and engineering consultancy services for a new EMRS campus serving tribal communities in Jharkhand. The design prioritises passive cooling, natural cross-ventilation, and connectivity with the surrounding landscape.',
    client: 'Government of Jharkhand',
    area: '6,800 sqm',
    tags: ['Educational', 'Civic', 'Architecture'],
    featured: false,
  },
  {
    id: '4',
    slug: 'coimbatore-storm-water-drainage',
    title: 'Coimbatore Integrated SWD System',
    discipline: 'urban',
    location: 'Coimbatore, Tamil Nadu',
    year: 2025,
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/08/Picture5-min.png',
    images: [
      'https://www.sunconengineers.com/wp-content/uploads/2025/08/Picture5-min.png',
    ],
    description:
      'Detailed Project Report for an integrated storm water drainage system covering 257 sq km of Coimbatore city. The project involved topographic surveys, hydrological modelling, drainage network design, and environmental impact analysis to mitigate urban flooding.',
    client: 'Coimbatore City Municipal Corporation',
    area: '257 sq km',
    tags: ['Urban Infrastructure', 'DPR', 'Drainage'],
    featured: true,
  },
  {
    id: '5',
    slug: 'residential-township-pune',
    title: 'Luxury Residential Township',
    discipline: 'architecture',
    location: 'Kothrud, Pune',
    year: 2022,
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture4-.jpg',
    images: [
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture4-.jpg',
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture6-.jpg',
    ],
    description:
      'A premium residential township in Pune\'s Kothrud precinct comprising 120 units across four blocks. The design responds to Maharashtra\'s climate through shaded balconies, landscaped courts, and a central clubhouse that serves as the social heart of the community.',
    client: 'Private Developer',
    area: '22,000 sqm',
    tags: ['Residential', 'Township', 'Architecture'],
    featured: false,
  },
  {
    id: '6',
    slug: 'resort-hospitality-complex',
    title: 'Hospitality & Resort Complex',
    discipline: 'interior',
    location: 'Mahabaleshwar, Maharashtra',
    year: 2023,
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture6-.jpg',
    images: [
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture6-.jpg',
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture7-.jpg',
    ],
    description:
      'Complete architectural and interior design consultancy for a hill-station resort in Mahabaleshwar. The design weaves local materials — stone rubble, teak, terracotta — into a contemporary spatial language that evokes the region\'s heritage while meeting modern hospitality standards.',
    client: 'Private Hospitality Group',
    area: '4,500 sqm',
    tags: ['Hospitality', 'Interior Design', 'Resort'],
    featured: false,
  },
  {
    id: '7',
    slug: 'bathinda-multilevel-car-parking',
    title: 'Bathinda Multi-Level Car Park',
    discipline: 'architecture',
    location: 'Mall Road, Bathinda, Punjab',
    year: 2026,
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture7-.jpg',
    images: [
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture7-.jpg',
    ],
    description:
      'Consultancy services for the design and construction management of a 1,001-bay multi-level car parking facility at Mall Road, Bathinda. The structure integrates public retail at street level with roof-level greenery to reduce the urban heat island effect.',
    client: 'Municipal Corporation, Bathinda',
    area: '18,400 sqm',
    tags: ['Infrastructure', 'Urban', 'Commercial'],
    featured: false,
  },
  {
    id: '8',
    slug: 'healthcare-imaging-centre',
    title: 'Healthcare Imaging Centre',
    discipline: 'interior',
    location: 'Pune, Maharashtra',
    year: 2021,
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/05/beautiful-modern-building-modern-architecture.jpg',
    images: [
      'https://www.sunconengineers.com/wp-content/uploads/2025/05/beautiful-modern-building-modern-architecture.jpg',
    ],
    description:
      'Interior architecture and planning consultancy for a diagnostic imaging centre in Pune. Specialised requirements — radiation shielding, infection-control workflows, and calm patient environments — were resolved through rigorous planning and material specification.',
    client: 'Private Healthcare Group',
    area: '1,800 sqm',
    tags: ['Healthcare', 'Interior Design', 'Specialised'],
    featured: false,
  },
]

export const featuredProjects = projects.filter((p) => p.featured)

/* ---- TEAM ---- */
export const people: Person[] = [
  {
    id: '1',
    name: 'Rajendra Magar',
    role: 'Director & CEO',
    bio: 'With 26+ years in infrastructure development and a reputation for accountability, Rajendra leads Suncon\'s strategic direction. He is a Life Member of the Indian Society of Geomatics and the Indian Road Congress.',
    image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80',
  },
  {
    id: '2',
    name: 'Hemant Lele',
    role: 'Principal Architect',
    bio: 'Hemant has operated his own architectural practice since 1993 and brings over three decades of cross-sector design expertise to Suncon, spanning residential, commercial, hospitality, and healthcare typologies.',
    image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=600&q=80',
  },
  {
    id: '3',
    name: 'Gaurav Magar',
    role: 'Senior Architect',
    bio: 'A B.Arch graduate from PVP College, Gaurav specialises in performative architecture that responds rigorously to climate, context, and structural logic. He leads project delivery for commercial and residential commissions.',
    image: 'https://images.unsplash.com/photo-1531384441138-2736e62e0919?w=600&q=80',
  },
  {
    id: '4',
    name: 'Aishwarya Magar',
    role: 'Landscape Architect',
    bio: 'Aishwarya holds a Master\'s degree from BNCA and leads Suncon\'s landscape design studio. Her work integrates ecological thinking with site-responsive design to create outdoor environments that are both beautiful and resilient.',
    image: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=600&q=80',
  },
  {
    id: '5',
    name: 'Chandrashekhar Sabnis',
    role: 'Senior Engineer',
    bio: '38 years of experience in planning, design, estimation, and construction management. A former MIDC employee, Chandrashekhar brings invaluable knowledge of Maharashtra\'s infrastructure landscape to every project.',
    image: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=600&q=80',
  },
  {
    id: '6',
    name: 'Suresh Wagh',
    role: 'Operations Director',
    bio: 'An M.E. in Public Health Engineering with 40 years of professional experience, including senior advisory roles with the Government of Maharashtra. Suresh oversees project operations and quality management systems.',
    image: 'https://images.unsplash.com/photo-1566492031773-4f4e44671857?w=600&q=80',
  },
]

/* ---- ARTICLES ---- */
export const articles: Article[] = [
  {
    id: '1',
    slug: 'bim-future-india-architecture',
    title: 'BIM is Transforming How India Builds',
    excerpt:
      'Building Information Modelling is reshaping the Indian construction industry — from complex infrastructure to residential towers. We explore how integrated 3D workflows are reducing cost overruns and improving coordination across disciplines.',
    image: 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=800&q=80',
    date: '2025-03-18',
    category: 'Insights',
    author: 'Gaurav Magar',
  },
  {
    id: '2',
    slug: 'landscape-architecture-indian-cities',
    title: 'The Missing Green: Landscape Design in Indian Cities',
    excerpt:
      'As Indian cities densify at record pace, the case for integrated landscape architecture has never been stronger. Thoughtful green infrastructure is not an aesthetic add-on — it is essential urban climate infrastructure.',
    image: 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=800&q=80',
    date: '2025-01-22',
    category: 'Opinion',
    author: 'Aishwarya Magar',
  },
  {
    id: '3',
    slug: 'pmc-services-infrastructure',
    title: "Why Project Management Consultancy Matters for India's Infrastructure Push",
    excerpt:
      "Government infrastructure investment in India is at an all-time high. But budget overruns and delayed handovers continue to erode value. Rigorous PMC services are the bridge between ambition and execution.",
    image: 'https://images.unsplash.com/photo-1480714378408-67cf0d13bc1b?w=800&q=80',
    date: '2024-11-05',
    category: 'Research',
    author: 'Rajendra Magar',
  },
  {
    id: '4',
    slug: 'passive-design-hot-climate',
    title: 'Passive Design in Hot Climates: Lessons from Pune and Coimbatore',
    excerpt:
      'Mechanical cooling is expensive and carbon-intensive. Drawing on projects across Maharashtra and Tamil Nadu, our architects share passive design strategies that genuinely reduce thermal loads without sacrificing spatial quality.',
    image: 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800&q=80',
    date: '2024-09-14',
    category: 'Studio Notes',
    author: 'Hemant Lele',
  },
]

/* ---- STATISTICS ---- */
export const statistics: Statistic[] = [
  {
    value: '250', suffix: '+',
    label: 'Projects Completed',
    description: 'Architecture, landscape, interior, BIM, surveying, and infrastructure projects across India.',
    icon: 'building',
  },
  {
    value: '26', suffix: '+',
    label: 'Years of Excellence',
    description: 'Established in 1999, ISO Certified, serving clients across India for over two decades.',
    icon: 'clock',
  },
  {
    value: '150', suffix: '+',
    label: 'Happy Clients',
    description: 'Government bodies, PSUs, private developers, and corporate clients across India.',
    icon: 'people',
  },
  {
    value: '12', suffix: '+',
    label: 'States Covered',
    description: 'Active and completed projects spanning Maharashtra, Tamil Nadu, Jharkhand, Punjab and more.',
    icon: 'map',
  },
  {
    value: '8', suffix: '+',
    label: 'Service Disciplines',
    description: 'Architecture, Landscape, Interior, Town Planning, PMC, BIM, MEP, Surveying.',
    icon: 'award',
  },
  {
    value: '500', suffix: 'k+',
    label: 'Area Designed (sqm)',
    description: 'Total built and planned area across all project typologies nationwide.',
    icon: 'area',
  },
]

/* ---- SERVICES ---- */
export const services: Service[] = [
  {
    id: '1',
    slug: 'architectural-design',
    title: 'Architecture',
    tagline: 'Buildings that belong.',
    description:
      'From residences to large industrial and commercial campuses, our architecture practice balances client needs, safety codes, structural rigour, and environmental responsiveness. We work across residential, commercial, hospitality, healthcare, industrial, and educational typologies all over India.',
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture1-.jpg',
    features: [
      'Concept & Schematic Design',
      'Detailed Architectural Drawings',
      'Working Drawings & Documentation',
      'Town Planning & Layout Approvals',
      'Structural Coordination',
      'Construction Administration',
    ],
  },
  {
    id: '2',
    slug: 'interior-design',
    title: 'Interior Design',
    tagline: 'Spaces that feel alive.',
    description:
      'Our interior design studio creates environments specific to their occupants — in palette, proportion, and mood. From healthcare imaging centres to luxury resorts and corporate offices, we begin with a careful reading of how a space will be lived and worked in.',
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture6-.jpg',
    features: [
      'Interior Architecture',
      'Furniture & Joinery Design',
      'Material & Finish Specification',
      'Lighting Design',
      'Healthcare & Specialised Interiors',
      'Hospitality & Resort Interiors',
    ],
  },
  {
    id: '3',
    slug: 'landscape-design',
    title: 'Landscape Design',
    tagline: 'Nature, shaped with purpose.',
    description:
      'Landscape design integrates outdoor planning with architecture to enhance aesthetics, ecology, and functionality. Suncon\'s landscape team designs outdoor environments for townships, campuses, industrial premises, and public spaces.',
    image: 'https://www.sunconengineers.com/wp-content/uploads/2025/05/Picture3-.jpg',
    features: [
      'Landscape Master Planning',
      'Site Analysis & Ecology',
      'Planting Design & Species Selection',
      'Hardscape & Water Features',
      'Township & Campus Landscapes',
      'Environmental Impact Assessments',
    ],
  },
]

/* ---- CLIENTS ---- */
export const clients: Client[] = [
  { name: 'Cadbury India', category: 'Corporate' },
  { name: 'Castrol India', category: 'Corporate' },
  { name: 'NRSC', category: 'Government' },
  { name: 'MIDC', category: 'Government' },
  { name: 'Govt. of Jharkhand', category: 'Government' },
  { name: 'Govt. of Maharashtra', category: 'Government' },
  { name: 'Coimbatore Corporation', category: 'Municipal' },
  { name: 'Municipal Corp. Bathinda', category: 'Municipal' },
  { name: 'Maharashtra PWD', category: 'Government' },
  { name: 'Indian Railways', category: 'Government' },
  { name: 'Talegaon MIDC', category: 'Government' },
  { name: 'Private Developers', category: 'Private' },
]
