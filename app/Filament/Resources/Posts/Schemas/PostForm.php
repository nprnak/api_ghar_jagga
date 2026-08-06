<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Content')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Textarea::make('excerpt')
                            ->rows(3)
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                        FileUpload::make('featured_image')
                            ->image()
                            ->disk('public')
                            ->directory('posts')
                            ->visibility('public')
                            ->imageEditor(),
                        Select::make('category')
                            ->options([
                                'news' => 'News',
                                'blog' => 'Blog',
                                'announcement' => 'Announcement',
                            ])
                            ->required()
                            ->default('news'),
                        TextInput::make('author_name'),
                        DateTimePicker::make('published_at'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Publishing & SEO')
                    ->schema([
                        Toggle::make('is_published')
                            ->default(true),
                        TextInput::make('seo_title'),
                        Textarea::make('seo_description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
