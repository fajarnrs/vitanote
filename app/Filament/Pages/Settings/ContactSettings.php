<?php

namespace App\Filament\Pages\Settings;

use App\Models\SiteSetting;
use Filament\Notifications\Notification;
use Filament\Pages\Page; // kept for history; class no longer extends Page

// Deprecated: unified into SiteSettings. Not a Filament Page anymore.
class ContactSettings
{
    protected ?string $heading = 'Pengaturan Kontak';
    
    public $contact_email;
    public $contact_phone;
    public $contact_instagram;
    public $contact_facebook;
    public $contact_address;
    
    public function getView(): string
    {
        return 'filament.pages.settings.contact-settings';
    }
    
    // No navigation or routes; intentionally inert

    // No behavior
}
