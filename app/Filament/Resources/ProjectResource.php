<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput, Textarea, Select, Toggle, FileUpload, TextInput as TI};
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\Resource;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required()->maxLength(255)->columnSpanFull(),
            TextInput::make('slug')->required()->unique(ignoreRecord: true)->columnSpanFull(),
            Select::make('discipline')->options(['architecture'=>'Architecture','interior'=>'Interior Design','urban'=>'Urban Infrastructure'])->required(),
            TextInput::make('year')->required()->maxLength(4),
            TextInput::make('location')->required()->maxLength(255),
            TextInput::make('client')->maxLength(255),
            TextInput::make('area')->maxLength(100),
            TextInput::make('image')->required()->url()->columnSpanFull()->label('Main Image URL'),
            Textarea::make('description')->required()->rows(4)->columnSpanFull(),
            Toggle::make('featured')->default(false),
            TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->width(80)->height(60)->label(''),
                TextColumn::make('title')->searchable()->sortable()->limit(40),
                TextColumn::make('discipline')->badge()->color(fn($state)=>match($state){'architecture'=>'success','interior'=>'warning','urban'=>'info',default=>'gray'}),
                TextColumn::make('location')->limit(25),
                TextColumn::make('year')->sortable(),
                IconColumn::make('featured')->boolean(),
            ])
            ->filters([SelectFilter::make('discipline')->options(['architecture'=>'Architecture','interior'=>'Interior','urban'=>'Urban'])])
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
