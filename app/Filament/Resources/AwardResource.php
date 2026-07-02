<?php
namespace App\Filament\Resources;
use App\Filament\Resources\AwardResource\Pages;
use App\Models\Award;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,Select,Toggle,FileUpload,Section,Grid};
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn,ImageColumn,IconColumn};
use Filament\Resources\Resource;

class AwardResource extends Resource {
    protected static ?string $model = Award::class;
    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $navigationGroup = 'Marketing';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form {
        return $form->schema([
            Section::make('Award Details')->schema([
                TextInput::make('title')->required()->columnSpanFull(),
                Grid::make(3)->schema([
                    TextInput::make('organization')->required(),
                    TextInput::make('year')->required()->maxLength(4),
                    Select::make('category')->options([
                        'Architecture'=>'Architecture','Interior Design'=>'Interior Design',
                        'Landscape'=>'Landscape','Sustainability'=>'Sustainability','Innovation'=>'Innovation',
                    ])->default('Architecture'),
                ]),
                Textarea::make('description')->rows(3)->columnSpanFull(),
                Grid::make(2)->schema([
                    Toggle::make('published')->default(true)->inline(false),
                    TextInput::make('sort_order')->numeric()->default(0),
                ]),
            ]),
            Section::make('Image')->schema([
                FileUpload::make('image')->label('Award Photo / Certificate')->disk('public')->directory('awards')
                    ->image()->imageEditor()->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            ImageColumn::make('image')->width(60)->height(50)->label(''),
            TextColumn::make('title')->searchable()->weight('medium'),
            TextColumn::make('organization')->color('gray'),
            TextColumn::make('year')->sortable(),
            TextColumn::make('category')->badge(),
            IconColumn::make('published')->boolean(),
        ])->defaultSort('year','desc');
    }

    public static function getPages(): array {
        return ['index'=>Pages\ListAwards::route('/'),'create'=>Pages\CreateAward::route('/create'),'edit'=>Pages\EditAward::route('/{record}/edit')];
    }
}
