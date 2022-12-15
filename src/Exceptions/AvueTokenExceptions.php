<?php

namespace iLzx\AdminStarter\Exceptions;

use Exception;

class AvueTokenExceptions extends Exception
{
    /**
     *渲染异常为 HTTP 响应。
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return adminOutput($this->code, [], $this->message);
    }
}