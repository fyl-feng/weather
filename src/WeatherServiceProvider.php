<?php

namespace FylFeng\Weather;

use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务

        $this->app->singleton('weather', function(){
            return new Weather(config('services.weather.key'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->loadViewsFrom(__DIR__ . '/views', 'weather'); // 视图目录指定
//
//        $this->publishes([
//
//            __DIR__.'/views' => base_path('resources/views/vendor/weather'),  // 发布视图目录到resources 下
//
//            __DIR__.'/config/weather.php' => config_path('weather.php'), // 发布配置文件到 laravel 的config 下
//
//        ]);
    }
    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return [Weather::class, 'weather'];

    }
}
