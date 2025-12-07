<?php

namespace App\Filament\Resources\Blogs\Pages;

use App\Filament\Resources\Blogs\BlogResource;
use App\Filament\Resources\Blogs\Schemas\BlogInfolist;
use Filament\Resources\Pages\ViewRecord;
use BackedEnum;

class ViewBlog extends ViewRecord
{
  protected static string $resource = BlogResource::class;

  protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-eye';

  public function getBreadcrumb(): string
  {
    return __('View');
  }

  protected function getHeaderActions(): array
  {
    return [
      \Filament\Actions\EditAction::make(),
    ];
  }

  public function getFormSchema(): array
  {
    return BlogInfolist::configure($this->getForm())->getComponents();
  }
}
