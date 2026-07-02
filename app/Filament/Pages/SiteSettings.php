<?php
namespace App\Filament\Pages;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,FileUpload,Section,Grid,Tabs};
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SiteSettings extends Page implements HasForms {
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int    $navigationSort  = 10;
    protected static string  $view            = 'filament.pages.settings-form';
    protected static ?string $title           = 'Site Settings';

    public array $data = [];

    public function mount(): void {
        $this->form->fill(Setting::getGroup('site.'));
    }

    public function form(Form $form): Form {
        return $form->schema([
            Tabs::make('Settings')->tabs([
                Tabs\Tab::make('Company')->schema([
                    Grid::make(2)->schema([
                        TextInput::make('site.company_name')->label('Company Name')->default('Suncon Engineers Pvt. Ltd.'),
                        TextInput::make('site.tagline')->label('Tagline')->default('Architecture. Landscape. Interior. Infrastructure.'),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('site.founded_year')->label('Founded Year')->default('1999'),
                        TextInput::make('site.iso_cert')->label('ISO Certification')->default('ISO 9001:2015'),
                    ]),
                    TextInput::make('site.address')->label('Office Address')->columnSpanFull(),
                    Grid::make(2)->schema([
                        TextInput::make('site.phone')->label('Phone'),
                        TextInput::make('site.email')->label('Business Email')->default('bd@sunconengineers.com'),
                    ]),
                    Textarea::make('site.footer_tagline')->label('Footer Tagline')->rows(2)->columnSpanFull(),
                ]),
                Tabs\Tab::make('Social Media')->schema([
                    Grid::make(2)->schema([
                        TextInput::make('site.linkedin')->label('LinkedIn URL')->url(),
                        TextInput::make('site.instagram')->label('Instagram URL')->url(),
                        TextInput::make('site.facebook')->label('Facebook URL')->url(),
                        TextInput::make('site.twitter')->label('Twitter / X URL')->url(),
                        TextInput::make('site.youtube')->label('YouTube URL')->url(),
                        TextInput::make('site.behance')->label('Behance URL')->url(),
                    ]),
                ]),
                Tabs\Tab::make('SEO & Analytics')->schema([
                    TextInput::make('site.seo_title')->label('Default SEO Title')->maxLength(60)->columnSpanFull(),
                    Textarea::make('site.seo_description')->label('Default Meta Description')->maxLength(160)->rows(2)->columnSpanFull(),
                    TextInput::make('site.google_analytics')->label('Google Analytics ID')->placeholder('G-XXXXXXXXXX')->columnSpanFull(),
                    TextInput::make('site.google_maps_key')->label('Google Maps API Key')->columnSpanFull(),
                ]),
            ])->columnSpanFull(),
        ])->statePath('data');
    }

    public function save(): void {
        Setting::setMany($this->form->getState());
        Notification::make()->title('Settings saved successfully')->success()->send();
    }
}
