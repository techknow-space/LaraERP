<?php
/* Model object generated by: Skipper (http://www.skipper18.com) */
/* Do not modify this file manually.*/

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDiffItems extends Model
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
  public $incrementing=false;
  
  /**  
  * The attributes that should be cast to native types.
  * 
  * @var array
  */
  protected $casts=[
    'id'=>'string',
    'qty_paid_for'=>'integer',
    'cost'=>'float',
    'cost_currency'=>'string',
    'qty_received'=>'integer',
    'qty_diff'=>'integer',
    'value_diff'=>'float',
    'part_id'=>'string',
    'purchaseOrderDiff_id'=>'string'
  ];
  public function Part()
  {
    return $this->belongsTo('\App\Models\Part','part_id','id');
  }
  public function PurchaseOrderDiff()
  {
    return $this->belongsTo('\App\Models\PurchaseOrderDiff','purchaseOrderDiff_id','id');
  }
}