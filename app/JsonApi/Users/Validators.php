<?php

namespace App\JsonApi\Users;

use CloudCreativity\LaravelJsonApi\Contracts\Validators\RelationshipsValidatorInterface;
use CloudCreativity\LaravelJsonApi\Validators\AbstractValidatorProvider;

class Validators extends AbstractValidatorProvider
{
    /**
     * @var array
     */
    protected $allowedFilteringParameters = [
        'created-at',
        'updated-at',
        'email',
        'name'
    ];
    /**
     * @var string
     */
    protected $resourceType = 'users';
    protected $allowedIncludePaths = [
        'wallet'
    ];
    /**
     * Get the validation rules for the resource attributes.
     *
     * @param $record
     *      the record being updated, or null if it is a create request.
     * @return array
     */
    protected function attributeRules($record = null)
    {
        return [
            //
        ];
    }

    /**
     * Define the validation rules for the resource relationships.
     *
     * @param RelationshipsValidatorInterface $relationships
     * @param $record
     *      the record being updated, or null if it is a create request.
     * @return void
     */
    protected function relationshipRules(RelationshipsValidatorInterface $relationships, $record = null)
    {
        $relationships->hasOne('wallet', 'wallet');
    }

}
