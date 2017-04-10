<?php

namespace App\Admin\Extensions;

use Encore\Admin\Admin;
use App\TripList;

class TripLists
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    protected function script()
    {
        return <<<SCRIPT

$('.submit').on('click', function () {
    
    // Your code.
   location.href = document.getElementById("form-control-select").value;
    
});

SCRIPT;
    }

    protected function render()
    {
        Admin::script($this->script());

        $selectarr = TripList::where('trip_id','=',$this->id)->pluck('times', 'id')->toArray();
        $select_html = '<option value="'.url("admin/triplists/$this->id/create").'">新增期数</option>';
        foreach ($selectarr as $key => $val) {
            $select_html .=  '<option value="'.url("admin/triplists/$this->id/$key/edit").'">'.$val.'</option>';
        }
        return '
<a data-toggle="modal" data-target="#triplists-modal" data-id="{$this->id}"><i class="fa fa-eye"></i></a>


<div class="modal fade" id="triplists-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">' . trans("admin::lang.filter") .'</h4>
            </div>
                
                    <div class="modal-body">
                        <div class="form">

                              <div class="form-group">
            <select class="form-control-select" style="width: 100%;" id="form-control-select">
                    '. $select_html .'
            </select>
                             </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary submit">' . trans("admin::lang.submit") .'</button>

                    </div>
              
        </div>
    </div>
</div>
';
    }

    public function __toString()
    {
        return $this->render();
    }

}