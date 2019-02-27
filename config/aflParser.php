<?php
return [
    /**
     * Type of model classes to use for processed data.
     * 
     * Currently options include:
     * - 'default' (the default option - surprise!),
     * - 'eloquent' (for use with Laravel's Eloquent ORM)
     */
    'model_type' => 'default',

    /**
     * Link mappings to a specific parser.
     * 
     * If empty, Parsers will usually automatically use their associated default
     * mappings.
     */
    'parser_mappings' => [
        
    ]
];