<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use SoftDeletes;
	
	protected $table = 'favourites';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

        
         public function campaign()
        {
            return $this->belongsTo('App\Models\Campign','campaign_id');        

        }
}
