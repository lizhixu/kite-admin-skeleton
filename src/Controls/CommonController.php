<?php

namespace iLzx\AdminStarter\Controls;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Cache;

class CommonController extends Controller
{
    public function captcha($redomstr)
    {
        $builder = new CaptchaBuilder(4);
        $builder->setBackgroundColor('245','247','250');
        $builder->build();
        Cache::add('phrase' . $redomstr, $builder->getPhrase(), 60);
        return $builder->output();
    }
}