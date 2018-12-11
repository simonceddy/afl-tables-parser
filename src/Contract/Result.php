<?php
namespace Eddy\AflTables\Contract;

interface Result
{
    /**
     * Returns an array of Team models. Items in the array must be instances of
     * Eddy\AflTables\Contract\Model\Team.
     * 
     * This method can return an empty array.
     *
     * @return array
     */
    public function teams(): array;

    /**
     * Returns an array of Player models.  Items in the array must be instances
     * of Eddy\AflTables\Contract\Model\Player.
     * 
     * This method can return an empty array.
     *
     * @return array
     */
    public function players(): array;

    /**
     * Returns an array of Match models.  Items in the array must be instances
     * of Eddy\AflTables\Contract\Model\Match.
     * 
     * This method can return an empty array.
     *
     * @return array
     */
    public function matches(): array;
}
