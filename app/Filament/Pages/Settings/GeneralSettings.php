<?php

namespace App\Filament\Pages\Settings;

use App\Models\SiteSetting;
use Filament\Notifications\Notification;
use Filament\Pages\Page; // kept for history; class no longer extends Page

// Deprecated: unified into SiteSettings, keep file so history remains. Not a Filament Page anymore.
class GeneralSettings
{
    protected ?string $heading = 'Pengaturan Umum';
    
    public $site_name;
    public $site_tagline;
    public $site_description;
    public $site_logo;
    
    public function getView(): string
    {
        return 'filament.pages.settings.general-settings';
    }
    
    // No navigation or routes; intentionally inert

    // No behavior
}
