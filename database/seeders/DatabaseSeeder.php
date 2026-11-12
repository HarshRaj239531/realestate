<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use App\Models\Inquiry;
use App\Models\Property;
use App\Models\SiteImage;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Users
        $admin = User::updateOrCreate(
            ['email' => 'admin@realestate.com'],
            [
                'name' => 'Admin RealEstate',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
                'phone' => '+91 98765 43210',
            ]
        );

        $client = User::updateOrCreate(
            ['email' => 'user@realestate.com'],
            [
                'name' => 'Rahul Verma',
                'password' => Hash::make('user123'),
                'is_admin' => false,
                'phone' => '+91 98111 22334',
            ]
        );

        // 2. Centralized Site Settings (Colors & Brand Details)
        $settings = [
            ['key' => 'brand_name', 'value' => 'RealEstate', 'label' => 'Brand Name', 'group' => 'general', 'type' => 'text'],
            ['key' => 'brand_tagline', 'value' => 'Find Eco-Friendly Homes Easily', 'label' => 'Brand Tagline', 'group' => 'general', 'type' => 'text'],
            ['key' => 'brand_primary_color', 'value' => '#2f9049', 'label' => 'Primary Brand Color (Green)', 'group' => 'theme', 'type' => 'color'],
            ['key' => 'brand_primary_dark', 'value' => '#236c37', 'label' => 'Primary Dark Color', 'group' => 'theme', 'type' => 'color'],
            ['key' => 'brand_primary_light', 'value' => '#3ea55a', 'label' => 'Primary Light Color', 'group' => 'theme', 'type' => 'color'],
            ['key' => 'brand_topbar_color', 'value' => '#18202d', 'label' => 'Topbar Background Color', 'group' => 'theme', 'type' => 'color'],
            ['key' => 'brand_accent_color', 'value' => '#0284c7', 'label' => 'Accent Color', 'group' => 'theme', 'type' => 'color'],
            
            ['key' => 'contact_phone', 'value' => '+91 98765 43210', 'label' => 'Support Phone', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'info@realestate.com', 'label' => 'Official Email', 'group' => 'contact', 'type' => 'email'],
            ['key' => 'contact_whatsapp', 'value' => '919876543210', 'label' => 'WhatsApp Number', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'contact_address', 'value' => 'Skyline Tower, 4th Floor, Golf Course Extension Road, Gurugram, Haryana 122002', 'label' => 'Head Office Address', 'group' => 'contact', 'type' => 'textarea'],
            
            ['key' => 'hero_pill_badge', 'value' => '🏠 RealEstate', 'label' => 'Hero Floating Badge', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_title', 'value' => 'Find Eco-Friendly Homes Easily', 'label' => 'Hero Main Heading', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_subtitle', 'value' => 'Featured one stop destination for all your real estate needs. Explore premium plots and homes designed for you.', 'label' => 'Hero Subtitle', 'group' => 'hero', 'type' => 'textarea'],
            ['key' => 'hero_cta_text', 'value' => 'Explore Now', 'label' => 'Hero CTA Button Text', 'group' => 'hero', 'type' => 'text'],

            ['key' => 'stat_experience', 'value' => '15+', 'label' => 'Experience (Years)', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'stat_experience_label', 'value' => 'Years Experience', 'label' => 'Experience Label', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'stat_projects', 'value' => '50+', 'label' => 'Projects Count', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'stat_projects_label', 'value' => 'Premium Projects', 'label' => 'Projects Label', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'stat_families', 'value' => '10K+', 'label' => 'Happy Families Count', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'stat_families_label', 'value' => 'Happy Families', 'label' => 'Families Label', 'group' => 'stats', 'type' => 'text'],

            ['key' => 'social_facebook', 'value' => 'https://facebook.com', 'label' => 'Facebook URL', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com', 'label' => 'Instagram URL', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com', 'label' => 'LinkedIn URL', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com', 'label' => 'Twitter/X URL', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com', 'label' => 'YouTube URL', 'group' => 'social', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 3. Centralized Site Images (Admin editable images)
        $siteImages = [
            [
                'section_key' => 'site_logo',
                'title' => 'Main Site Logo',
                'description' => 'Appears on the top navbar inside the angled white badge and in the footer.',
                'image_path' => 'images/site/logo.svg',
                'fallback_url' => asset('images/site/logo.svg'),
            ],
            [
                'section_key' => 'hero_bg',
                'title' => 'Hero Section Background',
                'description' => 'The large banner image on the homepage featuring luxury modern eco architecture.',
                'image_path' => null,
                'fallback_url' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2400&q=85',
            ],
            [
                'section_key' => 'about_hero',
                'title' => 'About Us Main Image',
                'description' => 'Featured showcase picture on the About Us page.',
                'image_path' => null,
                'fallback_url' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1400&q=80',
            ],
            [
                'section_key' => 'about_mission',
                'title' => 'Mission & Vision Image',
                'description' => 'Displayed alongside the Mission and Sustainability goals on the About page.',
                'image_path' => null,
                'fallback_url' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1400&q=80',
            ],
            [
                'section_key' => 'eco_feature',
                'title' => 'Eco-Friendly Architecture Highlight',
                'description' => 'Featured section on the Homepage demonstrating green architecture and solar technology.',
                'image_path' => null,
                'fallback_url' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1400&q=80',
            ],
            [
                'section_key' => 'cta_banner',
                'title' => 'Call to Action Banner Background',
                'description' => 'Background for the Quick Enquiry & consultation section.',
                'image_path' => null,
                'fallback_url' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1600&q=80',
            ],
            [
                'section_key' => 'properties_hero',
                'title' => 'Properties Page Banner',
                'description' => 'Header background image on the Property listing catalog page.',
                'image_path' => null,
                'fallback_url' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1600&q=80',
            ],
            [
                'section_key' => 'gallery_hero',
                'title' => 'Gallery Page Banner',
                'description' => 'Header background image on the visual Gallery showcase page.',
                'image_path' => null,
                'fallback_url' => 'https://images.unsplash.com/photo-1600565193348-f74bd3c7ccdf?auto=format&fit=crop&w=1600&q=80',
            ],
            [
                'section_key' => 'contact_hero',
                'title' => 'Contact Us Page Banner',
                'description' => 'Header background image on the Contact Us page.',
                'image_path' => null,
                'fallback_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1600&q=80',
            ],
            [
                'section_key' => 'auth_bg',
                'title' => 'Login / Register Side Image',
                'description' => 'Architectural visual shown on the authentication split screen.',
                'image_path' => null,
                'fallback_url' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1200&q=80',
            ],
        ];

        foreach ($siteImages as $sImage) {
            SiteImage::updateOrCreate(['section_key' => $sImage['section_key']], $sImage);
        }

        // 4. Seed Realistic Properties
        $properties = [
            [
                'title' => 'Eco Haven Forest Villa',
                'slug' => 'eco-haven-forest-villa',
                'tagline' => '100% Solar-Powered Luxury Amidst Pine Woods',
                'description' => 'Designed in harmony with nature, Eco Haven Forest Villa combines Scandinavian architectural aesthetics with cutting-edge sustainable engineering. Featuring thermal-efficient timber facades, zero-carbon solar roofs, greywater recycling, and sweeping floor-to-ceiling glass panoramic views into lush private pine forestry.',
                'property_type' => 'villa',
                'status' => 'for_sale',
                'price' => 38500000.00,
                'price_display' => '₹ 3.85 Cr',
                'location' => 'Golf Course Extn, Sector 65',
                'city' => 'Gurugram',
                'state' => 'Haryana',
                'address' => 'Plot 42, Pine Ridge Enclave, Sector 65',
                'bedrooms' => 4,
                'bathrooms' => 4,
                'area_sqft' => 4250,
                'parking_spaces' => 2,
                'is_featured' => true,
                'is_eco_friendly' => true,
                'main_image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=1200&q=80',
                ],
                'amenities' => ['Solar Panels', 'Rainwater Harvesting', 'EV Charging Station', 'Private Garden', 'Smart Automation', 'Air Purification System', 'Clubhouse Access', '24/7 Security'],
                'contact_phone' => '+91 98765 43210',
                'contact_email' => 'sales@aghomesindia.com',
            ],
            [
                'title' => 'The Emerald Serenade Cottage',
                'slug' => 'the-emerald-serenade-cottage',
                'tagline' => 'Handcrafted Natural Stone & Teak Wood Sanctuary',
                'description' => 'Experience tranquility in this handcrafted eco-cottage surrounded by manicured organic orchards and ancient trees. Built using locally sourced quartzite stone, certified sustainable teak wood, and insulated biophilic ventilation that maintains naturally chilled interiors year-round.',
                'property_type' => 'villa',
                'status' => 'for_sale',
                'price' => 26500000.00,
                'price_display' => '₹ 2.65 Cr',
                'location' => 'Sohna Road, South of Gurgaon',
                'city' => 'Gurugram',
                'state' => 'Haryana',
                'address' => 'Estate 12, Valley of Greens, Sohna',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'area_sqft' => 3100,
                'parking_spaces' => 2,
                'is_featured' => true,
                'is_eco_friendly' => true,
                'main_image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1200&q=80',
                ],
                'amenities' => ['Organic Garden', 'Solar Water Heating', 'Wooden Deck', 'Stone Fireplace', 'Borewell Recharge', 'Pet Friendly'],
                'contact_phone' => '+91 98765 43210',
                'contact_email' => 'sales@aghomesindia.com',
            ],
            [
                'title' => 'Skyline Biophilic Penthouse',
                'slug' => 'skyline-biophilic-penthouse',
                'tagline' => '360° Panoramic Greenery with Private Sky Pool',
                'description' => 'A statement in ultra-luxury sustainable high-rise living. This biophilic penthouse incorporates vertical hanging gardens, double-height living areas, an infinity sky pool, and imported low-emissivity acoustic glass that blocks heat while flooding your home with natural sunlight.',
                'property_type' => 'penthouse',
                'status' => 'for_sale',
                'price' => 52000000.00,
                'price_display' => '₹ 5.20 Cr',
                'location' => 'Golf Course Road, DLF Phase 5',
                'city' => 'Gurugram',
                'state' => 'Haryana',
                'address' => 'Floor 28, The Horizon Towers, DLF 5',
                'bedrooms' => 4,
                'bathrooms' => 5,
                'area_sqft' => 4850,
                'parking_spaces' => 3,
                'is_featured' => true,
                'is_eco_friendly' => true,
                'main_image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1200&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=80',
                ],
                'amenities' => ['Private Sky Pool', 'Vertical Forest Garden', 'Concierge 24x7', 'Private Elevator', 'High Speed EV Charging', 'Gym & Spa'],
                'contact_phone' => '+91 98765 43210',
                'contact_email' => 'sales@aghomesindia.com',
            ],
            [
                'title' => 'Meadow Breeze Eco Apartment',
                'slug' => 'meadow-breeze-eco-apartment',
                'tagline' => 'IGBC Platinum Certified Green Residence',
                'description' => 'Experience sustainable urban living with 75% open landscaped green areas, zero-discharge wastewater management, centralized composting, and sensor-based smart LED illumination throughout the premises.',
                'property_type' => 'apartment',
                'status' => 'for_sale',
                'price' => 14500000.00,
                'price_display' => '₹ 1.45 Cr',
                'location' => 'Dwarka Expressway, Sector 102',
                'city' => 'Gurugram',
                'state' => 'Haryana',
                'address' => 'Tower B, Unit 804, Meadow Heights',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'area_sqft' => 1850,
                'parking_spaces' => 1,
                'is_featured' => false,
                'is_eco_friendly' => true,
                'main_image' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=1200&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=1200&q=80',
                ],
                'amenities' => ['IGBC Certified', 'Solar Common Lighting', 'Jogging Track', 'Tennis Court', 'Children Play Zone', 'Power Backup'],
                'contact_phone' => '+91 98765 43210',
                'contact_email' => 'sales@aghomesindia.com',
            ],
            [
                'title' => 'Green Valley Residential Eco Plot',
                'slug' => 'green-valley-residential-eco-plot',
                'tagline' => 'Freehold Gated Community Plot Ready for Construction',
                'description' => 'Build your dream custom eco-home on this prime 300 sq. yard freehold plot inside an exclusive gated community surrounded by over 2,000 fruit and herbal trees, solar street lighting, and underground utility cables.',
                'property_type' => 'plot',
                'status' => 'for_sale',
                'price' => 9500000.00,
                'price_display' => '₹ 95.00 Lakh',
                'location' => 'Pataudi Road, Sector 89',
                'city' => 'Gurugram',
                'state' => 'Haryana',
                'address' => 'Plot #118, Green Valley Eco Enclave',
                'bedrooms' => null,
                'bathrooms' => null,
                'area_sqft' => 2700,
                'parking_spaces' => 0,
                'is_featured' => true,
                'is_eco_friendly' => true,
                'main_image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=80',
                ],
                'amenities' => ['Gated Community', 'Underground Cabling', 'Wide 40ft Roads', '24x7 Security', 'Drip Irrigation Parks', 'Clear Title Registry'],
                'contact_phone' => '+91 98765 43210',
                'contact_email' => 'sales@aghomesindia.com',
            ],
            [
                'title' => 'The Glass Pavillion Modern Villa',
                'slug' => 'the-glass-pavillion-modern-villa',
                'tagline' => 'Minimalist Architecture with Geothermal Heating & Cooling',
                'description' => 'A masterpiece of modernist sustainable architecture. Features ground-source geothermal heating and cooling, bespoke Italian kitchen with A+++ appliances, and an organic infinity reflection pond seamlessly integrated with the living lounge.',
                'property_type' => 'villa',
                'status' => 'for_rent',
                'price' => 175000.00,
                'price_display' => '₹ 1.75 Lakh / mo',
                'location' => 'Sushant Lok 1, Block C',
                'city' => 'Gurugram',
                'state' => 'Haryana',
                'address' => 'Villa 7, Pavillion Court, Sushant Lok',
                'bedrooms' => 4,
                'bathrooms' => 4,
                'area_sqft' => 3800,
                'parking_spaces' => 2,
                'is_featured' => false,
                'is_eco_friendly' => true,
                'main_image' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1200&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1600607687644-c7171b42498b?auto=format&fit=crop&w=1200&q=80',
                ],
                'amenities' => ['Geothermal AC', 'Reflection Pool', 'Fully Furnished', 'Servant Quarters', 'Solar Rooftop', 'Private Security'],
                'contact_phone' => '+91 98765 43210',
                'contact_email' => 'rentals@aghomesindia.com',
            ],
            [
                'title' => 'Verdant Edge Commercial Plaza',
                'slug' => 'verdant-edge-commercial-plaza',
                'tagline' => 'Net-Zero Carbon Grade A Corporate Office Suite',
                'description' => 'Position your business in Gurugram\'s greenest office address. LEED Platinum certified building with double-glazed low-E glass facade, automated indoor air quality filters, rooftop solar farm, and EV fleet bays.',
                'property_type' => 'commercial',
                'status' => 'for_rent',
                'price' => 220000.00,
                'price_display' => '₹ 2.20 Lakh / mo',
                'location' => 'Cyber City, Phase 2',
                'city' => 'Gurugram',
                'state' => 'Haryana',
                'address' => 'Suite 502, Verdant Plaza, DLF Cyber City',
                'bedrooms' => null,
                'bathrooms' => 2,
                'area_sqft' => 2400,
                'parking_spaces' => 4,
                'is_featured' => false,
                'is_eco_friendly' => true,
                'main_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80',
                ],
                'amenities' => ['LEED Platinum', 'High Speed Elevators', 'EV Fleet Stations', 'Central Air Filtration', 'Fiber Optic Ready', 'Food Court'],
                'contact_phone' => '+91 98765 43210',
                'contact_email' => 'commercial@aghomesindia.com',
            ],
            [
                'title' => 'Serenity Hillside Eco Estate',
                'slug' => 'serenity-hillside-eco-estate',
                'tagline' => 'Private Valley Residence with Forest Conservation Boundary',
                'description' => 'A secluded, private 1-acre hillside luxury estate overlooking verdant valleys. Features off-grid solar microgrid, private organic vegetable farm, natural spring water filtration, and heated infinity plunge pool.',
                'property_type' => 'villa',
                'status' => 'for_sale',
                'price' => 65000000.00,
                'price_display' => '₹ 6.50 Cr',
                'location' => 'Aravalli Foothills, Bandhwari',
                'city' => 'Gurugram',
                'state' => 'Haryana',
                'address' => 'Estate 1, Aravalli Vista Road',
                'bedrooms' => 5,
                'bathrooms' => 6,
                'area_sqft' => 6200,
                'parking_spaces' => 4,
                'is_featured' => true,
                'is_eco_friendly' => true,
                'main_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1200&q=80',
                ],
                'amenities' => ['1 Acre Land', 'Off-grid Solar Microgrid', 'Infinity Pool', 'Staff Quarters', 'Fruit Orchard', 'Private Security Gated'],
                'contact_phone' => '+91 98765 43210',
                'contact_email' => 'sales@aghomesindia.com',
            ],
        ];

        foreach ($properties as $prop) {
            $prop['user_id'] = $admin->id;
            Property::updateOrCreate(['slug' => $prop['slug']], $prop);
        }

        // 5. Seed Gallery Items (Replaces Blog & News per user request)
        $gallery = [
            [
                'title' => 'Timber Facade Twilight View',
                'category' => 'exterior',
                'image_path' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Sustainably treated cedar wood exterior glowing under warm ambient LED garden fixtures.',
                'location' => 'Pine Ridge, Sector 65',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Biophilic Double-Height Living Room',
                'category' => 'interior',
                'image_path' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Indoor ficus trees, natural light wells, and low-VOC organic lime wash walls.',
                'location' => 'DLF Phase 5',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Aravalli Hills Eco Cottage',
                'category' => 'villas',
                'image_path' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Contemporary luxury villa integrated into surrounding rocky hillside terrain.',
                'location' => 'Sohna Greens',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Solar Integrated Glass Pergola',
                'category' => 'eco_homes',
                'image_path' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Transparent photovoltaic solar canopy providing clean power and shading for outdoor deck.',
                'location' => 'Sector 65',
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'Private Infinity Sky Pool',
                'category' => 'villas',
                'image_path' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Saltwater filtration system with temperature regulation and sunset horizon views.',
                'location' => 'Horizon Towers',
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Master Chef Organic Kitchen',
                'category' => 'interior',
                'image_path' => 'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Quartzite waterfall countertops, induction cooktops, and zero-waste composting drawer.',
                'location' => 'Pine Ridge',
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'title' => 'Green Valley Gated Land Plots',
                'category' => 'plots',
                'image_path' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Ready to build eco-plots with tree-lined avenues and underground drip irrigation.',
                'location' => 'Sector 89',
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'Minimalist Master Suite & Balcony',
                'category' => 'interior',
                'image_path' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Acoustic glass insulation and natural oak wooden flooring with morning sun exposure.',
                'location' => 'Valley of Greens',
                'is_featured' => false,
                'sort_order' => 8,
            ],
            [
                'title' => 'Lush Courtyard Water Feature',
                'category' => 'exterior',
                'image_path' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Circulating koi pond fed by harvested rainwater acting as a microclimate cooling system.',
                'location' => 'Aravalli Vista',
                'is_featured' => false,
                'sort_order' => 9,
            ],
            [
                'title' => 'Zen Meditation Garden Patio',
                'category' => 'exterior',
                'image_path' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
                'description' => 'Natural stone pavers nestled within indigenous bamboo and aromatic herbs.',
                'location' => 'DLF Phase 5',
                'is_featured' => false,
                'sort_order' => 10,
            ],
        ];

        foreach ($gallery as $item) {
            GalleryItem::updateOrCreate(['title' => $item['title']], $item);
        }

        // 6. Seed Sample Inquiries
        $inquiries = [
            [
                'name' => 'Vikram Malhotra',
                'email' => 'vikram.m@example.com',
                'phone' => '+91 98200 11223',
                'inquiry_type' => 'quick_enquiry',
                'subject' => 'Interested in Eco Haven Forest Villa',
                'message' => 'Hello, I saw the 4 BHK Eco Haven Villa in Sector 65. Can you arrange a site visit this coming Saturday around 11 AM?',
                'status' => 'new',
            ],
            [
                'name' => 'Dr. Ananya Sen',
                'email' => 'ananya.sen@example.com',
                'phone' => '+91 97110 44556',
                'inquiry_type' => 'schedule_visit',
                'subject' => 'Skyline Biophilic Penthouse Details',
                'message' => 'Please share the complete floor plan, maintenance charges, and solar power generation estimate for the penthouse.',
                'status' => 'contacted',
                'admin_notes' => 'Called client on Nov 12. Shared brochure on WhatsApp. Scheduled virtual walkthrough.',
            ],
        ];

        foreach ($inquiries as $inq) {
            Inquiry::updateOrCreate(['email' => $inq['email'], 'subject' => $inq['subject']], $inq);
        }
    }
}
