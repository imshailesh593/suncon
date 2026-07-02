<?php
namespace App\Filament\Resources;
use App\Filament\Resources\ContactSubmissionResource\Pages;
use App\Models\ContactSubmission;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput,Textarea,Toggle,Section,Placeholder};
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn,IconColumn};
use Filament\Tables\Filters\Filter;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;

class ContactSubmissionResource extends Resource {
    protected static ?string $model = ContactSubmission::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Enquiries';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Enquiries';

    public static function getNavigationBadge(): ?string {
        return (string) ContactSubmission::where('read', false)->count() ?: null;
    }
    public static function getNavigationBadgeColor(): string { return 'danger'; }

    public static function form(Form $form): Form {
        return $form->schema([
            Section::make('Enquiry Details')->schema([
                Placeholder::make('name')->content(fn($record)=>$record?->name),
                Placeholder::make('email')->content(fn($record)=>$record?->email),
                Placeholder::make('phone')->content(fn($record)=>$record?->phone ?? '—'),
                Placeholder::make('project_type')->content(fn($record)=>$record?->project_type ?? '—'),
                Placeholder::make('message')->content(fn($record)=>$record?->message)->columnSpanFull(),
                Placeholder::make('submitted_at')->label('Received')->content(fn($record)=>$record?->created_at?->format('d M Y, H:i')),
                Toggle::make('read')->label('Mark as read'),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            TextColumn::make('name')->searchable()->weight('medium'),
            TextColumn::make('email')->searchable()->color('gray'),
            TextColumn::make('phone')->color('gray'),
            TextColumn::make('project_type')->badge()->label('Type'),
            TextColumn::make('message')->limit(50)->color('gray'),
            IconColumn::make('read')->boolean()->label('Read'),
            TextColumn::make('created_at')->dateTime('d M Y, H:i')->sortable()->label('Received'),
        ])
        ->filters([
            Filter::make('unread')->query(fn(Builder $q)=>$q->where('read',false))->label('Unread only'),
        ])
        ->defaultSort('created_at','desc');
    }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListContactSubmissions::route('/'),
            'view'   => Pages\ViewContactSubmission::route('/{record}'),
        ];
    }

    public static function canCreate(): bool { return false; }
}
