<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput, Textarea, RichEditor, Select, Toggle, DatePicker};
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn, BadgeColumn};
use Filament\Resources\Resource;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required()->columnSpanFull(),
            TextInput::make('slug')->required()->unique(ignoreRecord: true)->columnSpanFull(),
            Textarea::make('excerpt')->required()->rows(3)->columnSpanFull(),
            RichEditor::make('content')->columnSpanFull()->toolbarButtons(['bold','italic','link','bulletList','orderedList','h2','h3','blockquote']),
            TextInput::make('image')->required()->url()->columnSpanFull()->label('Image URL'),
            TextInput::make('author')->required(),
            Select::make('category')->options(['Insights'=>'Insights','Opinion'=>'Opinion','Research'=>'Research','Studio Notes'=>'Studio Notes']),
            TextInput::make('read_time')->default('5 min read'),
            DatePicker::make('published_at')->required(),
            Toggle::make('published')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('image')->width(80)->height(60)->label(''),
            TextColumn::make('title')->searchable()->limit(45),
            TextColumn::make('author'),
            TextColumn::make('category')->badge(),
            TextColumn::make('published_at')->date('d M Y')->sortable(),
            IconColumn::make('published')->boolean(),
        ])->defaultSort('published_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit'   => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
