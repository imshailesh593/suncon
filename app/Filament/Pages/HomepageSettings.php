<?php
namespace App\Filament\Pages;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,Section,Grid};
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class HomepageSettings extends Page implements HasForms {
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int    $navigationSort  = 11;
    protected static string  $view            = 'filament.pages.settings-form';
    protected static ?string $title           = 'Homepage Content';

    public array $data = [];

    public function mount(): void { $this->form->fill(Setting::getGroup('home.')); }

    public function form(Form $form): Form {
        return $form->schema([
            Section::make('Hero Section')->schema([
                TextInput::make('home.hero_line1')->label('Headline Line 1')->default('Architecture'),
                TextInput::make('home.hero_line2')->label('Headline Line 2 (italic)')->default('& Design.'),
                Textarea::make('home.hero_subtitle')->label('Subtitle text')->rows(2)->columnSpanFull()
                    ->default('A multidisciplinary consultancy delivering architecture, landscape & interior design across India since 1999.'),
                Grid::make(2)->schema([
                    TextInput::make('home.hero_cta_primary')->label('Primary CTA label')->default('VIEW OUR WORK'),
                    TextInput::make('home.hero_cta_secondary')->label('Secondary CTA label')->default('OUR SERVICES'),
                ]),
            ]),
            Section::make('Recent Projects Section')->schema([
                TextInput::make('home.projects_title')->label('Section Title')->default('Recent Projects'),
                TextInput::make('home.projects_cta')->label('CTA Label')->default('VIEW ALL PROJECTS'),
            ]),
            Section::make('Services Section')->schema([
                TextInput::make('home.services_eyebrow')->label('Eyebrow text')->default('What We Do'),
                TextInput::make('home.services_title')->label('Section Headline')->default('Our Services'),
            ]),
            Section::make('About / Stats Strip')->schema([
                TextInput::make('home.about_eyebrow')->label('Eyebrow text')->default('About Suncon'),
                Textarea::make('home.about_paragraph')->label('Intro paragraph')->rows(3)->columnSpanFull()
                    ->default('Founded in 1999, Suncon Engineers Pvt. Ltd. is an ISO-certified multidisciplinary design consultancy headquartered in Pune, India.'),
            ]),
            Section::make('Journal Section')->schema([
                TextInput::make('home.journal_eyebrow')->label('Eyebrow text')->default('From the Studio'),
                TextInput::make('home.journal_title')->label('Section Headline')->default('Journal'),
            ]),
        ])->statePath('data');
    }

    public function save(): void {
        Setting::setMany($this->form->getState());
        Notification::make()->title('Homepage content saved')->success()->send();
    }
}
