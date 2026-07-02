<?php
namespace App\Filament\Resources;
use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,RichEditor,Select,Toggle,DatePicker,FileUpload,TagsInput,Section,Grid};
use Filament\Forms\Set;
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn,ImageColumn,IconColumn};
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\Resource;
use Illuminate\Support\Str;

class ArticleResource extends Resource {
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form {
        return $form->schema([
            Section::make('Article Details')->schema([
                TextInput::make('title')->required()->columnSpanFull()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set,?string $state)=>$set('slug',Str::slug($state))),
                TextInput::make('slug')->required()->unique(ignoreRecord: true)->columnSpanFull(),
                Textarea::make('excerpt')->required()->rows(3)->columnSpanFull(),
                RichEditor::make('content')->columnSpanFull()
                    ->toolbarButtons(['bold','italic','link','bulletList','orderedList','h2','h3','h4','blockquote','codeBlock']),
            ]),
            Section::make('Media')->schema([
                FileUpload::make('image')->label('Cover Image')->disk('public')->directory('articles')
                    ->image()->imageEditor()->columnSpanFull(),
            ]),
            Section::make('Metadata')->schema([
                Grid::make(3)->schema([
                    TextInput::make('author')->required(),
                    Select::make('category')->options([
                        'Insights'=>'Insights','Opinion'=>'Opinion',
                        'Research'=>'Research','Studio Notes'=>'Studio Notes','News'=>'News',
                    ])->required(),
                    TextInput::make('read_time')->default('5 min read'),
                ]),
                TagsInput::make('tags')->columnSpanFull()->placeholder('Add tag'),
                Grid::make(2)->schema([
                    DatePicker::make('published_at')->required(),
                    Toggle::make('published')->default(true)->inline(false),
                ]),
            ]),
            Section::make('SEO')->schema([
                TextInput::make('meta_title')->maxLength(60)->columnSpanFull(),
                Textarea::make('meta_description')->rows(2)->maxLength(160)->columnSpanFull(),
            ])->collapsed(),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            ImageColumn::make('image')->width(80)->height(55)->label(''),
            TextColumn::make('title')->searchable()->limit(40)->weight('medium'),
            TextColumn::make('author')->color('gray'),
            TextColumn::make('category')->badge(),
            TextColumn::make('published_at')->date('d M Y')->sortable(),
            IconColumn::make('published')->boolean(),
        ])
        ->filters([SelectFilter::make('category')->options([
            'Insights'=>'Insights','Opinion'=>'Opinion','Research'=>'Research',
            'Studio Notes'=>'Studio Notes','News'=>'News',
        ])])
        ->defaultSort('published_at','desc');
    }

    public static function getPages(): array {
        return ['index'=>Pages\ListArticles::route('/'),'create'=>Pages\CreateArticle::route('/create'),'edit'=>Pages\EditArticle::route('/{record}/edit')];
    }
}
