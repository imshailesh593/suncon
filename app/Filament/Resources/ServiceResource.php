<?php
namespace App\Filament\Resources;
use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,TagsInput,FileUpload,Repeater,Section,Grid,Select};
use Filament\Forms\Set;
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn,ImageColumn,BadgeColumn};
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\Resource;
use Illuminate\Support\Str;

class ServiceResource extends Resource {
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form {
        return $form->schema([
            Section::make('Basic')->schema([
                Grid::make(2)->schema([
                    TextInput::make('title')->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set,?string $state)=>$set('slug',Str::slug($state))),
                    TextInput::make('slug')->required()->unique(ignoreRecord: true),
                ]),
                Grid::make(2)->schema([
                    Select::make('section')
                        ->label('Website Section')
                        ->options(['general' => 'Suncon (General)', 'bim' => 'Suncon BIM'])
                        ->default('general')
                        ->required()
                        ->helperText('Controls which website this service appears on.'),
                    TextInput::make('sort_order')->numeric()->default(0)->label('Order'),
                ]),
                TextInput::make('tagline')->columnSpanFull()
                    ->placeholder('Short lead text shown in cards and service page intro'),
                TextInput::make('icon')->placeholder('e.g. heroicon-o-home'),
                TextInput::make('formats')
                    ->label('File Formats (BIM only)')
                    ->placeholder('Input: DWG, PDF, IFC. Output: RVT, IFC, DWG.')
                    ->helperText('Shown on BIM services page only.')
                    ->columnSpanFull(),
                Textarea::make('description')->required()->rows(3)->columnSpanFull()
                    ->placeholder('Main description / body text'),
                Textarea::make('long_description')->rows(5)->columnSpanFull()
                    ->placeholder('Extended body paragraph (BIM services page)'),
            ]),
            Section::make('Media')->schema([
                FileUpload::make('image')->disk('public')->directory('services')
                    ->image()->imageEditor()->columnSpanFull(),
            ]),
            Section::make('Features & Deliverables')->schema([
                TagsInput::make('features')->columnSpanFull()
                    ->placeholder('Add deliverable or feature — used as bullet list on BIM services page'),
                Repeater::make('process_steps')->label('Process Steps')->columnSpanFull()
                    ->schema([
                        TextInput::make('title')->required()->placeholder('Step title'),
                        Textarea::make('description')->rows(2)->placeholder('Step description'),
                    ])->columns(2)->reorderable()->collapsible(),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                ImageColumn::make('image')->width(80)->height(55)->label(''),
                TextColumn::make('title')->searchable()->weight('medium'),
                TextColumn::make('tagline')->limit(45)->color('gray'),
                TextColumn::make('section')
                    ->badge()
                    ->color(fn(string $state) => $state === 'bim' ? 'warning' : 'gray')
                    ->formatStateUsing(fn(string $state) => $state === 'bim' ? 'BIM' : 'General'),
                TextColumn::make('sort_order')->sortable()->label('Order'),
            ])
            ->filters([
                SelectFilter::make('section')
                    ->options(['general' => 'General', 'bim' => 'BIM'])
                    ->label('Section'),
            ])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array {
        return ['index'=>Pages\ListServices::route('/'),'create'=>Pages\CreateService::route('/create'),'edit'=>Pages\EditService::route('/{record}/edit')];
    }
}
