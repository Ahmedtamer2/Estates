<?php

namespace App\Filament\Pages;

use Filament\Forms;
use App\Models\Setting;
use Filament\Pages\Page;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Tabs\Tab;
use UnitEnum;

class SettingPage extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string|UnitEnum|null $navigationGroup = 'System Management';
    protected static ?string $navigationLabel = 'Settings';
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog';
    protected static ?int $navigationSort = 1;
    protected static bool $shouldRegisterNavigation = true;
    protected string $view = 'filament.pages.setting-page';
    public ?array $data = [];

    public $header_title = '';
    public $header_description = '';
    public $header_image = null;
    public $about_us_title = '';
    public $about_us_description = '';
    public $about_us_image1 = null;
    public $about_us_image2 = null;
    public $join_team_link = '';
    public $email = '';
    public $phone = '';
    public $facebook = '';
    public $instagram = '';
    public $twitter = '';
    public $youtube = '';

    public function mount(): void
    {
        $setting = Setting::first();
        $this->form->fill($setting ? $setting->toArray() : [
            'header_title' => '',
            'header_description' => '',
            'header_image' => null,
            'about_us_title' => '',
            'about_us_description' => '',
            'about_us_image1' => null,
            'about_us_image2' => null,
            'join_team_link' => '',
            'email' => '',
            'phone' => '',
            'facebook' => '',
            'instagram' => '',
            'twitter' => '',
            'youtube' => '',
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Tabs::make('Settings')
                ->tabs([
                    Tab::make('Header')
                        ->schema([
                            TextInput::make('header_title')
                                ->label('Header Title')
                                ->required()
                                ->maxLength(255),

                            Textarea::make('header_description')
                                ->label('Header Description')
                                ->required()
                                ->rows(3),

                            FileUpload::make('header_image')
                                ->label('Header Image')
                                ->image()
                                ->directory('settings')
                        ]),

                    Tab::make('About Us')
                        ->schema([
                            TextInput::make('about_us_title')
                                ->label('Title')
                                ->required()
                                ->maxLength(255),

                            Textarea::make('about_us_description')
                                ->label('Description')
                                ->required()
                                ->rows(4),

                            FileUpload::make('about_us_image1')
                                ->label('First Image')
                                ->image()
                                ->directory('settings'),

                            FileUpload::make('about_us_image2')
                                ->label('Second Image')
                                ->image()
                                ->directory('settings'),

                            TextInput::make('join_team_link')
                                ->label('Join Team Link')
                                ->maxLength(255)
                                ->required(),
                        ]),

                    Tab::make('Contact')
                        ->schema([
                            TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->maxLength(255)
                                ->required(),

                            TextInput::make('phone')
                                ->label('Phone')
                                ->tel()
                                ->maxLength(255)
                                ->required(),
                        ]),

                    Tab::make('Social Media')
                        ->schema([
                            TextInput::make('facebook')
                                ->label('Facebook')
                                ->maxLength(255)
                                ->required(),

                            TextInput::make('instagram')
                                ->label('Instagram')
                                ->maxLength(255)
                                ->required(),

                            TextInput::make('twitter')
                                ->label('Twitter')
                                ->maxLength(255)
                                ->required(),

                            TextInput::make('youtube')
                                ->label('Youtube')
                                ->maxLength(255)
                                ->required(),
                        ]),
                ]),
        ];
    }

    public function save(): void
    {
        $settings = Setting::first() ?? new Setting();
        $settings->fill($this->form->getState());
        $settings->save();

        Notification::make()
            ->title('Settings saved successfully')
            ->body('Settings saved successfully')
            ->success()
            ->send();
    }
}
