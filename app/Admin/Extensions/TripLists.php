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

$('.edit'+$this->id).on('click', function () {
  var index = document.getElementById("form-control-select"+$this->id).selectedIndex; // 选中索引
  var value = document.getElementById("form-control-select"+$this->id).options[index].value;
   location.href = '/admin/triplists/$this->id/'+value+'/edit';
    
});

$('.order'+$this->id).on('click', function () {
  var index = document.getElementById("form-control-select"+$this->id).selectedIndex; // 选中索引
  var value = document.getElementById("form-control-select"+$this->id).options[index].value;
    location.href = '/admin/order/$this->id/'+value;
    
});

SCRIPT;
    }

    protected function render()
    {
        Admin::script($this->script());

        $selectarr = TripList::where('trip_id','=',$this->id)->pluck('times', 'id')->toArray();
        $select_html = '';
        foreach ($selectarr as $key => $val) {
            $select_html .=  '<option value="'.$key.'">'.$val.'</option>';
        }
        return '
<a data-toggle="modal" data-target="#triplists-modal' .$this->id .'" data-id=' .$this->id .'><i class="fa fa-eye"></i></a>


<div class="modal fade" id="triplists-modal' .$this->id .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel' .$this->id .'">' . trans("admin::lang.filter") .'</h4>
            </div>
                
                    <div class="modal-body">
                        <div class="form">

                              <div class="form-group">
            <select class="form-control-select' .$this->id .'" style="width: 100%;" id="form-control-select' .$this->id .'">
                    '. $select_html .'
            </select>
                             </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                  
                        <button type="edit" class="btn btn-primary edit' .$this->id .' pull-left" >修改信息</button>
                        <button type="order" class="btn btn-primary order' .$this->id .' ">查看订单</button>

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