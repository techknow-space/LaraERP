<?php
/* Model object generated by: Skipper (http://www.skipper18.com) */
/* Do not modify this file manually.*/

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class PartPrice extends Model
{
  /**  
  * Primary key type.
  * 
  * @var string
  */
  protected $keyType='uuid';
  
  /**  
  * Primary key is non-autoincrementing.
  * 
  * @var bool
  */
  protected $incrementing=false;
  
  /**  
  * The model's default values for attributes.
  * 
  * @var array
  */
  protected $attributes=[
    'last_cost'=>0.00,
    'selling_price_b2c'=>0.00,
    'selling_price_b2b'=>0.00
  ];
  /**  
  * The attributes that should be cast to native types.
  * 
  * @var array
  */
  protected $casts=[
    'id'=>'string',
    'part_id'=>'string',
    'last_cost'=>'float',
    'selling_price_b2c'=>'float',
    'selling_price_b2b'=>'float'
  ];
}
