<?php
namespace App\Filament\Resources;

use App\Filament\Resources\StatisticResource\Pages;
use App\Models\Statistic;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;

class StatisticResource extends Resource
{
    protected static ?string $model = Statistic::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('value')->required(),
            TextInput::make('suffix')->default(''),
            TextInput::make('label')->required()->columnSpanFull(),
            TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('value'),
            TextColumn::make('suffix'),
            TextColumn::make('label')->searchable(),
            TextColumn::make('sort_order')->sortable()->label('Order'),
        ])->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListStatistics::route('/'),
            'create' => Pages\CreateStatistic::route('/create'),
            'edit'   => Pages\EditStatistic::route('/{record}/edit'),
        ];
    }
}
