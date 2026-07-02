<?php
namespace App\Filament\Resources;
use App\Filament\Resources\StatisticResource\Pages;
use App\Models\Statistic;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Section,Grid};
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;

class StatisticResource extends Resource {
    protected static ?string $model = Statistic::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form {
        return $form->schema([
            Section::make('Counter')->schema([
                Grid::make(3)->schema([
                    TextInput::make('value')->required()->placeholder('500'),
                    TextInput::make('suffix')->placeholder('+'),
                    TextInput::make('sort_order')->numeric()->default(0),
                ]),
                TextInput::make('label')->required()->columnSpanFull()->placeholder('Projects Delivered'),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            TextColumn::make('value')->weight('bold'),
            TextColumn::make('suffix'),
            TextColumn::make('label')->searchable(),
            TextColumn::make('sort_order')->sortable()->label('Order'),
        ])->defaultSort('sort_order')->reorderable('sort_order');
    }

    public static function getPages(): array {
        return ['index'=>Pages\ListStatistics::route('/'),'create'=>Pages\CreateStatistic::route('/create'),'edit'=>Pages\EditStatistic::route('/{record}/edit')];
    }
}
