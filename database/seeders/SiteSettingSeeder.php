<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'VitaminInfo', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Kunci Kesehatan Tubuhmu', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Portal informasi lengkap tentang vitamin dan nutrisi untuk kesehatan tubuh Anda.', 'type' => 'textarea', 'group' => 'general'],
            
            // About
            ['key' => 'about_title', 'value' => 'Tujuan Situs', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_content', 'value' => "VitaminInfo adalah portal edukasi yang didedikasikan untuk memberikan informasi lengkap, akurat, dan mudah dipahami tentang berbagai jenis vitamin dan perannya bagi kesehatan tubuh.\n\nKami percaya bahwa pemahaman yang baik tentang nutrisi, khususnya vitamin, adalah kunci untuk hidup sehat. Melalui platform ini, kami berusaha:\n\n• Menyediakan informasi ilmiah yang dapat dipercaya tentang vitamin\n• Membantu masyarakat memahami kebutuhan vitamin harian mereka\n• Mengedukasi tentang sumber makanan yang kaya vitamin\n• Menjelaskan dampak defisiensi dan kelebihan vitamin", 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'team_member_1_name', 'value' => 'Ervina Febriana Basuki', 'type' => 'text', 'group' => 'about'],
            ['key' => 'team_member_1_role', 'value' => 'Content Creator & Researcher', 'type' => 'text', 'group' => 'about'],
            ['key' => 'team_member_2_name', 'value' => 'Nadila Kartika Hapsari', 'type' => 'text', 'group' => 'about'],
            ['key' => 'team_member_2_role', 'value' => 'Content Creator & Researcher', 'type' => 'text', 'group' => 'about'],
            ['key' => 'institution_name', 'value' => 'Poltekkes Kemenkes Semarang', 'type' => 'text', 'group' => 'about'],
            
            // Contact
            ['key' => 'contact_email', 'value' => 'vitamininfo@gmail.com', 'type' => 'email', 'group' => 'contact'],
            ['key' => 'contact_instagram', 'value' => '@vitaminkesehatan', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Poltekkes Kemenkes Semarang', 'type' => 'textarea', 'group' => 'contact'],
            
            // Footer
            ['key' => 'footer_description', 'value' => 'Portal informasi lengkap tentang vitamin dan nutrisi untuk kesehatan tubuh Anda.', 'type' => 'textarea', 'group' => 'footer'],
            ['key' => 'footer_disclaimer', 'value' => 'Konten edukasi, bukan pengganti konsultasi medis', 'type' => 'text', 'group' => 'footer'],
            ['key' => 'footer_copyright', 'value' => 'VitaminInfo', 'type' => 'text', 'group' => 'footer'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
