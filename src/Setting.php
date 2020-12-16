<?php

namespace Dcat\Admin\Satan\Admin\Log;

use Dcat\Admin\Extend\Setting as Form;
use Dcat\Admin\Satan\Admin\Log\Http\Middleware\LogOperation;
use Dcat\Admin\Support\Helper;

class Setting extends Form
{
    public function title()
    {
     return $this->trans('log.title');
    }

    public function form()
    {
    }
}
