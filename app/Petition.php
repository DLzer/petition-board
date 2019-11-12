<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    /**
     * 
     * The table associated with Petitions
     * 
     * @var string
     * 
     */
    protected $table = 'xx_petitions';
    /**
     * 
     * The primary Key of the table
     * 
     * @var string
     * 
     */
    protected $primaryKey = 'petition_id';
    /**
     * 
     * Determines if the primary key is auto-incrementing
     * 
     * @var bool
     * 
     */
    public $incrementing = true;
    /**
     * 
     * Defining inital default attributes
     * 
     * @var array
     * 
     */
    protected $attributes = [
        'petition_status'    => 'new',
        'petition_votes'     => 0,
        'petition_author'    => 1

    ];
    /**
     * 
     * Define the saving of timestamps
     * 
     * @var bool
     * 
     */
    public $timestamps = true;

}
