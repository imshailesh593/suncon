<?php
namespace App\Filament\Resources;
use App\Filament\Resources\ClientResource\Pages;
use App\Models\Client;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Select,Toggle,FileUpload,Section,Grid};
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn,ImageColumn,IconColumn};
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\Resource;

class ClientResource extends Resource {
    protected static ?string $model = Client::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form {
        return $form->schema([
            Section::make('Client Details')->schema([
                TextInput::make('name')->required()->columnSpanFull(),
                Grid::make(2)->schema([
                    Select::make('category')->options([
                        'Corporate'=>'Corporate','Government'=>'Government',
                        'Municipal'=>'Municipal','Private'=>'Private','NGO'=>'NGO',
                    ]),
                    TextInput::make('website')->url()->placeholder('https://'),
                ]),
                Grid::make(2)->schema([
                    Toggle::make('featured')->default(false)->inline(false),
                    TextInput::make('sort_order')->numeric()->default(0),
                ]),
            ]),
            Section::make('Logo')->schema([
                FileUpload::make('logo')->disk('public')->directory('clients')
                    ->image()->imageEditor()->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            ImageColumn::make('logo')->width(60)->height(40)->label('')->defaultImageUrl(asset('images/placeholder.png')),
            TextColumn::make('name')->searchable()->sortable()->weight('medium'),
            TextColumn::make('category')->badge(),
            TextColumn::make('website')->url()->color('gray')->limit(30),
            IconColumn::make('featured')->boolean(),
            TextColumn::make('sort_order')->sortable()->label('Order'),
        ])
        ->filters([SelectFilter::make('category')->options([
            'Corporate'=>'Corporate','Government'=>'Government',
            'Municipal'=>'Municipal','Private'=>'Private','NGO'=>'NGO',
        ])])
        ->defaultSort('sort_order');
    }

    public static function getPages(): array {
        return ['index'=>Pages\ListClients::route('/'),'create'=>Pages\CreateClient::route('/create'),'edit'=>Pages\EditClient::route('/{record}/edit')];
    }
}
