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

    public function mount(): void { $this->form->fill(Setting::getGroup('homepage.')); }

    public function form(Form $form): Form {
        return $form->schema([
            Section::make('Hero Section')->schema([
                TextInput::make('homepage.hero_line1')->label('Headline Line 1')->default('Architecture'),
                TextInput::make('homepage.hero_line2')->label('Headline Line 2 (italic)')->default('& Design.'),
                Textarea::make('homepage.hero_subtitle')->label('Subtitle text')->rows(2)->columnSpanFull()
                    ->default('A multidisciplinary consultancy delivering architecture, landscape & interior design across India since 1999.'),
                Grid::make(2)->schema([
                    TextInput::make('homepage.cta_primary')->label('Primary CTA label')->default('View Our Work'),
                    TextInput::make('homepage.cta_secondary')->label('Secondary CTA label')->default('Our Services'),
                ]),
            ]),
            Section::make('Recent Projects Section')->schema([
                TextInput::make('homepage.projects_eyebrow')->label('Eyebrow text')->default('Selected Work'),
                TextInput::make('homepage.projects_title')->label('Section Title')->default('Recent Projects'),
            ]),
            Section::make('Services Section')->schema([
                TextInput::make('homepage.services_eyebrow')->label('Eyebrow text')->default('What We Do'),
                TextInput::make('homepage.services_title')->label('Section Headline')->default('Our Disciplines'),
            ]),
            Section::make('Journal Section')->schema([
                TextInput::make('homepage.journal_eyebrow')->label('Eyebrow text')->default('From the Studio'),
                TextInput::make('homepage.journal_title')->label('Section Headline')->default('Latest Insights'),
            ]),
        ])->statePath('data');
    }

    public function save(): void {
        Setting::setMany($this->form->getState());
        Notification::make()->title('Homepage content saved')->success()->send();
    }
}
