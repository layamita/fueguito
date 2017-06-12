<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 07 Jun 2017 10:34:35 +0000.
 */

namespace App\MaxMind\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MaxmindLocation
 * 
 * @property int $id
 * @property string $country_code
 * @property string $city
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\MaxMind\Models
 */
class MaxmindLocation extends Eloquent
{
	protected $fillable = [
		'country_code',
		'city'
	];
}
