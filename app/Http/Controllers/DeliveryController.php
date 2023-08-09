<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;


class DeliveryController extends Controller
{
    //
    public function add_delivery(){
        $city = City::orderby('matp','asc')->get();
        return view('admin.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                $output .= '<option>-----Quận Huyện----- </option>';
                foreach($select_province as $key=>$province){
                    $output .= '<option value="'.$province->maqh.'">'.$province->name.' </option>';
                }
            }else{
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output .= '<option>-----Xã Phường Thị Trấn-----</option>';
                foreach($select_wards as $key=>$wards){
                    $output .= '<option value="'.$wards->xaid.'">'.$wards->name.' </option>';
                }
            }
        }
        echo $output;

    }
    public function select_feeship(){
        $feeship = Fee::orderby('fee_id','DESC')->get();
        $output ='';
        $output .= ' <div>
        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Thành Phố</th>
            <th scope="col">Quận, huyện</th>
            <th scope="col">Xã,Phường</th>
            <th scope="col">Phí Ship</th>
          </tr>
        </thead>
        <tbody>';
        foreach($feeship as $key=>$val){
            $output.='
          <tr>
            <th scope="row">'.$val->City->name.'</th>
            <td>'.$val->Province->name.'</td>
            <td>'.$val->Wards->name.'</td>
            <td contenteditable class=" fee_feeship_edit " data-feeship_id='.$val->fee_id.'>'.$val->fee_ship.'</td>
          </tr>';
        }
        $output.='
        </tbody>
      </table>
      </div>';
      echo $output;

    }
    public function update_feeship(Request $request){
        $data = $request->all();
        $fee_ship = Fee::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->fee_ship = $fee_value;
        $fee_ship->save();

    }
    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new Fee();
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_matp  = $data['city'];
        $fee_ship->fee_maxaptt  = $data['wards'];
        $fee_ship->fee_ship = $data['fee_ship'];
        $fee_ship->save();
    }

}
