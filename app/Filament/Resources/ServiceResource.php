<?php
namespace App\Filament\Resources;
use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,TagsInput,FileUpload,Repeater,Section,Grid};
use Filament\Forms\Set;
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn,ImageColumn};
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
                TextInput::make('title')->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set,?string $state)=>$set('slug',Str::slug($state))),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                TextInput::make('tagline')->columnSpanFull()->placeholder('One-line hook shown on cards'),
                TextInput::make('icon')->placeholder('e.g. heroicon-o-home')->columnSpanFull(),
                Textarea::make('description')->required()->rows(3)->columnSpanFull(),
                Textarea::make('long_description')->rows(5)->columnSpanFull(),
            ]),
            Section::make('Media')->schema([
                FileUpload::make('image')->disk('public')->directory('services')
                    ->image()->imageEditor()->columnSpanFull(),
            ]),
            Section::make('Features & Process')->schema([
                TagsInput::make('features')->columnSpanFull()->placeholder('Add feature'),
                Repeater::make('process_steps')->label('Process Steps')->columnSpanFull()
                    ->schema([
                        TextInput::make('title')->required()->placeholder('Step title'),
                        Textarea::make('description')->rows(2)->placeholder('Step description'),
                    ])->columns(2)->reorderable()->collapsible(),
            ]),
            TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            ImageColumn::make('image')->width(80)->height(55)->label(''),
            TextColumn::make('title')->searchable()->weight('medium'),
            TextColumn::make('tagline')->limit(40)->color('gray'),
            TextColumn::make('sort_order')->sortable()->label('Order'),
        ])->defaultSort('sort_order');
    }

    public static function getPages(): array {
        return ['index'=>Pages\ListServices::route('/'),'create'=>Pages\CreateService::route('/create'),'edit'=>Pages\EditService::route('/{record}/edit')];
    }
}
