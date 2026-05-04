<?php

namespace App\Providers;

use App\QueryBuilders\ImportLogsQueryBuilder;
use App\QueryBuilders\LangsQueryBuilder;
use App\QueryBuilders\LexiconsQueryBuilder;
use App\QueryBuilders\ModesQueryBuilder;
use App\QueryBuilders\PatternsQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\TasksQueryBuilder;
use App\QueryBuilders\ThemesQueryBuilder;
use App\QueryBuilders\UsersQueryBuilder;
use App\QueryBuilders\WordsQueryBuilder;
use App\Services\Contracts\Social;
use App\Services\SocialService;
use Illuminate\Pagination\Paginator as Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, LangsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, ModesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, ThemesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, WordsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, PatternsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, LexiconsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, TasksQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, ImportLogsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, UsersQueryBuilder::class);
        // Services
        $this->app->bind(Social::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
    }
}
