<?php
namespace App\Filament\Resources;
use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,FileUpload,TagsInput,Section,Grid};
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn,ImageColumn};
use Filament\Resources\Resource;

class TeamMemberResource extends Resource {
    protected static ?string $model = TeamMember::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form {
        return $form->schema([
            Section::make('Profile')->schema([
                Grid::make(2)->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('role')->required(),
                ]),
                Grid::make(2)->schema([
                    TextInput::make('email')->email(),
                    TextInput::make('linkedin')->url()->label('LinkedIn URL'),
                ]),
                Textarea::make('bio')->rows(4)->columnSpanFull(),
                TagsInput::make('qualifications')->columnSpanFull()->placeholder('e.g. B.Arch, LEED AP'),
            ]),
            Section::make('Photo')->schema([
                FileUpload::make('image')->disk('public')->directory('team')
                    ->image()->imageEditor()->avatar()->columnSpanFull(),
            ]),
            TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            ImageColumn::make('image')->circular()->width(48)->height(48)->label(''),
            TextColumn::make('name')->searchable()->weight('medium'),
            TextColumn::make('role')->color('gray'),
            TextColumn::make('email')->color('gray'),
            TextColumn::make('sort_order')->sortable()->label('Order'),
        ])->defaultSort('sort_order');
    }

    public static function getPages(): array {
        return ['index'=>Pages\ListTeamMembers::route('/'),'create'=>Pages\CreateTeamMember::route('/create'),'edit'=>Pages\EditTeamMember::route('/{record}/edit')];
    }
}
