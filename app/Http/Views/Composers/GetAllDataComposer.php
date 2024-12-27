<?php

namespace App\Http\Views\Composers;

use App\Repositories\Admin\Systems\Interfaces\SystemInterface;
use Illuminate\View\View;

class GetAllDataComposer
{
    protected $systemRepository;
    public function __construct(SystemInterface $systemRepository)
    {
        $this->systemRepository = $systemRepository;
    }

    public function compose(View $view)
    {
        $systemsByType0 = $this->systemRepository->getAllSystemByType0SideBar();

        $view->with([
            'systemsByType0' => $systemsByType0
        ]);
        
    
    }
}
