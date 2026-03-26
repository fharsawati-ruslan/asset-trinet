<?php

namespace App\Filament\Resources\AssetResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class LocationRelationManager extends RelationManager
{
    protected static string $relationship = 'location';

    protected static ?string $title = 'Lokasi & PIC';

   public function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('Lokasi & Penanggung Jawab')
                    ->icon('heroicon-o-map-pin')
                    ->schema([

                        Forms\Components\TextInput::make('lokasi')
                            ->label('Lokasi Barang')
                            ->required()
                            ->placeholder('Lantai 2 - Ruang Server')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('divisi')
                            ->label('Divisi / Unit')
                            ->placeholder('IT, Finance, HR'),

                        Forms\Components\TextInput::make('pic')
                            ->label('Penanggung Jawab (PIC)')
                            ->placeholder('Nama PIC'),

                    ])

            ]);
    }

   public function table (Table $table): Table
    {
        return $table
            ->recordTitleAttribute('lokasi')
            ->columns([

                Tables\Columns\TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->icon('heroicon-o-map-pin'),

                Tables\Columns\TextColumn::make('divisi')
                    ->label('Divisi')
                    ->icon('heroicon-o-building-office'),

                Tables\Columns\TextColumn::make('pic')
                    ->label('PIC')
                    ->icon('heroicon-o-user'),

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Lokasi'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}