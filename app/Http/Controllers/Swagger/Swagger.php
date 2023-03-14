<?php

namespace App\Http\Controllers\Swagger;

/**
 * @OA\Info(
 *  title="APIドキュメント",
 *  description="API description",
 *  version="1.0.0"
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="Bearer",
 *      bearerFormat="JWT",
 * ),
 *
 */
class Swagger
{
}
