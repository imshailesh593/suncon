<?php

namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;

class SettingsComposer
{
    public function compose(View $view): void
    {
        $view->with('globalSettings', Setting::getGroup('site.'));
    }
}
