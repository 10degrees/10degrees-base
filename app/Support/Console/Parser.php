<?php

namespace App\Support\Console;

use Exception;
use Illuminate\Support\Str;

class Parser
{
    /**
     * Parse the given console command definition into an array.
     *
     * @param  string  $expression
     *
     * @return array
     */
    public static function parse(string $expression): array
    {
        $name = static::name($expression);

        if (preg_match_all('/\{\s*(.*?)\s*\}/', $expression, $matches)) {
            if (count($matches[1])) {
                return array_merge([$name], static::parameters($matches[1]));
            }
        }

        return [$name, [], []];
    }

    /**
     * Extract the name of the command from the expression.
     *
     * @param  string  $expression
     * @return string
     *
     * @throws \Exception
     */
    protected static function name(string $expression): string
    {
        if (!preg_match('/[^\s]+/', $expression, $matches)) {
            throw new Exception('Unable to determine command name from signature.');
        }

        return $matches[0];
    }

    /**
     * Extract all of the parameters from the tokens.
     *
     * @param  array  $tokens
     *
     * @return array
     */
    protected static function parameters(array $tokens): array
    {
        $arguments = [];

        $options = [];

        foreach ($tokens as $token) {
            if (preg_match('/-{2,}(.*)/', $token, $matches)) {
                $options[] = static::parseOption($matches[1]);
            } else {
                $arguments[] = static::parseArgument($token);
            }
        }

        return [$arguments, $options];
    }

    /**
     * Parse an argument expression.
     *
     * @param  string  $token
     *
     * @return array
     */
    protected static function parseArgument(string $token): array
    {
        [$token, $description] = static::extractDescription($token);

        switch (true) {
            case Str::endsWith($token, '?'):
                return [
                    'type'        => 'positional',
                    'name'        => trim($token, '?'),
                    'description' => $description,
                    'optional'    => true,
                ];
            case preg_match('/(.+)\=(.+)/', $token, $matches):
                return [
                    'type'        => 'positional',
                    'name'        => $matches[1],
                    'description' => $description,
                    'default'     => $matches[2],
                ];
            default:
                return [
                    'type'        => 'positional',
                    'name'        => $token,
                    'description' => $description,
                ];
        }
    }

    /**
     * Parse an option expression.
     *
     * @param  string  $token
     *
     * @return array
     */
    protected static function parseOption(string $token): array
    {
        [$token, $description] = static::extractDescription($token);

        switch (true) {
            case Str::endsWith($token, '='):
                return [
                    'type'        => 'assoc',
                    'name'        => trim($token, '='),
                    'description' => $description,
                ];
            case preg_match('/(.+)\=(.+)/', $token, $matches):
                return [
                    'type'        => 'assoc',
                    'name'        => $matches[1],
                    'description' => $description,
                    'default'     => $matches[2],
                ];
            default:
                return [
                    'type'        => 'flag',
                    'name'        => $token,
                    'description' => $description,
                    'optional'    => true,
                ];
        }
    }

    /**
     * Parse the token into its token and description segments.
     *
     * @param  string  $token
     *
     * @return array
     */
    protected static function extractDescription(string $token): array
    {
        $parts = preg_split('/\s+:\s+/', trim($token), 2);

        return count($parts) === 2 ? $parts : [$token, ''];
    }
}
