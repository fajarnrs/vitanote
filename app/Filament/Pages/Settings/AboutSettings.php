<?php

namespace App\Filament\Pages\Settings;

use App\Models\SiteSetting;
use Filament\Notifications\Notification;
use Filament\Pages\Page; // kept for history; class no longer extends Page

// Deprecated: unified into SiteSettings. Not a Filament Page anymore.
class AboutSettings
{
    protected ?string $heading = 'Pengaturan Tentang Kami';
    
    public $about_title;
    public $about_content;
    public array $team_members = [];
    public $institution_name;
    
    public function getView(): string
    {
        return 'filament.pages.settings.about-settings';
    }
    
    // No navigation or routes; intentionally inert

    // No behavior
}
