<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput, Textarea, Select, Toggle, FileUpload, Repeater, Section, Grid, RichEditor};
use Filament\Forms\Set;
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn, BadgeColumn};
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\Resource;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Basic Information')->schema([
                TextInput::make('title')
                    ->required()->maxLength(255)->columnSpanFull()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required()->unique(ignoreRecord: true)->columnSpanFull(),
                Grid::make(3)->schema([
                    Select::make('discipline')->options([
                        'architecture' => 'Architecture',
                        'interior'     => 'Interior Design',
                        'landscape'    => 'Landscape',
                        'urban'        => 'Urban / Infrastructure',
                    ])->required(),
                    TextInput::make('year')->required()->maxLength(4),
                    Select::make('status')->options(['published'=>'Published','draft'=>'Draft'])->default('published'),
                ]),
                Grid::make(3)->schema([
                    TextInput::make('location')->required(),
                    TextInput::make('client'),
                    TextInput::make('area')->label('Built-up Area'),
                ]),
            ]),

            Section::make('Media')->schema([
                FileUpload::make('image')
                    ->label('Cover Image')->disk('public')->directory('projects')
                    ->image()->imageEditor()->columnSpanFull(),
                FileUpload::make('gallery')
                    ->label('Gallery Images')->disk('public')->directory('projects/gallery')
                    ->image()->multiple()->reorderable()->columnSpanFull(),
                TextInput::make('video_url')->label('YouTube / Video URL')->url()->columnSpanFull(),
            ]),

            Section::make('Content')->schema([
                Textarea::make('description')->required()->rows(5)->columnSpanFull(),
            ]),

            Section::make('SEO')->schema([
                TextInput::make('meta_title')->maxLength(60)->columnSpanFull(),
                Textarea::make('meta_description')->rows(2)->maxLength(160)->columnSpanFull(),
            ])->collapsed(),

            Section::make('Settings')->schema([
                Toggle::make('featured')->default(false),
                TextInput::make('sort_order')->numeric()->default(0),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->width(80)->height(55)->label(''),
                TextColumn::make('title')->searchable()->sortable()->limit(35)->weight('medium'),
                TextColumn::make('discipline')->badge()->color(fn($state)=>match($state){
                    'architecture'=>'success','interior'=>'warning','landscape'=>'info','urban'=>'primary',default=>'gray'
                }),
                TextColumn::make('location')->limit(20)->color('gray'),
                TextColumn::make('year')->sortable(),
                TextColumn::make('status')->badge()->color(fn($state)=>$state==='published'?'success':'gray'),
                IconColumn::make('featured')->boolean(),
            ])
            ->filters([
                SelectFilter::make('discipline')->options([
                    'architecture'=>'Architecture','interior'=>'Interior Design',
                    'landscape'=>'Landscape','urban'=>'Urban / Infrastructure',
                ]),
                SelectFilter::make('status')->options(['published'=>'Published','draft'=>'Draft']),
            ])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit'   => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
