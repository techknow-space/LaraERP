<?php
namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Part extends Base\Part implements Searchable
{
    public function getSearchResult(): SearchResult
    {
        // $url = route('categories.show', $this->id);

        // return new SearchResult(
        //     $this,
        //     $this->name,
        //     $url
        //  );
    }

    public function devices()
    {
        return $this->belongsTo('App\Models\Device', 'device_id');
    }

    public function price()
    {
        return $this->hasOne('App\Models\PartPrice','part_id');
    }

    public function stock()
    {
        return $this->hasMany('App\Models\PartStock','part_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\PartCategory','partCategory_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\PartStatus','partStatus_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\PartType','partType_id');
    }

    public function colour()
    {
        return $this->belongsTo('App\Models\PartColour','partColour_id');
    }
}
