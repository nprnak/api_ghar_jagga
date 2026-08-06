<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Inquiry details')
                    ->schema([
                        TextInput::make('name')
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('phone')
                            ->tel()
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('subject')
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('service_interest')
                            ->disabled()
                            ->dehydrated(),
                        Textarea::make('message')
                            ->rows(5)
                            ->disabled()
                            ->dehydrated()
                            ->columnSpanFull(),
                        Select::make('status')
                            ->options([
                                'new' => 'New',
                                'in_progress' => 'In progress',
                                'resolved' => 'Resolved',
                                'closed' => 'Closed',
                            ])
                            ->required()
                            ->native(false),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
