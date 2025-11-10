<?php

namespace App\Console\Commands;

use App\Models\SiteSetting;
use Illuminate\Console\Command;

class SettingsDump extends Command
{
    protected $signature = 'settings:dump {--group=} {--keys=*}';
    protected $description = 'Dump site settings values (optionally filtered by group or keys)';

    public function handle(): int
    {
        $keys = $this->option('keys');
        $group = $this->option('group');

        $defaultKeys = [
            // General
            'site_name', 'site_tagline', 'site_description', 'site_logo',
            // About
            'about_title', 'about_content', 'team_members', 'institution_name',
            // Contact
            'contact_email', 'contact_phone', 'contact_instagram', 'contact_facebook', 'contact_address',
            // Footer
            'footer_description', 'footer_disclaimer', 'footer_copyright',
        ];

        $keysToDump = !empty($keys) ? $keys : $defaultKeys;

        $this->info('Settings dump:');
        foreach ($keysToDump as $key) {
            $value = SiteSetting::get($key);
            if ($value === null) {
                $display = '<null>';
            } elseif (is_array($value)) {
                $display = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            } else {
                $display = (string) $value;
            }

            if ($group) {
                // Only display if group matches
                $exists = \App\Models\SiteSetting::where('key', $key)
                    ->when($group, fn($q) => $q->where('group', $group))
                    ->exists();
                if (! $exists) {
                    continue;
                }
            }

            $this->line(" - {$key}: {$display}");
        }

        return self::SUCCESS;
    }
}
