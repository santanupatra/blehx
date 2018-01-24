<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaignvisit extends Model
{
    use SoftDeletes;
	
	protected $table = 'campaignvisits';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
        function campaigns()
        {
          return $this->belongsTo('App\Models\Campaign','campaign_id');        

        }
}
