<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Jun 2017 17:23:25 +0000.
 */

namespace App\MaxMind\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MaxmindGeo
 * 
 * @property int $id
 * @property string $continent_code
 * @property string $continent_name
 * @property string $country_iso
 * @property string $country_name
 * @property string $province
 * @property string $city
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package Fueguito\MaxMind\Models
 */
class MaxmindGeo extends Eloquent
{
	protected $table = 'maxmind_geo';

	protected $fillable = [
		'continent_code',
		'continent_name',
		'country_iso',
		'country_name',
		'province',
		'city'
	];
}
