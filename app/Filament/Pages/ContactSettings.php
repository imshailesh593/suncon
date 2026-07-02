<?php
namespace App\Filament\Pages;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,Section,Grid};
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ContactSettings extends Page implements HasForms {
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-map-pin';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int    $navigationSort  = 13;
    protected static string  $view            = 'filament.pages.settings-form';
    protected static ?string $title           = 'Contact Page';

    public array $data = [];

    public function mount(): void { $this->form->fill(Setting::getGroup('contact.')); }

    public function form(Form $form): Form {
        return $form->schema([
            Section::make('Office Information')->schema([
                Textarea::make('contact.address')->label('Full Address')->rows(3)->columnSpanFull()
                    ->default('P1/9, Sai Palace, Near Lohia-Jain IT Park, Bhusari Colony (Right Side), Paud Road, Kothrud, Pune – 411038, Maharashtra, India.'),
                TextInput::make('contact.office_hours')->label('Office Hours')
                    ->default('Mon – Sat: 9:30 AM – 6:30 PM'),
                Textarea::make('contact.address2')->label('Second Office Address (optional)')->rows(2)->columnSpanFull(),
            ]),
            Section::make('Map')->schema([
                TextInput::make('contact.map_embed')->label('Google Maps Embed URL')
                    ->url()->columnSpanFull()
                    ->helperText('Paste the src URL from the Google Maps embed <iframe> — not the share link'),
            ]),
            Section::make('Contact Hero')->schema([
                TextInput::make('contact.hero_title')->label('Page Title')->default('Start a Project'),
                Textarea::make('contact.hero_subtitle')->label('Subtitle')->rows(2)->columnSpanFull()
                    ->default('Tell us about your vision. We respond within 24 hours.'),
            ]),
        ])->statePath('data');
    }

    public function save(): void {
        Setting::setMany($this->form->getState());
        Notification::make()->title('Contact settings saved')->success()->send();
    }
}
