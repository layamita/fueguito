<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Jun 2017 18:13:11 +0000.
 */

namespace App\MaxMind\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MaxmindIpsBlock
 * 
 * @property int $id
 * @property string $ip_start
 * @property int $ip_start_int
 * @property string $ip_end
 * @property int $ip_end_int
 * @property string $isp
 * @property string $carrier
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\MaxMind\Models
 */
class MaxmindIpsBlock extends Eloquent
{
	protected $casts = [
		'ip_start_int' => 'int',
		'ip_end_int' => 'int'
	];

	protected $fillable = [
		'ip_start',
		'ip_start_int',
		'ip_end',
		'ip_end_int',
		'isp',
		'carrier'
	];
}
