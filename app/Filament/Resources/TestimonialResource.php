<?php
namespace App\Filament\Resources;
use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\{Testimonial,Project};
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,Select,Toggle,FileUpload,Section,Grid};
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn,ImageColumn,IconColumn};
use Filament\Resources\Resource;

class TestimonialResource extends Resource {
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationGroup = 'Marketing';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form {
        return $form->schema([
            Section::make('Testimonial')->schema([
                Textarea::make('quote')->required()->rows(4)->columnSpanFull(),
                Grid::make(3)->schema([
                    TextInput::make('client_name')->required(),
                    TextInput::make('company'),
                    TextInput::make('role'),
                ]),
                Grid::make(3)->schema([
                    Select::make('rating')->options([5=>'★★★★★',4=>'★★★★',3=>'★★★',2=>'★★',1=>'★'])->default(5),
                    Select::make('project_id')->label('Linked Project')
                        ->options(Project::pluck('title','id'))->nullable()->searchable(),
                    Toggle::make('published')->default(true)->inline(false),
                ]),
            ]),
            Section::make('Photo')->schema([
                FileUpload::make('image')->label('Client Photo')->disk('public')->directory('testimonials')
                    ->image()->imageEditor()->avatar()->columnSpanFull(),
            ]),
            TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            ImageColumn::make('image')->circular()->width(44)->height(44)->label(''),
            TextColumn::make('client_name')->searchable()->weight('medium'),
            TextColumn::make('company')->color('gray'),
            TextColumn::make('quote')->limit(60)->color('gray'),
            TextColumn::make('rating'),
            IconColumn::make('published')->boolean(),
        ])->defaultSort('sort_order');
    }

    public static function getPages(): array {
        return ['index'=>Pages\ListTestimonials::route('/'),'create'=>Pages\CreateTestimonial::route('/create'),'edit'=>Pages\EditTestimonial::route('/{record}/edit')];
    }
}
