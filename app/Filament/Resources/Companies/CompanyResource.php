<?php

namespace App\Filament\Resources\Companies;

use App\Filament\Resources\Companies\Pages\CreateCompany;
use App\Filament\Resources\Companies\Pages\EditCompany;
use App\Filament\Resources\Companies\Pages\ListCompanies;
use App\Filament\Resources\Companies\Pages\ViewCompany;
use App\Filament\Resources\Companies\Schemas\CompanyForm;
use App\Filament\Resources\Companies\Schemas\CompanyInfolist;
use App\Filament\Resources\Companies\Tables\CompaniesTable;
use App\Models\Company;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                SpatieMediaLibraryFileUpload::make('logo')
                    ->collection('logo')
                    ->label('Firmenlogo')
                    ->image()
                    ->imageEditor()
                    ->helperText('Optionales Logo für die öffentliche Seite')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->label('Firmenname')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->helperText('Wird automatisch aus dem Firmennamen erstellt'),

                Forms\Components\TextInput::make('access_code')
                    ->disabled()
                    ->dehydrated()
                    ->helperText('Automatisch generierter Zugangscode'),

                Forms\Components\Toggle::make('is_active')
                    ->label('Aktiv')
                    ->default(true),

                Forms\Components\Repeater::make('content')
                    ->label('Seiteninhalt')
                    ->collapsed()
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('Block-Typ')
                            ->options([
                                'heading' => 'Überschrift',
                                'text' => 'Text',
                                'list' => 'Liste',
                                'image' => 'Bild',
                            ])
                            ->required()
                            ->reactive(),

                        Forms\Components\TextInput::make('heading')
                            ->label('Überschrift')
                            ->visible(fn ($get) => $get('type') === 'heading'),

                        Forms\Components\RichEditor::make('text')
                            ->label('Text')
                            ->visible(fn ($get) => $get('type') === 'text'),

                        Forms\Components\Repeater::make('items')
                            ->label('Listenpunkte')
                            ->schema([
                                Forms\Components\TextInput::make('item')->label('Punkt'),
                            ])
                            ->visible(fn ($get) => $get('type') === 'list'),

                        SpatieMediaLibraryFileUpload::make('images')
                            ->collection('images') // Collection für mehrere Bilder
                            ->label('Bilder hinzufügen')
                            ->multiple() // Hier erlaubt das Hochladen mehrerer Bilder
                            ->image()
                            ->imageEditor()
                            ->helperText('Mehrere Bilder für diesen Block')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
    public static function infolist(Schema $schema): Schema
    {
        return CompanyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CompaniesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCompanies::route('/'),
            'create' => CreateCompany::route('/create'),
            'view' => ViewCompany::route('/{record}'),
            'edit' => EditCompany::route('/{record}/edit'),
        ];
    }
}
