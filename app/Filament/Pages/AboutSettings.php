<?php
namespace App\Filament\Pages;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,Repeater,Section,Grid};
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class AboutSettings extends Page implements HasForms {
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int    $navigationSort  = 12;
    protected static string  $view            = 'filament.pages.settings-form';
    protected static ?string $title           = 'About Page Content';

    public array $data = [];

    public function mount(): void { $this->form->fill(Setting::getGroup('about.')); }

    public function form(Form $form): Form {
        return $form->schema([
            Section::make('Hero')->schema([
                Grid::make(2)->schema([
                    TextInput::make('about.hero_line1')->label('Headline Line 1')->default('Building for'),
                    TextInput::make('about.hero_line2')->label('Headline Line 2 (italic accent)')->default('People & Place'),
                ]),
            ]),
            Section::make('Introduction')->schema([
                Textarea::make('about.intro_p1')->label('Paragraph 1')->rows(4)->columnSpanFull()
                    ->default('Founded in 1999, Suncon Engineers Pvt. Ltd. is an ISO-certified multidisciplinary design consultancy headquartered in Pune, India. Over 25 years we have delivered architecture, landscape, interior and infrastructure projects that thoughtfully respond to context, climate and the people who inhabit them.'),
                Textarea::make('about.intro_p2')->label('Paragraph 2')->rows(3)->columnSpanFull()
                    ->default('Our integrated studio brings together architects, landscape architects, interior designers, BIM specialists and project managers under one roof — enabling seamless collaboration from feasibility through to handover.'),
            ]),
            Section::make('Philosophy Section')->schema([
                Grid::make(2)->schema([
                    TextInput::make('about.philosophy_title')->label('Title')->default('Design with intention.'),
                    TextInput::make('about.philosophy_eyebrow')->label('Eyebrow')->default('Our Philosophy'),
                ]),
                Textarea::make('about.philosophy_p1')->label('Paragraph 1')->rows(3)->columnSpanFull()
                    ->default('We believe great architecture begins with listening — to the site, the community, and the brief.'),
                Textarea::make('about.philosophy_p2')->label('Paragraph 2')->rows(3)->columnSpanFull(),
                Textarea::make('about.philosophy_p3')->label('Paragraph 3')->rows(3)->columnSpanFull(),
            ]),
            Section::make('Core Values')->schema([
                Textarea::make('about.values')->label('Values (one per line)')
                    ->rows(6)->columnSpanFull()
                    ->helperText('Enter each value on a new line')
                    ->default("Contextual Design\nSustainability\nClient Partnership\nIntegrated Delivery"),
            ]),
        ])->statePath('data');
    }

    public function save(): void {
        Setting::setMany($this->form->getState());
        Notification::make()->title('About page content saved')->success()->send();
    }
}
