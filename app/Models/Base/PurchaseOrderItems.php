<?php
/* Model object generated by: Skipper (http://www.skipper18.com) */
/* Do not modify this file manually.*/

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItems extends Model
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
  * The model's default values for attributes.
  * 
  * @var array
  */
  protected $attributes=['qty_received'=>0];
  /**  
  * The attributes that should be cast to native types.
  * 
  * @var array
  */
  protected $casts=[
    'id'=>'string',
    'part_id'=>'string',
    'purchaseOrder_id'=>'string',
    'qty'=>'integer',
    'cost'=>'float',
    'cost_currency'=>'string',
    'qty_received'=>'integer',
      'total_cost'=>'float',
      'actual_cost'=>'float'
  ];
  public function Part()
  {
    return $this->belongsTo('\App\Models\Part','part_id','id');
  }
  public function PurchaseOrder()
  {
    return $this->belongsTo('\App\Models\PurchaseOrder','purchaseOrder_id','id');
  }
    public function PurchaseOrderDistributionItems()
    {
        return $this->hasMany('\App\Models\PurchaseOrderItemsDistribution','purchaseOrder_item_id','id');
    }
}
