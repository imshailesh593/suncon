<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            // ── Site ──────────────────────────────────────────────────────────
            'site.name'             => 'Suncon Engineers Pvt. Ltd.',
            'site.tagline'          => 'Architecture, Landscape & Interior Design',
            'site.founded'          => '1999',
            'site.iso'              => 'ISO 9001:2015',
            'site.address'          => "P1/9, Sai Palace, Near Lohia-Jain IT Park,\nBhusari Colony, Paud Road,\nKothrud, Pune — 411038",
            'site.phone'            => '+91 93716 54387',
            'site.phone2'           => '+91 74200 02915',
            'site.email'            => 'bd@sunconengineers.com',
            'site.email_hr'         => 'hr@sunconengineers.com',
            'site.footer_tagline'   => 'Shaping India\'s Built Environment Since 1999',
            'site.social_instagram' => 'https://www.instagram.com/sunconengineers',
            'site.social_linkedin'  => 'https://www.linkedin.com/company/sunconengineers',
            'site.social_facebook'  => 'https://www.facebook.com/sunconengineers',
            'site.social_youtube'   => 'https://www.youtube.com/@SunconEngineers',
            'site.social_twitter'   => '',
            'site.social_behance'   => '',
            'site.seo_title'        => 'Suncon Engineers | Architecture, Landscape & Interior Design',
            'site.seo_description'  => 'A multidisciplinary design consultancy delivering architecture, landscape & interior design across India since 1999.',
            'site.ga_id'            => '',
            'site.maps_key'         => '',

            // ── Homepage ──────────────────────────────────────────────────────
            'homepage.hero_line1'        => 'Architecture',
            'homepage.hero_line2'        => '& Design.',
            'homepage.hero_subtitle'     => 'A multidisciplinary consultancy delivering architecture, landscape & interior design across India since 1999.',
            'homepage.cta_primary'       => 'View Our Work',
            'homepage.cta_secondary'     => 'Our Services',
            'homepage.projects_eyebrow'  => 'Selected Work',
            'homepage.projects_title'    => 'Recent Projects',
            'homepage.services_eyebrow'  => 'What We Do',
            'homepage.services_title'    => 'Our Services',
            'homepage.about_eyebrow'     => 'Who We Are',
            'homepage.about_title'       => 'A Studio Built on Rigour & Craft',
            'homepage.about_body'        => 'Founded in 1999, Suncon Engineers is an ISO-certified multidisciplinary practice delivering architecture, landscape, interior and infrastructure projects across India.',
            'homepage.journal_eyebrow'   => 'From the Studio',
            'homepage.journal_title'     => 'Journal',

            // ── About ─────────────────────────────────────────────────────────
            'about.hero_line1'          => 'Building for',
            'about.hero_line2'          => 'People & Place',
            'about.intro_p1'            => 'Founded in 1999, Suncon Engineers Pvt. Ltd. is an ISO-certified multidisciplinary design consultancy headquartered in Pune, India. Over 25 years we have delivered architecture, landscape, interior and infrastructure projects that thoughtfully respond to context, climate and the people who inhabit them.',
            'about.intro_p2'            => 'Our integrated studio brings together architects, landscape architects, interior designers, BIM specialists and project managers under one roof — enabling seamless collaboration from feasibility through to handover.',
            'about.philosophy_eyebrow'  => 'Our Philosophy',
            'about.philosophy_title'    => 'Design with intention.',
            'about.philosophy_p1'       => 'We believe great architecture begins with listening — to the site, the community, and the brief. Every project is an opportunity to contribute positively to its context while exceeding client expectations.',
            'about.philosophy_p2'       => 'Our practice spans residential towers and campuses, public parks and waterfronts, premium interiors and civic infrastructure. Across all scales, we apply the same rigour: contextual research, sustainable strategies, and meticulous detailing.',
            'about.philosophy_p3'       => 'Being ISO-certified reflects our commitment to quality management at every stage — from initial concept to project delivery and beyond.',
            'about.values'              => "Contextual Design\nSustainability\nClient Partnership\nIntegrated Delivery",

            // ── Contact ───────────────────────────────────────────────────────
            'contact.hero_title'    => 'Contact',
            'contact.hero_subtitle' => 'Get in touch with Suncon Engineers. Start a project, ask a question, or visit our offices in Pune.',
            'contact.address'       => "P1/9, Sai Palace,\nNear Lohia-Jain IT Park,\nBhusari Colony, Paud Road,\nKothrud, Pune — 411038",
            'contact.office_hours'  => 'Mon – Sat, 9:30 am – 6:30 pm',
            'contact.map_embed'     => '',
        ];

        foreach ($defaults as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
