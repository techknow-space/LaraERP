<?php
/* Model object generated by: Skipper (http://www.skipper18.com) */
/* Do not modify this file manually.*/

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
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
    'sku'=>'string',
    'details'=>'string',
    'partCategory_id'=>'string',
    'partStatus_id'=>'string',
    'partType_id'=>'string',
    'partColour_id'=>'string',
    'device_id'=>'string',
    'first_received'=>'datetime',
    'part_name'=>'string'
  ];
  public function StockCountItemsSeqs()
  {
    return $this->hasMany('\App\Models\StockCountItemsSeq','part_id','id');
  }
  public function StockCountItems()
  {
    return $this->hasMany('\App\Models\StockCountItems','part_id','id');
  }
  public function PurchaseOrderItems()
  {
    return $this->hasMany('\App\Models\PurchaseOrderItems','part_id','id');
  }
  public function PurchaseOrderDiffItems()
  {
    return $this->hasMany('\App\Models\PurchaseOrderDiffItems','part_id','id');
  }
}
