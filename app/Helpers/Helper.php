<?php

namespace App\Helpers;

use App\Repositories\Admin\Systems\Repositories\SystemRepository;

class Helper
{
    public static $HELPER_TITLE = [];
    public static $titleByType = [];

    private $systemRepository;

    public function __construct(SystemRepository $systemRepository)
    {
        $this->systemRepository = $systemRepository;
    }

    public function titleHelper($request)
    {
        $systems = $this->systemRepository->getAllSystemByType0($request);

        foreach ($systems as $system) {
            self::$titleByType[$system->id] = $system->name;
        }

        if (isset(self::$titleByType[$request->system_id])) {
            $systemName = self::$titleByType[$request->system_id];
            self::$HELPER_TITLE['index'] = __('language.admin.systems.listHelper') .' '. $systemName;
            self::$HELPER_TITLE['create'] = __('language.admin.systems.createHelper') .' '. $systemName;
            self::$HELPER_TITLE['edit'] = __('language.admin.systems.editHelper') .' '. $systemName;
        }

        return self::$HELPER_TITLE;
    }
}
