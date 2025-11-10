<?php

namespace App\Filament\Pages\Settings;

use App\Models\SiteSetting;
use Filament\Notifications\Notification;
use Filament\Pages\Page; // kept for history; class no longer extends Page

// Deprecated: unified into SiteSettings. Not a Filament Page anymore.
class FooterSettings
{
    protected ?string $heading = 'Pengaturan Footer';
    
    public $footer_description;
    public $footer_disclaimer;
    public $footer_copyright;
    
    public function getView(): string
    {
        return 'filament.pages.settings.footer-settings';
    }
    
    // No navigation or routes; intentionally inert

    // No behavior
}
