<?php
namespace App\Filament\Widgets;
use App\Models\{Project,Article,ContactSubmission,Testimonial};
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget {
    protected static ?int $sort = 1;

    protected function getStats(): array {
        return [
            Stat::make('Total Projects', Project::count())
                ->description(Project::where('featured',true)->count().' featured')
                ->icon('heroicon-o-building-office-2')
                ->color('success'),
            Stat::make('Published Articles', Article::where('published',true)->count())
                ->description(Article::count().' total')
                ->icon('heroicon-o-newspaper')
                ->color('info'),
            Stat::make('Unread Enquiries', ContactSubmission::where('read',false)->count())
                ->description(ContactSubmission::count().' total received')
                ->icon('heroicon-o-envelope')
                ->color('danger'),
            Stat::make('Testimonials', Testimonial::where('published',true)->count())
                ->description('Published')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->color('warning'),
        ];
    }
}
