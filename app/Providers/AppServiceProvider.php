<?php

namespace App\Providers;


use App\Repositories\Client\Bookings\Interfaces\BookingInterface;
use App\Repositories\Client\Bookings\Repositories\BookingRepository;
use App\Repositories\Client\Movies\Interfaces\MoviesRepositoryInterface;
use App\Repositories\Client\Movies\Repositories\MoviesRepository;
use App\Repositories\Client\Views\Interfaces\ViewInterface;
use App\Repositories\Client\Views\Repositories\ViewRepository;
use App\Services\Admin\Orders\Services\OrderService;
use App\Services\Client\Bookings\Interfaces\BookingServiceInterface;
use App\Services\Client\Bookings\Services\BookingService;
use App\Services\Client\Views\Interfaces\ViewServiceInterface;
use App\Services\Client\Views\Services\ViewDataService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Views\Composers\GetAllDataComposer;
use App\Repositories\Client\Home\Interface\HomeRepositoryInterface;
use App\Services\Admin\Tags\Services\TagService;
use App\Services\Admin\Areas\Services\AreaService;
use App\Services\Admin\Foods\Services\FoodService;
use App\Services\Admin\Menus\Services\MenuService;
use App\Services\Admin\Pages\Services\PageService;
use App\Services\Admin\Posts\Services\PostService;
use App\Services\Admin\Roles\Services\RoleService;
use App\Services\Admin\Users\Services\UserService;
use App\Services\Client\Home\Services\HomeService;
use App\Services\Admin\Cities\Services\CityService;
use App\Services\Admin\Actors\Services\ActorService;
use App\Services\Admin\Blocks\Services\BlockService;
use App\Services\Admin\Genres\Services\GenreService;
use App\Services\Admin\Movies\Services\MovieService;
use App\Services\Admin\Cinemas\Services\CinemaService;
use App\Services\Admin\Foods\Services\FoodTypeService;
use App\Services\Admin\Systems\Services\SystemService;
use App\Services\Admin\Foods\Services\FoodComboService;
use App\Services\Admin\Modules\Services\ModuleServices;
use App\Repositories\Admin\Tags\Interfaces\TagInterface;
use App\Services\Admin\Payments\Services\PaymentService;
use App\Services\Auth\Admin\Logins\Services\LoginService;
use App\Services\Client\Deposits\Services\DepositService;
use App\Repositories\Admin\Areas\Interfaces\AreaInterface;
use App\Repositories\Admin\Foods\Interfaces\FoodInterface;
use App\Repositories\Admin\Menus\Interfaces\MenuInterface;
use App\Repositories\Admin\Pages\Interfaces\PageInterface;
use App\Repositories\Admin\Posts\Interfaces\PostInterface;
use App\Repositories\Client\Posts\Interface\PostInterface as PostInterfaceClient;
use App\Repositories\Client\Posts\Repository\PostRepository as PostRepositoryClient;
use App\Repositories\Admin\Roles\Interfaces\RoleInterface;
use App\Repositories\Admin\Users\Interfaces\UserInterface;
use App\Repositories\Admin\Cities\Interfaces\CityInterface;
use App\Repositories\Admin\Tags\Repositories\TagRepository;
use App\Services\Admin\Tags\Interfaces\TagServiceInterface;
use App\Repositories\Admin\Actors\Interfaces\ActorInterface;
use App\Repositories\Admin\Blocks\Interfaces\BlockInterface;
use App\Repositories\Admin\Genres\Interfaces\GenreInterface;
use App\Repositories\Admin\Movies\Interfaces\MovieInterface;
use App\Services\Admin\BlockTypes\Services\BlockTypeService;
use App\Repositories\Admin\Areas\Repositories\AreaRepository;
use App\Repositories\Admin\Foods\Repositories\FoodRepository;
use App\Repositories\Admin\Menus\Repositories\MenuRepository;
use App\Repositories\Admin\Pages\Repositories\PageRepository;
use App\Repositories\Admin\Posts\Repositories\PostRepository;
use App\Repositories\Admin\Roles\Repositories\RoleRepository;
use App\Repositories\Admin\Users\Repositories\UserRepository;
use App\Services\Admin\Areas\Interfaces\AreaServiceInterface;
use App\Services\Admin\Foods\Interfaces\FoodServiceInterface;
use App\Services\Admin\Menus\Interfaces\MenuServiceInterface;
use App\Services\Admin\Pages\Interfaces\PageServiceInterface;
use App\Services\Admin\Posts\Interfaces\PostServiceInterface;
use App\Services\Client\Posts\Interface\PostServiceInterface as PostServiceInterfaceClient;
use App\Services\Client\Posts\Services\PostService as PostServiceClient;
use App\Services\Admin\Roles\Interfaces\RoleServiceInterface;
use App\Services\Admin\Users\Interfaces\UserServiceInterface;
use App\Services\Client\Home\Interfaces\HomeServiceInterface;
use App\Repositories\Admin\Cinemas\Interfaces\CinemaInterface;
use App\Repositories\Admin\Cities\Repositories\CityRepository;
use App\Repositories\Admin\Foods\Interfaces\FoodTypeInterface;
use App\Repositories\Admin\Modules\Interfaces\ModuleInterface;
use App\Repositories\Admin\Systems\Interfaces\SystemInterface;
use App\Services\Admin\Cities\Interfaces\CityServiceInterface;
use App\Services\Admin\Permissions\Services\PermissionService;
use App\Repositories\Admin\Actors\Repositories\ActorRepository;
use App\Repositories\Admin\Blocks\Repositories\BlockRepository;
use App\Repositories\Admin\Foods\Interfaces\FoodComboInterface;
use App\Repositories\Admin\Genres\Repositories\GenreRepository;
use App\Repositories\Admin\Movies\Repositories\MovieRepository;
use App\Services\Admin\Actors\Interfaces\ActorServiceInterface;
use App\Services\Admin\Blocks\Interfaces\BlockServiceInterface;
use App\Services\Admin\Genres\Interfaces\GenreServiceInterface;
use App\Services\Admin\Movies\Interfaces\MovieServiceInterface;
use App\Repositories\Admin\Payments\Interfaces\PaymentInterface;
use App\Services\Auth\Client\Registers\Services\RegisterService;
use App\Repositories\Admin\Cinemas\Repositories\CinemaRepository;
use App\Repositories\Admin\Foods\Repositories\FoodTypeRepository;
use App\Repositories\Admin\Modules\Repositories\ModuleRepository;
use App\Repositories\Admin\Systems\Repositories\SystemRepository;
use App\Repositories\Auth\Admin\Logins\Interfaces\LoginInterface;
use App\Repositories\Client\Deposits\Interfaces\DepositInterface;
use App\Services\Admin\Cinemas\Interfaces\CinemaServiceInterface;
use App\Services\Admin\Foods\Interfaces\FoodTypeServiceInterFace;
use App\Services\Admin\Modules\Interfaces\ModuleServiceInterface;
use App\Services\Admin\Systems\Interfaces\SystemServiceInterface;
use App\Services\Client\Transactions\Services\TransactionService;
use App\Repositories\Admin\Foods\Repositories\FoodComboRepository;
use App\Services\Admin\CategoryPosts\Services\CategoryPostService;
use App\Services\Client\CategoryPosts\Services\CategoryPostService as CategoryPostServiceClient;

use App\Services\Admin\Foods\Interfaces\FoodComboServiceInterface;
use App\Repositories\Admin\Payments\Repositories\PaymentRepository;
use App\Services\Admin\Payments\Interfaces\PaymentServiceInterface;
use App\Services\Auth\Client\ForgotPasswords\ForgotPasswordService;
use App\Repositories\Admin\BlockTypes\Interfaces\BlockTypeInterface;
use App\Repositories\Auth\Admin\Logins\Repositories\LoginRepository;
use App\Repositories\Client\Deposits\Repositories\DepositRepository;
use App\Services\Auth\Admin\Logins\Interfaces\LoginServiceInterface;
use App\Services\Client\Deposits\Interfaces\DepositServiceInterface;
use App\Repositories\Admin\Permissions\Interfaces\PermissionInterface;
use App\Repositories\Admin\BlockTypes\Repositories\BlockTypeRepository;
use App\Services\Admin\BlockTypes\Interfaces\BlockTypeServiceInterface;
use App\Repositories\Auth\Client\Registers\Interfaces\RegisterInterface;
use App\Services\Client\Users\Services\UserService as ClientUserService;
use App\Repositories\Admin\Permissions\Repositories\PermissionRepository;
use App\Repositories\Client\Transactions\Interfaces\TransactionInterface;
use App\Services\Admin\Permissions\Interfaces\PermissionServiceInterface;
use App\Services\Client\Cities\Services\CityService as ClientCityService;
use App\Repositories\Admin\CategoryPosts\Interfaces\CategoryPostInterface;
use App\Repositories\Client\CategoryPosts\Interface\CategoryPostInterface as CategoryPostInterfaceClient;
use App\Repositories\Auth\Client\Registers\Repositories\RegisterRepository;
use App\Services\Auth\Client\Registers\Interfaces\RegisterServiceInterface;
use App\Repositories\Client\Transactions\Repositories\TransactionRepository;
use App\Services\Auth\Client\ChangePasswords\Services\ChangePasswordService;
use App\Services\Client\Transactions\Interfaces\TransactionServiceInterface;
use App\Repositories\Admin\CategoryPosts\Repositories\CategoryPostRepository;
use App\Repositories\Admin\Contacts\Repositories\ContactRepository;
use App\Repositories\Admin\Contacts\Interfaces\ContactInterface;
use App\Repositories\Admin\Dashboards\Interfaces\DashboardInterface;
use App\Repositories\Admin\Dashboards\Repositories\DashboardRepository;
use App\Repositories\Admin\Notifications\Interfaces\NotificationInterface;
use App\Repositories\Admin\Notifications\Repositories\NotificationRepository;
use App\Repositories\Admin\Orders\Interfaces\OrderInterface;
use App\Repositories\Admin\Orders\Repositories\OrderRepository;
use App\Repositories\Admin\Rewards\Interfaces\RewardInterface;
use App\Repositories\Admin\Rewards\Repositories\RewardRepository;
use App\Repositories\Admin\Vouchers\Interfaces\VoucherInterface;
use App\Repositories\Client\Vouchers\Interfaces\VoucherInterface as ClientVoucherInterface;

use App\Repositories\Admin\Vouchers\Repositories\VoucherRepository;
use App\Repositories\Client\Vouchers\Repositories\VoucherRepository as ClientVoucherRepository;

use App\Repositories\Client\CategoryPosts\Repository\CategoryPostRepository as CategoryPostRepositoryClient;
use App\Services\Admin\CategoryPosts\Interfaces\CategoryPostServiceInterface;
use App\Services\Client\CategoryPosts\Interface\CategoryPostServiceInterface as CategoryPostServiceInterfaceClient;
use App\Repositories\Client\Users\Interfaces\UserInterface as ClientUserInterface;
use App\Repositories\Client\Cities\Interfaces\CityInterface as ClientCityInterface;
use App\Repositories\Auth\Client\ChangePasswords\Interfaces\ChangePasswordInterface;
use App\Repositories\Auth\Client\ForgotPasswords\Interfaces\ForgotPasswordInterface;
use App\Repositories\Client\Users\Repositories\UserRepository as ClientUserRepository;
use App\Repositories\Auth\Client\ChangePasswords\Repositories\ChangePasswordRepository;
use App\Repositories\Auth\Client\ForgotPasswords\Repositories\ForgotPasswordRepository;
use App\Repositories\Client\Cities\Repositories\CityRepository as ClientCityRepository;
use App\Repositories\Client\Home\Repository\HomeRepository;
use App\Repositories\Client\Systems\Interfaces\SystemInterface as InterfacesSystemInterface;
use App\Repositories\Client\Systems\Repositories\SystemRepository as RepositoriesSystemRepository;
use App\Services\Admin\Contacts\Interfaces\ContactServiceInterface;
use App\Services\Admin\Contacts\Services\ContactService;
use App\Repositories\Client\Rewards\Interfaces\RewardInterface as ClientRewardInterface;
use App\Repositories\Client\Rewards\Repositories\RewardRepository as ClientRewardRepository;
use App\Services\Admin\Notifications\Interfaces\NotificationServiceInterface;
use App\Services\Admin\Notifications\Services\NotificationService;
use App\Services\Admin\Dashboards\Interfaces\DashboardServiceInterface;
use App\Services\Admin\Dashboards\Services\DashboardService;
use App\Services\Admin\Orders\Interfaces\OrderServiceInterface;
use App\Services\Admin\Rewards\Services\RewardService;
use App\Services\Admin\Rewards\Interfaces\RewardServiceInterface;
use App\Services\Admin\Vouchers\Interfaces\VoucherServiceInterface;

use App\Services\Admin\Vouchers\Services\VoucherService;
use App\Services\Client\Vouchers\Services\VoucherService as ClientVoucherService;

use App\Services\Auth\Client\ChangePasswords\Interfaces\ChangePasswordServiceInterface;
use App\Services\Auth\Client\ForgotPasswords\Interfaces\ForgotPasswordServicesInterface;
use App\Services\Client\Users\Interfaces\UserServiceInterface as ClientUserServiceInterface;
use App\Services\Client\Cities\Interfaces\CityServiceInterface as ClientCityServiceInterface;
use App\Services\Client\Movies\Services\MovieService as ServicesMovieService;
use App\Services\Client\Movies\Interfaces\MovieServiceInterface as InterfacesMovieServiceInterface;
use App\Services\Client\Systems\Interfaces\SystemServiceInterface as InterfacesSystemServiceInterface;
use App\Services\Client\Systems\Services\SystemService as ServicesSystemService;
use App\Services\Client\Rewards\Interfaces\RewardServiceInterface as ClientRewardServiceInterface;
use App\Services\Client\Rewards\Services\RewardService as ClientRewardService;
use App\Services\Client\Vouchers\Interfaces\VoucherServiceInterface as ClientVoucherServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Admin
        $this->app->bind(DashboardInterface          ::class, DashboardRepository   ::class);
        $this->app->bind(DashboardServiceInterface   ::class, DashboardService      ::class);
        $this->app->bind(ActorInterface              ::class, ActorRepository       ::class);
        $this->app->bind(ActorServiceInterface       ::class, ActorService          ::class);
        $this->app->bind(RewardInterface             ::class, RewardRepository      ::class);
        $this->app->bind(RewardServiceInterface      ::class, RewardService         ::class);
        $this->app->bind(VoucherInterface            ::class, VoucherRepository     ::class);
        $this->app->bind(VoucherServiceInterface     ::class, VoucherService        ::class);
        $this->app->bind(AreaInterface               ::class, AreaRepository        ::class);
        $this->app->bind(AreaServiceInterface        ::class, AreaService           ::class);
        $this->app->bind(BlockTypeInterface          ::class, BlockTypeRepository   ::class);
        $this->app->bind(BlockTypeServiceInterface   ::class, BlockTypeService      ::class);
        $this->app->bind(BlockInterface              ::class, BlockRepository       ::class);
        $this->app->bind(BlockServiceInterface       ::class, BlockService          ::class);
        $this->app->bind(CategoryPostInterface       ::class, CategoryPostRepository::class);
        $this->app->bind(CategoryPostServiceInterface::class, CategoryPostService   ::class);
        $this->app->bind(CinemaInterface             ::class, CinemaRepository      ::class);
        $this->app->bind(CinemaServiceInterface      ::class, CinemaService         ::class);
        $this->app->bind(CityInterface               ::class, CityRepository        ::class);
        $this->app->bind(CityServiceInterface        ::class, CityService           ::class);
        $this->app->bind(FoodComboInterface          ::class, FoodComboRepository   ::class);
        $this->app->bind(FoodComboServiceInterface   ::class, FoodComboService      ::class);
        $this->app->bind(FoodInterface               ::class, FoodRepository        ::class);
        $this->app->bind(FoodServiceInterface        ::class, FoodService           ::class);
        $this->app->bind(FoodTypeInterface           ::class, FoodTypeRepository    ::class);
        $this->app->bind(FoodTypeServiceInterFace    ::class, FoodTypeService       ::class);
        $this->app->bind(GenreInterface              ::class, GenreRepository       ::class);
        $this->app->bind(GenreServiceInterface       ::class, GenreService          ::class);
        $this->app->bind(MovieInterface              ::class, MovieRepository       ::class);
        $this->app->bind(MovieServiceInterface       ::class, MovieService          ::class);
        $this->app->bind(ModuleInterface             ::class, ModuleRepository      ::class);
        $this->app->bind(ModuleServiceInterface      ::class, ModuleServices        ::class);
        $this->app->bind(MenuInterface               ::class, MenuRepository        ::class);
        $this->app->bind(MenuServiceInterface        ::class, MenuService           ::class);
        $this->app->bind(UserInterface               ::class, UserRepository        ::class);
        $this->app->bind(UserServiceInterface        ::class, UserService           ::class);
        $this->app->bind(PageInterface               ::class, PageRepository        ::class);
        $this->app->bind(PageServiceInterface        ::class, PageService           ::class);
        $this->app->bind(PaymentInterface            ::class, PaymentRepository     ::class);
        $this->app->bind(PaymentServiceInterface     ::class, PaymentService        ::class);
        $this->app->bind(PostInterface               ::class, PostRepository        ::class);
        $this->app->bind(PostServiceInterface        ::class, PostService           ::class);
        $this->app->bind(PermissionInterface         ::class, PermissionRepository  ::class);
        $this->app->bind(PermissionServiceInterface  ::class, PermissionService     ::class);
        $this->app->bind(SystemInterface             ::class, SystemRepository      ::class);
        $this->app->bind(SystemServiceInterface      ::class, SystemService         ::class);
        $this->app->bind(TagInterface                ::class, TagRepository         ::class);
        $this->app->bind(TagServiceInterface         ::class, TagService            ::class);
        $this->app->bind(RoleInterface               ::class, RoleRepository        ::class);
        $this->app->bind(RoleServiceInterface        ::class, RoleService           ::class);
        $this->app->bind(LoginInterface              ::class, LoginRepository       ::class);
        $this->app->bind(LoginServiceInterface       ::class, LoginService          ::class);
        $this->app->bind(OrderInterface              ::class, OrderRepository       ::class);
        $this->app->bind(OrderServiceInterface       ::class, OrderService          ::class);
        $this->app->bind(NotificationInterface       ::class, NotificationRepository::class);
        $this->app->bind(NotificationServiceInterface::class, NotificationService   ::class);
        $this->app->bind(ContactInterface            ::class, ContactRepository     ::class);
        $this->app->bind(ContactServiceInterface     ::class, ContactService        ::class);
        // End admin

        // Client
        $this->app->bind(ViewInterface                      ::class, ViewRepository               ::class);
        $this->app->bind(ViewServiceInterface               ::class, ViewDataService              ::class);
        $this->app->bind(RegisterInterface                  ::class, RegisterRepository           ::class);
        $this->app->bind(RegisterServiceInterface           ::class, RegisterService              ::class);
        $this->app->bind(ForgotPasswordInterface            ::class, ForgotPasswordRepository     ::class);
        $this->app->bind(ForgotPasswordServicesInterface    ::class, ForgotPasswordService        ::class);
        $this->app->bind(ChangePasswordInterface            ::class, ChangePasswordRepository     ::class);
        $this->app->bind(ChangePasswordServiceInterface     ::class, ChangePasswordService        ::class);
        $this->app->bind(HomeServiceInterface               ::class, HomeService                  ::class);
        $this->app->bind(HomeRepositoryInterface            ::class, HomeRepository               ::class);
        $this->app->bind(InterfacesMovieServiceInterface    ::class, ServicesMovieService         ::class);
        $this->app->bind(MoviesRepositoryInterface          ::class, MoviesRepository             ::class);
        $this->app->bind(PostServiceInterfaceClient         ::class, PostServiceClient            ::class);
        $this->app->bind(PostInterfaceClient                ::class, PostRepositoryClient         ::class);
        $this->app->bind(CategoryPostServiceInterfaceClient ::class, CategoryPostServiceClient    ::class);
        $this->app->bind(CategoryPostInterfaceClient        ::class, CategoryPostRepositoryClient ::class);

        $this->app->bind(InterfacesSystemInterface          ::class, RepositoriesSystemRepository ::class);
        $this->app->bind(InterfacesSystemServiceInterface   ::class, ServicesSystemService        ::class);
        $this->app->bind(ClientCityInterface                ::class, ClientCityRepository         ::class);
        $this->app->bind(ClientCityServiceInterface         ::class, ClientCityService            ::class);
        $this->app->bind(DepositInterface                   ::class, DepositRepository            ::class);
        $this->app->bind(DepositServiceInterface            ::class, DepositService               ::class);
        $this->app->bind(TransactionInterface               ::class, TransactionRepository        ::class);
        $this->app->bind(TransactionServiceInterface        ::class, TransactionService           ::class);
        $this->app->bind(ClientUserInterface                ::class, ClientUserRepository         ::class);
        $this->app->bind(ClientUserServiceInterface         ::class, ClientUserService            ::class);
        $this->app->bind(BookingInterface                   ::class, BookingRepository            ::class);
        $this->app->bind(BookingServiceInterface            ::class, BookingService               ::class);
        $this->app->bind(ClientRewardInterface              ::class, ClientRewardRepository       ::class);
        $this->app->bind(RewardServiceInterface             ::class, RewardService                ::class);
        $this->app->bind(ClientRewardServiceInterface       ::class, ClientRewardService          ::class);

        $this->app->bind(ClientVoucherInterface                   ::class, ClientVoucherRepository            ::class);
        $this->app->bind(ClientVoucherServiceInterface            ::class, ClientVoucherService               ::class);

    
        // End client
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Admin
        View::composer('admin.partials.sidebar', GetAllDataComposer::class);
        View::composer('client.partials.*', GetAllDataComposer::class);
        // if (env('APP_ENV') !== 'local') {
        //     URL::forceScheme('https');
        // }
    }
}
