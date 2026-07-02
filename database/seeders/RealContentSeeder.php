<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;
use App\Models\Setting;
use App\Models\Statistic;

class RealContentSeeder extends Seeder
{
    public function run(): void
    {
        // ── 1. SETTINGS — real company data ───────────────────────────────────
        $settings = [
            'site.tagline'         => 'Building A Better World',
            'site.phone'           => '+91 93716 54387',
            'site.phone2'          => '+91 74200 02915',
            'site.email'           => 'bd@sunconengineers.com',
            'site.email_hr'        => 'hr@sunconengineers.com',
            'site.founded'         => '1999',
            'site.social_twitter'  => 'https://twitter.com/Suncon_Engineer',
            'site.social_facebook' => 'https://www.facebook.com/SunconEngineers',
            'site.footer_tagline'  => 'ISO-certified architecture studio delivering architectural design, landscape design, and interior design across India since 1999.',

            'homepage.hero_line1'    => 'Crafting Spaces',
            'homepage.hero_line2'    => 'That Endure',
            'homepage.hero_subtitle' => 'An independent architecture studio providing Architectural Design, Landscape Design, and Interior Design services across India — ISO-certified since 1999.',

            'about.intro_p1' => 'Suncon Engineers Pvt. Ltd. is an ISO-certified independent architecture consultancy based in Pune, with offices in Coimbatore. Since 1999, the studio has delivered Architectural Design, Landscape Design, and Interior Design services across residential, commercial, hospitality, healthcare, industrial, and educational typologies.',
            'about.intro_p2' => 'Our architects, landscape designers, and interior specialists work together from concept through completion — balancing client vision, technical rigour, and environmental responsibility to create spaces that are both beautiful and enduring.',

            'contact.address'      => 'P1/9, Sai Palace, Near Lohia-Jain IT Park, Bhusari Colony (Right Side), Paud Road, Kothrud, Pune – 411 038, Maharashtra, India.',
            'contact.address2'     => 'D.No.26, 3rd Street, 2nd Cross Alamu Nagar, Sathy Road, Coimbatore, Tamil Nadu 641 012.',
            'contact.office_hours' => 'Mon – Sat: 9:30 am – 6:30 pm',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // ── 2. SERVICE DESCRIPTIONS — real descriptions from architecture page ─
        $services = [
            [
                'slug'        => 'architectural-design',
                'title'       => 'Architectural Design',
                'tagline'     => 'Functional, aesthetic structures built to last.',
                'description' => 'Suncon Architecture is an independent consultancy firm providing architectural design services across residential, commercial, hospitality, healthcare, industrial, and educational typologies. We balance client vision, safety codes, structural rigour, and environmental responsiveness at every stage of the design process.',
                'features'    => [
                    'Concept & Schematic Design',
                    'Working Drawings & Detailed Documentation',
                    'Town Planning & Layout Approvals',
                    'Structural Coordination',
                    'Construction Administration & Site Supervision',
                    'Project Types: Residential, Commercial, Hospitality, Healthcare, Industrial, Educational Campus, Resorts',
                ],
            ],
            [
                'slug'        => 'landscape-design',
                'title'       => 'Landscape Design',
                'tagline'     => 'Outdoor spaces as thoughtful as the buildings they surround.',
                'description' => 'Our landscape design practice integrates outdoor planning with architecture to enhance aesthetics, ecology, and functionality in a unified environment. We design landscapes for townships, campuses, resorts, industrial premises, and public spaces — creating outdoor environments that are site-responsive and resilient.',
                'features'    => [
                    'Landscape Master Planning',
                    'Site Analysis & Ecological Assessment',
                    'Planting Design & Species Selection',
                    'Hardscape, Water Features & Pathways',
                    'Township & Campus Landscapes',
                    'Resort & Hospitality Grounds',
                ],
            ],
            [
                'slug'        => 'interior-design',
                'title'       => 'Interior Design',
                'tagline'     => 'Environments shaped for how people really live and work.',
                'description' => 'Our interior design studio enhances indoor spaces through strategic arrangement of furnishings, colour palettes, and materials to achieve both utility and visual appeal. From healthcare imaging centres to luxury resorts and corporate offices, we begin with a careful reading of how a space will actually be occupied.',
                'features'    => [
                    'Interior Architecture & Space Planning',
                    'Furniture, Joinery & Fixture Design',
                    'Material & Finish Specification',
                    'Lighting Design & Mood',
                    'Healthcare & Specialised Interiors',
                    'Hospitality, Resort & Residential Interiors',
                ],
            ],
        ];

        foreach ($services as $data) {
            $slug = $data['slug'];
            unset($data['slug']);
            \App\Models\Service::where('slug', $slug)->update($data);
        }

        // ── 3. TEAM MEMBER — Ramdas Mohite ────────────────────────────────────
        TeamMember::updateOrCreate(
            ['name' => 'Ramdas Mohite'],
            [
                'role'       => 'Senior Site Manager',
                'bio'        => 'Twenty years of on-ground project experience across Maharashtra, Karnataka, and Tamil Nadu. Ramdas oversees field operations and construction coordination for Suncon\'s architecture projects.',
                'image'      => 'https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?w=600&q=80',
                'sort_order' => 4,
            ]
        );

        // ── 4. STATISTICS ──────────────────────────────────────────────────────
        Statistic::truncate();
        $stats = [
            ['value' => '250', 'suffix' => '+', 'label' => 'Projects Completed',  'sort_order' => 1],
            ['value' => '26',  'suffix' => '+', 'label' => 'Years of Excellence', 'sort_order' => 2],
            ['value' => '12',  'suffix' => '+', 'label' => 'States Covered',      'sort_order' => 3],
            ['value' => '150', 'suffix' => '+', 'label' => 'Clients Served',      'sort_order' => 4],
            ['value' => '3',   'suffix' => '',  'label' => 'Design Disciplines',  'sort_order' => 5],
            ['value' => '2',   'suffix' => '',  'label' => 'Offices in India',    'sort_order' => 6],
        ];
        foreach ($stats as $s) {
            Statistic::create($s);
        }
    }
}
