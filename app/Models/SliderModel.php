<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    protected $table = 'slider as s';
    protected $primary = 'id';
    public $timestamps = false;
    const CREATED_AT = 'cteated';
    const UPDATED_AT = 'modified';

    public function listItems($params = null, $option){
        $result = null;
        if($option['task'] == 'admin-list-item'){
            $result = $this->select('s.id', 's.name', 's.description', 's.link', 's.thumb', 's.status', 's.created', 's.created_by', 's.modified', 's.modified_by')
            ->where('id', '>', 4)
            ->get()
            ->toArray();
        }

        return $result;
    }



}
