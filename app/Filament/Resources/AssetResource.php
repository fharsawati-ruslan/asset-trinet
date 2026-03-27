<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetResource\Pages;
use App\Models\Asset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Asset Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('Identitas Barang')
                    ->schema([

                        Forms\Components\TextInput::make('kode')
                            ->disabled()
                            ->dehydrated(false)
                            ->placeholder('Auto Generate'),

                        Forms\Components\TextInput::make('nama')
                            ->required(),

                        // 🔥 KATEGORI UTAMA
                        Forms\Components\Select::make('kategori')
                            ->label('Kategori Utama')
                            ->options([
                                'it' => 'IT & Network',
                                'device' => 'End User Device',
                                'peripheral' => 'Peripheral',
                                'presentation' => 'Presentation',
                                'furnitur' => 'Furnitur',
                                'power' => 'Power',
                                'security' => 'Security',
                                'other' => 'Other',
                            ])
                            ->required(),

                        // 🔥 SUB KATEGORI (INI YANG MASUK DASHBOARD DETAIL)
                        Forms\Components\Select::make('sub_kategori')
                            ->label('Jenis Barang')
                            ->options([

                                // IT
                                'server' => 'Server',
                                'router' => 'Router',
                                'switch' => 'Switch',
                                'access_point' => 'Access Point',

                                // Device
                                'pc' => 'PC',
                                'laptop' => 'Laptop',
                                'monitor' => 'Monitor',

                                // Peripheral
                                'printer' => 'Printer',
                                'scanner' => 'Scanner',

                                // Furnitur
                                'kursi' => 'Kursi',
                                'meja' => 'Meja',
                                'lemari' => 'Lemari',

                                // Others
                                'atk' => 'ATK',
                                'kabel' => 'Kabel',
                                'tools' => 'Tools',

                                // dll
                                'cctv' => 'CCTV',
                                'proyektor' => 'Proyektor',
                            ])
                            ->searchable()
                            ->required(),

                        Forms\Components\TextInput::make('spesifikasi'),

                        Forms\Components\TextInput::make('serial_number'),

                    ])->columns(2),

                Forms\Components\Section::make('Informasi Tambahan')
                    ->schema([

                        Forms\Components\TextInput::make('lokasi'),

                        Forms\Components\Select::make('kondisi')
                            ->options([
                                'baik' => 'Baik',
                                'rusak' => 'Rusak',
                                'maintenance' => 'Maintenance',
                            ])
                            ->default('baik'),

                        Forms\Components\FileUpload::make('foto')
                            ->image()
                            ->directory('assets'),

                        Forms\Components\DatePicker::make('tanggal_masuk'),

                    ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('kode')->sortable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),

                // 🔥 tampilkan kategori utama
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori'),

                // 🔥 tampilkan sub kategori
                Tables\Columns\TextColumn::make('sub_kategori')
                    ->label('Jenis'),

                Tables\Columns\BadgeColumn::make('kondisi')
                    ->colors([
                        'success' => 'baik',
                        'danger' => 'rusak',
                        'warning' => 'maintenance',
                    ]),

                Tables\Columns\ImageColumn::make('foto'),

                Tables\Columns\TextColumn::make('tanggal_masuk')->date(),

            ])
            ->filters([

                // 🔥 filter kategori utama
                Tables\Filters\SelectFilter::make('kategori'),

                // 🔥 filter jenis barang
                Tables\Filters\SelectFilter::make('sub_kategori'),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }
}