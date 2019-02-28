<?php
namespace AflParser;

class Parse
{
    public static function seasonTxt(string $contents)
    {
        $errors = [];
        $parser = new Parser\SeasonTxtParser();
        try {
            $payload = $parser->parse($contents);
        } catch (\Exception $e) {
            $errors[] = $e;
        }
        if (!empty($errors)) {
            $payload->errors = $errors;
        }
        return $payload;
    }

}