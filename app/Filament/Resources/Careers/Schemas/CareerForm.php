<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CareerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Job details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('department'),
                        TextInput::make('location'),
                        Select::make('employment_type')
                            ->options([
                                'full-time' => 'Full-time',
                                'part-time' => 'Part-time',
                                'contract' => 'Contract',
                                'internship' => 'Internship',
                            ])
                            ->required()
                            ->default('full-time'),
                        DatePicker::make('deadline'),
                        RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        TagsInput::make('requirements')
                            ->placeholder('Add a requirement')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Publishing')
                    ->schema([
                        Toggle::make('is_published')
                            ->default(true),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
