<?php

/**
 * [total_warga_rt description]
 * @param  [type] $rt [description]
 * @return [type]     [description]
 */
function get_submission_status($id)
{
    if($id !== NULL ){
        $keterangan=\App\Models\Masters\MasterSubmissionStatuses::where('id','=', $id)->first();
        $data=$keterangan->name;
    }else{
        $data='';
    }
    
    return $data;
}



function format_tanggal($id)
{
    if($id !== NULL ){
        $tanggal=date('d-M-Y',strtotime($id));
    }else{
        $tanggal='';
    }
    
    return $tanggal;
}

function format_nominal($id)
{
   $nominal=number_format($id,2,',','.');
    return $nominal;
}


?>