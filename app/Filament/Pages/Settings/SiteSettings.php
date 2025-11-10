<?php

namespace App\Filament\Pages\Settings;

use App\Models\SiteSetting;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class SiteSettings extends Page
{
    use WithFileUploads;
    protected ?string $heading = 'Pengaturan Situs';

    // General
    public $site_name;
    public $site_tagline;
    public $site_description;
    public $site_logo; // can be path or tmp upload

    // About
    public $about_title;
    public $about_content;
    public array $team_members = [];
    public $institution_name;
    // About (legacy/simple mode)
    public $team_input_mode; // 'simple' | 'dynamic'
    public $team_member_1_name;
    public $team_member_1_role;
    public $team_member_2_name;
    public $team_member_2_role;

    // Contact
    public $contact_email;
    public $contact_phone;
    public $contact_instagram;
    public $contact_facebook;
    public $contact_address;

    // Footer
    public $footer_description;
    public $footer_disclaimer;
    public $footer_copyright;

    public function getView(): string
    {
        return 'filament.pages.settings.site-settings';
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-adjustments-vertical';
    }

    public static function getNavigationLabel(): string
    {
        return 'Pengaturan';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Pengaturan Situs';
    }

    public static function getNavigationSort(): ?int
    {
        return 0; // appear first
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public function mount(): void
    {
        abort_unless(auth()->user()?->isAdmin(), 403);
        // General
        $this->site_name = SiteSetting::get('site_name', 'VitaminInfo');
        $this->site_tagline = SiteSetting::get('site_tagline', 'Kunci Kesehatan Tubuhmu');
        $this->site_description = SiteSetting::get('site_description', 'Portal informasi lengkap tentang vitamin dan nutrisi untuk kesehatan tubuh.');
        $this->site_logo = SiteSetting::get('site_logo');

        // About
        $this->about_title = SiteSetting::get('about_title', 'Tujuan Situs');
        $this->about_content = SiteSetting::get('about_content', 'VitaminInfo adalah portal edukasi...');
        $this->team_members = SiteSetting::get('team_members', []);
        $this->team_input_mode = SiteSetting::get('team_input_mode', 'simple');
        if (empty($this->team_members)) {
            // Fallback legacy keys
            $legacy = [];
            $m1n = SiteSetting::get('team_member_1_name');
            $m1r = SiteSetting::get('team_member_1_role');
            $m2n = SiteSetting::get('team_member_2_name');
            $m2r = SiteSetting::get('team_member_2_role');
            if ($m1n || $m1r) $legacy[] = ['name' => $m1n, 'role' => $m1r];
            if ($m2n || $m2r) $legacy[] = ['name' => $m2n, 'role' => $m2r];
            $this->team_members = $legacy ?: [ ['name' => '', 'role' => ''] ];
        }
        // Prepare legacy fields for simple mode UI (prefill from settings or JSON first two)
        $this->team_member_1_name = SiteSetting::get('team_member_1_name', $this->team_members[0]['name'] ?? '');
        $this->team_member_1_role = SiteSetting::get('team_member_1_role', $this->team_members[0]['role'] ?? '');
        $this->team_member_2_name = SiteSetting::get('team_member_2_name', $this->team_members[1]['name'] ?? '');
        $this->team_member_2_role = SiteSetting::get('team_member_2_role', $this->team_members[1]['role'] ?? '');
        // Auto default names if in simple mode and empty (requested presets)
        if ($this->team_input_mode === 'simple') {
            if (empty($this->team_member_1_name)) {
                $this->team_member_1_name = 'Ervina Febriana Basuki';
            }
            if (empty($this->team_member_2_name)) {
                $this->team_member_2_name = 'Nadila Kartika Hapsari';
            }
        }
        $this->institution_name = SiteSetting::get('institution_name', 'Poltekkes Kemenkes Semarang');

        // Contact
        $this->contact_email = SiteSetting::get('contact_email', 'admin@vitamin.com');
        $this->contact_phone = SiteSetting::get('contact_phone', '');
        $this->contact_instagram = SiteSetting::get('contact_instagram', '');
        $this->contact_facebook = SiteSetting::get('contact_facebook', '');
        $this->contact_address = SiteSetting::get('contact_address', '');

        // Footer
        $this->footer_description = SiteSetting::get('footer_description', '');
        $this->footer_disclaimer = SiteSetting::get('footer_disclaimer', '');
        $this->footer_copyright = SiteSetting::get('footer_copyright', 'VitaminInfo');
    }

    public function addMember(): void
    {
        $this->team_members[] = ['name' => '', 'role' => ''];
    }

    public function removeMember(int $index): void
    {
        unset($this->team_members[$index]);
        $this->team_members = array_values($this->team_members);
    }

    public function moveMemberUp(int $index): void
    {
        if ($index <= 0 || $index >= count($this->team_members)) {
            return;
        }
        $tmp = $this->team_members[$index - 1];
        $this->team_members[$index - 1] = $this->team_members[$index];
        $this->team_members[$index] = $tmp;
    }

    public function moveMemberDown(int $index): void
    {
        if ($index < 0 || $index >= count($this->team_members) - 1) {
            return;
        }
        $tmp = $this->team_members[$index + 1];
        $this->team_members[$index + 1] = $this->team_members[$index];
        $this->team_members[$index] = $tmp;
    }

    public function saveGeneral(): void
    {
        // Handle logo upload if a temporary file is provided
        if (is_object($this->site_logo) && method_exists($this->site_logo, 'store')) {
            $path = $this->site_logo->store('logos', 'public');
            $this->site_logo = $path;
            SiteSetting::set('site_logo', $path, 'image', 'general');
        }

        SiteSetting::set('site_name', $this->site_name, 'text', 'general');
        SiteSetting::set('site_tagline', $this->site_tagline, 'text', 'general');
        SiteSetting::set('site_description', $this->site_description, 'textarea', 'general');

        SiteSetting::clearCache();
        Notification::make()->title('Pengaturan Umum disimpan.')->success()->send();
    }

    public function saveAbout(): void
    {
        SiteSetting::set('about_title', $this->about_title, 'text', 'about');
        SiteSetting::set('about_content', $this->about_content, 'textarea', 'about');
        SiteSetting::set('team_input_mode', $this->team_input_mode ?: 'simple', 'text', 'about');

        if (($this->team_input_mode ?: 'simple') === 'simple') {
            // Persist legacy fields and also mirror to JSON for public view
            SiteSetting::set('team_member_1_name', $this->team_member_1_name, 'text', 'about');
            SiteSetting::set('team_member_1_role', $this->team_member_1_role, 'text', 'about');
            SiteSetting::set('team_member_2_name', $this->team_member_2_name, 'text', 'about');
            SiteSetting::set('team_member_2_role', $this->team_member_2_role, 'text', 'about');

            $mirrored = [];
            if ($this->team_member_1_name || $this->team_member_1_role) {
                $mirrored[] = ['name' => (string) $this->team_member_1_name, 'role' => (string) $this->team_member_1_role];
            }
            if ($this->team_member_2_name || $this->team_member_2_role) {
                $mirrored[] = ['name' => (string) $this->team_member_2_name, 'role' => (string) $this->team_member_2_role];
            }
            SiteSetting::set('team_members', $mirrored, 'json', 'about');
        } else {
            // Dynamic mode: save JSON and also update the first two legacy fields for backward-compat
            SiteSetting::set('team_members', $this->team_members, 'json', 'about');
            $first = $this->team_members[0] ?? ['name' => null, 'role' => null];
            $second = $this->team_members[1] ?? ['name' => null, 'role' => null];
            SiteSetting::set('team_member_1_name', $first['name'] ?? null, 'text', 'about');
            SiteSetting::set('team_member_1_role', $first['role'] ?? null, 'text', 'about');
            SiteSetting::set('team_member_2_name', $second['name'] ?? null, 'text', 'about');
            SiteSetting::set('team_member_2_role', $second['role'] ?? null, 'text', 'about');
        }

        SiteSetting::set('institution_name', $this->institution_name, 'text', 'about');
        SiteSetting::clearCache();
        Notification::make()->title('Tentang Kami disimpan.')->success()->send();
    }

    public function saveContact(): void
    {
        SiteSetting::set('contact_email', $this->contact_email, 'email', 'contact');
        SiteSetting::set('contact_phone', $this->contact_phone, 'phone', 'contact');
        SiteSetting::set('contact_instagram', $this->contact_instagram, 'text', 'contact');
        SiteSetting::set('contact_facebook', $this->contact_facebook, 'text', 'contact');
        SiteSetting::set('contact_address', $this->contact_address, 'textarea', 'contact');
        SiteSetting::clearCache();
        Notification::make()->title('Kontak disimpan.')->success()->send();
    }

    public function saveFooter(): void
    {
        SiteSetting::set('footer_description', $this->footer_description, 'textarea', 'footer');
        SiteSetting::set('footer_disclaimer', $this->footer_disclaimer, 'text', 'footer');
        SiteSetting::set('footer_copyright', $this->footer_copyright, 'text', 'footer');
        SiteSetting::clearCache();
        Notification::make()->title('Footer disimpan.')->success()->send();
    }
}
