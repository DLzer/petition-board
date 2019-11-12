<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetitionComment extends Model
{
        /**
     * 
     * The table associated with Petitions
     * 
     * @var string
     * 
     */
    protected $table = 'xx_petition_comments';
    /**
     * 
     * The primary Key of the table
     * 
     * @var string
     * 
     */
    protected $primaryKey = 'comment_id';
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
        'comment_author'    => 1
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
