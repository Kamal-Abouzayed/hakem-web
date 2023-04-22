<?php

namespace App\Providers;

        use App\Repositories\Sql\AdRepository;
        use App\Repositories\Contract\AdRepositoryInterface;

        use App\Repositories\Sql\ArticleRepository;
        use App\Repositories\Contract\ArticleRepositoryInterface;

        use App\Repositories\Sql\SectionRepository;
        use App\Repositories\Contract\SectionRepositoryInterface;

        use App\Repositories\Sql\UserRepository;
        use App\Repositories\Contract\UserRepositoryInterface;

        use App\Repositories\Sql\MailListRepository;
        use App\Repositories\Contract\MailListRepositoryInterface;

        use App\Repositories\Sql\FeatureRepository;
        use App\Repositories\Contract\FeatureRepositoryInterface;

        use App\Repositories\Sql\ServiceRepository;
        use App\Repositories\Contract\ServiceRepositoryInterface;

        use App\Repositories\Sql\GoalRepository;
        use App\Repositories\Contract\GoalRepositoryInterface;

        use App\Repositories\Sql\SettingRepository;
        use App\Repositories\Contract\SettingRepositoryInterface;

        use App\Repositories\Sql\ContactRepository;
        use App\Repositories\Contract\ContactRepositoryInterface;

        use App\Repositories\Sql\ProductRepository;
        use App\Repositories\Contract\ProductRepositoryInterface;
// interface


use App\Repositories\Contract\BaseRepositoryInterface;
// repository

use App\Repositories\Sql\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{

    public function register(){

        $this->app->bind(AdRepositoryInterface::class, AdRepository::class);

        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);

        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(MailListRepositoryInterface::class, MailListRepository::class);

        $this->app->bind(FeatureRepositoryInterface::class, FeatureRepository::class);

        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);

        $this->app->bind(GoalRepositoryInterface::class, GoalRepository::class);

        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);

        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);

    }

    public function boot()
    {
        //
    }

}
