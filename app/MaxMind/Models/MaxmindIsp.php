<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 07 Jun 2017 11:17:19 +0000.
 */

namespace App\MaxMind\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Yadakhov\InsertOnDuplicateKey;

/**
 * Class MaxmindIsp
 * 
 * @property int $id
 * @property string $country_code
 * @property string $carrier
 * @property string $isp
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\MaxMind\Models
 */
class MaxmindIsp extends Eloquent
{
        // The function is implemented as a trait.
        use InsertOnDuplicateKey;
	
        protected $fillable = [
		'country_code',
		'carrier',
		'isp'
	];
}
