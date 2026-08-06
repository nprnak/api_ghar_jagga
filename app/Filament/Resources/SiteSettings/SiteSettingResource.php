<?php

namespace App\Filament\Resources\SiteSettings;

use App\Filament\Resources\SiteSettings\Pages\ManageSiteSettings;
use App\Models\SiteSetting;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?string $modelLabel = 'Site Setting';

    protected static ?string $pluralModelLabel = 'Site Settings';

    protected static ?string $recordTitleAttribute = 'company_name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Site settings')
                    ->tabs([
                        Tab::make('Company')
                            ->schema([
                                Section::make('Company info')
                                    ->schema([
                                        TextInput::make('company_name')
                                            ->required(),
                                        TextInput::make('company_name_np')
                                            ->label('Company name (NP)'),
                                        TextInput::make('tagline'),
                                        TextInput::make('tagline_np')
                                            ->label('Tagline (NP)'),
                                        Textarea::make('about_short')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        RichEditor::make('about_full')
                                            ->columnSpanFull(),
                                        TextInput::make('phone')
                                            ->tel(),
                                        TextInput::make('email')
                                            ->email(),
                                        TextInput::make('address'),
                                        TextInput::make('address_np')
                                            ->label('Address (NP)'),
                                        TextInput::make('working_hours'),
                                        FileUpload::make('logo_path')
                                            ->label('Logo')
                                            ->image()
                                            ->disk('public')
                                            ->directory('settings')
                                            ->visibility('public'),
                                        FileUpload::make('favicon_path')
                                            ->label('Favicon')
                                            ->image()
                                            ->disk('public')
                                            ->directory('settings')
                                            ->visibility('public'),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Hero')
                            ->schema([
                                Section::make('Homepage hero')
                                    ->schema([
                                        FileUpload::make('hero_image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('settings')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->columnSpanFull(),
                                        TextInput::make('hero_headline'),
                                        TextInput::make('hero_headline_np')
                                            ->label('Hero headline (NP)'),
                                        Textarea::make('hero_subheadline')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        TextInput::make('hero_cta_text'),
                                        TextInput::make('hero_cta_link'),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Vision & Mission')
                            ->schema([
                                Section::make('Vision, mission & objectives')
                                    ->schema([
                                        RichEditor::make('vision')
                                            ->columnSpanFull(),
                                        RichEditor::make('mission')
                                            ->columnSpanFull(),
                                        TagsInput::make('objectives')
                                            ->placeholder('Add an objective')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                        Tab::make('Social & Map')
                            ->schema([
                                Section::make('Social links')
                                    ->schema([
                                        TextInput::make('facebook_url')->url(),
                                        TextInput::make('instagram_url')->url(),
                                        TextInput::make('linkedin_url')->url(),
                                        TextInput::make('youtube_url')->url(),
                                        TextInput::make('tiktok_url')->url(),
                                    ])
                                    ->columns(2),
                                Section::make('Map')
                                    ->schema([
                                        Textarea::make('google_map_embed')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                        TextInput::make('google_map_lat')
                                            ->numeric()
                                            ->label('Latitude'),
                                        TextInput::make('google_map_lng')
                                            ->numeric()
                                            ->label('Longitude'),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('SEO')
                            ->schema([
                                Section::make('Search engine')
                                    ->schema([
                                        TextInput::make('seo_title'),
                                        Textarea::make('seo_description')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        TextInput::make('seo_keywords')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company_name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSiteSettings::route('/'),
        ];
    }
}
