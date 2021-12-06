<?php

namespace iLzx\AdminStarter\Facades\JWT\Facade;

use DateTimeImmutable;
use Illuminate\Support\Facades\Config;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\UnencryptedToken;

class JWT
{
    public static function getConfig(): Configuration
    {
        return Configuration::forSymmetricSigner(
        // You may use any HMAC variations (256, 384, and 512)
            new Sha256(),
            // replace the value below with a key of your own!
            InMemory::base64Encoded('a2l0ZS1hZG1pbi1hdnVlLXRva2Vu')
        // You may also override the JOSE encoder/decoder if needed by providing extra arguments here
        );
    }

    public static function createToken($uid)
    {
        $config = self::getConfig();
        assert($config instanceof Configuration);
        $now        = new DateTimeImmutable();
        $jwt_config = Config::get('avue.token');
        return $config->builder()
            // Configures the issuer (iss claim)
            ->issuedBy($jwt_config['issuedBy'])
            // Configures the audience (aud claim)
            ->permittedFor($jwt_config['permittedFor'])
            // Configures the id (jti claim)
            ->identifiedBy($jwt_config['identifiedBy'])
            // Configures the time that the token was issue (iat claim)
            ->issuedAt($now)
            // Configures the time that the token can be used (nbf claim)
            ->canOnlyBeUsedAfter($now->modify($jwt_config['canOnlyBeUsedAfter']))
            // Configures the expiration time of the token (exp claim)
            ->expiresAt($now->modify($jwt_config['expiresAt']))
            // Configures a new claim, called "uid"
            ->withClaim('uid', $uid)
            // Configures a new header, called "foo"
            ->withHeader('herder', $jwt_config['withHeader'])
            // Builds a new token
            ->getToken($config->signer(), $config->signingKey());
    }

    public static function parseToken(string $token)
    {
        $config = self::getConfig();
        assert($config instanceof Configuration);
        $token = $config->parser()->parse($token);
        assert($token instanceof UnencryptedToken);

        $token->headers(); // Retrieves the token headers
        $token->claims(); // Retrieves the token claims
    }

    public static function validationToken(string $token)
    {

    }
}