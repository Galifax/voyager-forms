<?php

namespace Pvtl\VoyagerForms\Database\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        $setting = $this->findSetting('forms.default_to_email');

        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Default Enquiry To Email',
                'value' => 'voyager.forms@mailinator.com',
                'details' => 'The default email address to send form enquiries to',
                'type' => 'text',
                'order' => 1,
                'group' => 'Forms',
            ])->save();
        }

        $setting = $this->findSetting('forms.default_from_email');

        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Default Enquiry From Email',
                'value' => 'voyager.forms@mailinator.com',
                'details' => 'The default email address to use as the sender address for form enquiries',
                'type' => 'text',
                'order' => 2,
                'group' => 'Forms',
            ])->save();
        }

        $setting = $this->findSetting('forms.recaptcha_site_key');

        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Google reCAPTCHA Site Key (public)',
                'value' => '',
                'details' => 'This key can be found in your Google reCAPTCHA console',
                'type' => 'text',
                'order' => 3,
                'group' => 'Forms',
            ])->save();
        }

        $setting = $this->findSetting('forms.recaptcha_site_secret');

        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Google reCAPTCHA Secret Key',
                'value' => '',
                'details' => 'This key can be found in your Google reCAPTCHA console',
                'type' => 'text',
                'order' => 4,
                'group' => 'Forms',
            ])->save();
        }
    }

    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
