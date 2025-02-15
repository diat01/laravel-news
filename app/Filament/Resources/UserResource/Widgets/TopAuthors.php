<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TopAuthors extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::withCount("news")->orderBy("news_count", "desc")->where("news_count", ">", 0)->take(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make("name")->label(__("Username")),
                Tables\Columns\TextColumn::make("news_count")->label(__("Published news count"))
            ]);
    }
}
