<?php

namespace App\Filament\Resources\NewsResource\Widgets;

use App\Models\News;
use Faker\Provider\Text;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestNews extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                News::latest()->select(["id", "name", "image"])->take(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make("image")->label(__("Image")),
                Tables\Columns\TextColumn::make("name")->label(__("Name")),
            ]);
    }
}
