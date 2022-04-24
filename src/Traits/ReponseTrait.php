<?php

namespace iLzx\AdminStarter\Traits;

use Illuminate\Http\JsonResponse;

trait ReponseTrait
{
    /**
     * @param string $message
     * @param array|null $data
     * @return JsonResponse
     */
    public function error(string $message = '', array $data = null)
    {
        return adminOutput(201, $data, $message);
    }


    /**
     * @param mixed $data
     *
     * @return JsonResponse
     */
    public function success($data)
    {
        return adminOutput(200, $data);
    }


    /**
     * @param string $message
     *
     * @return JsonResponse
     */
    public function message(string $message = 'ok'): JsonResponse
    {
        return adminOutput(200, null, $message);
    }


    /**
     * @param int $code
     * @param array|null $data
     * @param string $message
     * @return JsonResponse
     */
    public function customize($code, array $data = null, string $message = ''): JsonResponse
    {
        return adminOutput($code, $data, $message);
    }
}