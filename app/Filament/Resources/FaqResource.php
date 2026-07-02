<?php
namespace App\Filament\Resources;
use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,Select,Toggle,Section,Grid};
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn,IconColumn};
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\Resource;

class FaqResource extends Resource {
    protected static ?string $model = Faq::class;
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'Marketing';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form {
        return $form->schema([
            Section::make('FAQ')->schema([
                TextInput::make('question')->required()->columnSpanFull(),
                Textarea::make('answer')->required()->rows(5)->columnSpanFull(),
                Grid::make(3)->schema([
                    Select::make('category')->options([
                        'General'=>'General','Services'=>'Services',
                        'Projects'=>'Projects','Process'=>'Process','Fees'=>'Fees',
                    ])->default('General'),
                    Toggle::make('published')->default(true)->inline(false),
                    TextInput::make('sort_order')->numeric()->default(0),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            TextColumn::make('question')->searchable()->limit(60)->weight('medium'),
            TextColumn::make('category')->badge(),
            TextColumn::make('sort_order')->sortable()->label('Order'),
            IconColumn::make('published')->boolean(),
        ])
        ->filters([SelectFilter::make('category')->options([
            'General'=>'General','Services'=>'Services','Projects'=>'Projects','Process'=>'Process','Fees'=>'Fees',
        ])])
        ->defaultSort('sort_order')
        ->reorderable('sort_order');
    }

    public static function getPages(): array {
        return ['index'=>Pages\ListFaqs::route('/'),'create'=>Pages\CreateFaq::route('/create'),'edit'=>Pages\EditFaq::route('/{record}/edit')];
    }
}
