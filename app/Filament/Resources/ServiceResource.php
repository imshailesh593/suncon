<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput, Textarea, TagsInput};
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn, ImageColumn};
use Filament\Resources\Resource;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),
            TextInput::make('slug')->required()->unique(ignoreRecord: true),
            TextInput::make('image')->required()->url()->columnSpanFull()->label('Image URL'),
            Textarea::make('description')->required()->rows(4)->columnSpanFull(),
            Textarea::make('long_description')->rows(4)->columnSpanFull(),
            TagsInput::make('features')->columnSpanFull(),
            TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('image')->width(80)->height(60)->label(''),
            TextColumn::make('title')->searchable(),
            TextColumn::make('sort_order')->sortable()->label('Order'),
        ])->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit'   => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
