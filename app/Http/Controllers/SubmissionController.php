<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Masters\MasterProductLoans;
use App\Models\Masters\MasterProductSavings;
use App\Models\Masters\MasterProductLoanKinds;
use App\Models\Masters\MasterProductLoanRules;
use App\Models\Masters\MasterIdentityTypes;
use App\Models\Masters\MasterTaxOptions;
use App\Models\Masters\MasterGenders;
use App\Models\Masters\MasterCompanies;
use App\Models\Masters\MasterBranches;
use App\Models\Masters\MasterBanks;
use App\Models\Masters\MasterEmployeeStatuses;
use App\Models\Masters\MasterApprovalStatuses;
use App\Models\Masters\MasterSubmissionKinds;
use Flash;
use DB;
use Response;

class SubmissionController extends Controller
{
    public function all($page = 0, $size = 10)
    {
        $skid = '';
        $stsid = '';
        $sdate = '';

        if (isset($_GET['skid']) || isset($_GET['stsid']) || isset($_GET['sdate'])) {
            $skid = $_GET['skid'];
            $stsid = $_GET['stsid'];
            $sdate = $_GET['sdate'];
        }
        //dd($skid."-".$stsid."-". $sdate);

        $data = $this->getAll($page, $size, $skid, $stsid, $sdate);
        //dd($data);
        // $data= $this->getAll($page,$size);
        $jenis_pengajuan = MasterSubmissionKinds::pluck('name', 'id')->prepend('Select Jenis Pengajuan', '')->toArray();
        $content = $data['content'];
        $pageable = $data['pageable'];
        $totalElements = $data['totalElements'];
        $totalPages = $data['totalPages'];
        $first = $data['first'];
        $last = $data['last'];
        $sort = $data['sort'];
        $numberOfElements = $data['numberOfElements'];
        $number = $data['number'];
        $empty = $data['empty'];

        return view('submission.mylist')
            ->with('jenis_pengajuan', $jenis_pengajuan)
            ->with('skid', $skid)
            ->with('stsid', $stsid)
            ->with('sdate', $sdate)
            ->with('content', $content)
            ->with('pageable', $pageable)
            ->with('totalElements', $totalElements)
            ->with('totalPages', $totalPages)
            ->with('first', $first)
            ->with('last', $last)
            ->with('sort', $sort)
            ->with('numberOfElements', $numberOfElements)
            ->with('number', $number)
            ->with('empty', $empty)
            ->with('page', $page)
            ->with('size', $size);
    }

    public function mysubmission($page = 0, $size = 10)
    {
        $skid = '';
        $stsid = '';
        $sdate = '';

        if (isset($_GET['skid']) || isset($_GET['stsid']) || isset($_GET['sdate'])) {
            $skid = $_GET['skid'];
            $stsid = $_GET['stsid'];
            $sdate = $_GET['sdate'];
        }


        $data = $this->getMySubmission($page, $size, $skid, $stsid, $sdate);

        // $data = $this->getMySubmission($page, $size);
        $jenis_pengajuan = MasterSubmissionKinds::pluck('name', 'id')->prepend('Select Jenis Pengajuan', '')->toArray();
        if (array_key_exists('error', $data)) {
            $res = $data['message'];
            Flash::error($res);
            $content = [];
            $pageable = [];
            $totalElements = 0;
            $totalPages = 0;
            $first = true;
            $last = false;
            $sort = false;
            $numberOfElements = 0;
            $number = 0;
            $empty = true;
            return view('submission.mylist')
                ->with('jenis_pengajuan', $jenis_pengajuan)
                ->with('skid', $skid)
                ->with('stsid', $stsid)
                ->with('sdate', $sdate)
                ->with('content', $content)
                ->with('jenis_pengajuan', $jenis_pengajuan)
                ->with('pageable', $pageable)
                ->with('totalElements', $totalElements)
                ->with('totalPages', $totalPages)
                ->with('first', $first)
                ->with('last', $last)
                ->with('sort', $sort)
                ->with('numberOfElements', $numberOfElements)
                ->with('number', $number)
                ->with('empty', $empty)
                ->with('page', $page)
                ->with('size', $size);
        } else {





            $content = $data['content'];
            $pageable = $data['pageable'];
            $totalElements = $data['totalElements'];
            $totalPages = $data['totalPages'];
            $first = $data['first'];
            $last = $data['last'];
            $sort = $data['sort'];
            $numberOfElements = $data['numberOfElements'];
            $number = $data['number'];
            $empty = $data['empty'];
            return view('submission.mylist')
                ->with('jenis_pengajuan', $jenis_pengajuan)
                ->with('skid', $skid)
                ->with('stsid', $stsid)
                ->with('sdate', $sdate)
                ->with('content', $content)
                ->with('jenis_pengajuan', $jenis_pengajuan)
                ->with('pageable', $pageable)
                ->with('totalElements', $totalElements)
                ->with('totalPages', $totalPages)
                ->with('first', $first)
                ->with('last', $last)
                ->with('sort', $sort)
                ->with('numberOfElements', $numberOfElements)
                ->with('number', $number)
                ->with('empty', $empty)
                ->with('page', $page)
                ->with('size', $size);
        }
    }

    public function detailsubmission($id)
    {
        $checkerStatus = MasterApprovalStatuses::pluck('name', 'id')->prepend('Select Approval', '')->toArray();

        $data = $this->getDetailSubmission($id);
        if (array_key_exists('error', $data)) {
            $res = $data['message'];
            Flash::error($res);
            return back()
                ->withInput();
        } 
        //dd($data);
        $submissionId = $data['submissionId'];
        $submissionKindId = $data['submissionKindId'];
        $submissionKindDescription = $data['submissionKindDescription'];
        $submissionCategoryId = $data['submissionCategoryId'];
        $submissionCategoryDescription = $data['submissionCategoryDescription'];
        $submittedUserId = $data['submittedUserId'];
        $submittedUserName = $data['submittedUserName'];
        $submissionDate = $data['submissionDate'];
        $submissionTime = $data['submissionTime'];
        $submissionStatusId = $data['submissionStatusId'];
        $submissionStatusDescription = $data['submissionStatusDescription'];
        $submissionApprovalCategoryId = $data['submissionApprovalCategoryId'];
        $submissionApprovalCategoryDescription = $data['submissionApprovalCategoryDescription'];
        $submissionReceivedNotificationStatusId = $data['submissionReceivedNotificationStatusId'];
        $submissionReceivedNotificationStatusDescription = $data['submissionReceivedNotificationStatusDescription'];
        $submissionApprovalNotificationStatusId = $data['submissionApprovalNotificationStatusId'];
        $submissionApprovalNotificationStatusDescription = $data['submissionApprovalNotificationStatusDescription'];
      
        //$memberinfo=$data['memberInformation'];

        // foreach($data=['memberInformation'] as $memberinfo) {
        //     $memberId=$memberinfo['memberId'];
        //     $nik=$memberinfo['nik'];
        //     $fullName=$data['fullName'];
        //     $mobilePhone=$memberinfo['mobilePhone'];
        //     $email=$memberinfo['email'];
        //     $companyName=$memberinfo['companyName'];
        //     $companyBranchName=$memberinfo['companyBranchName'];
        //     $employeeStatusDescription=$memberinfo['employeeStatusDescription'];

        // }
        $datapengajuan = $data['data'];



        return view('submission.detailsubmission')
            ->with('submissionId', $submissionId)
            ->with('submissionKindId', $submissionKindId)
            ->with('submissionKindDescription', $submissionKindDescription)
            ->with('submissionCategoryId', $submissionCategoryId)
            ->with('submissionCategoryDescription', $submissionCategoryDescription)
            ->with('submittedUserId', $submittedUserId)
            ->with('submittedUserName', $submittedUserName)
            ->with('submissionDate', $submissionDate)
            ->with('submissionTime', $submissionTime)
            ->with('submissionStatusId', $submissionStatusId)
            ->with('submissionStatusDescription', $submissionStatusDescription)
            ->with('submissionApprovalCategoryId', $submissionApprovalCategoryId)
            ->with('submissionApprovalCategoryDescription', $submissionApprovalCategoryDescription)
            ->with('submissionReceivedNotificationStatusId', $submissionReceivedNotificationStatusId)
            ->with('submissionReceivedNotificationStatusDescription', $submissionReceivedNotificationStatusDescription)
            ->with('submissionApprovalNotificationStatusId', $submissionApprovalNotificationStatusId)
            ->with('submissionApprovalNotificationStatusDescription', $submissionApprovalNotificationStatusDescription)
            //->with('memberinfo',$memberinfo)
            ->with('datapengajuan', $datapengajuan)
            ->with('checkerStatus', $checkerStatus);
    }


    public function getAll( $page, $size, $skid, $stsid, $sdate)
    {
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'submission/all', ['page' => $page, 'size' => $size,'skid'=>$skid,'stsid'=>$stsid,'sdate'=>$sdate])->json();


        return $response;
    }

    public function getMySubmission($page, $size)
    {
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'submission/mysubmission', ['page' => $page, 'size' => $size])->json();


        return $response;
    }

    public function getDetailSubmission($id)
    {
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'submission/detail/' . $id, [])->json();
        return $response;
    }

    public function getSaving($id)
    {

        $data = DB::table('data_savings')->where('member_id', $id)->get();
        $options = array();

        foreach ($data as $dt) {
            $options += array($dt->id => $dt->id . ' - ' . $dt->product_saving_id);
        }

        return Response::json($options);
    }

    public function getDeposito($id)
    {

        $data = DB::table('data_depositos')->where('member_id', $id)->get();
        $options = array();

        foreach ($data as $dt) {
            $options += array($dt->id => $dt->id . ' - ' . $dt->product_deposito_id);
        }

        return Response::json($options);
    }

    public function getLoan($id)
    {

        $data = DB::table('data_loans')->where('member_id', $id)->get();
        $options = array();
        $productloanid = "";
        $productloankind = "";
        foreach ($data as $dt) {
            $options += array($dt->id => $dt->id);
        }

        return Response::json($options);
    }



    public function getDetailLoan($id)
    {

        $data = DB::table('data_loans')->where('id', $id)->get();
        $options = array();
        $productloanid = "";
        $productloankind = "";
        foreach ($data as $dt) {
            $options += array('productLoanId' => $dt->product_loan_id, 'productLoanKindId' => $dt->product_loan_kind_id);
        }

        return Response::json($options);
    }


    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('sys_users')->select('member_id', 'full_name')->where('full_name', 'LIKE', '%$cari%')->get();

            return response()->json($data);
        }
    }

    public function transaksi()
    {
        $transactionkind = DB::table('master_transaction_kinds')->select('id', 'name')->where('input_method_id','M')->get();
        //$listjurnal = DB::table('master_transaction_journals')->select('id', 'name')->get();
        $listcoa = DB::table('master_coas')->select('id', 'coa_name','coa_position_id')->get();

        $transactioncategory = DB::table('master_transaction_categories')->select('id', 'name')->pluck('name', 'id')->prepend('Pilih Kategori', '')->toArray();
        
        return view('submission.transaksi')
            ->with('transactionkind', $transactionkind)
            ->with('listcoa', $listcoa)
            ->with('transactioncategory', $transactioncategory);
           
    }

    public function submitTransaksi(Request $request)
    {
        //dd($request->all());
        //$response = Http::withToken(session('access_token'))->get('http://localhost:8028/checker/mytasks?page='.$page.'&&size='.$size, [])->json();

        /*
        {
            "transactionCategoryId":"O",
            "transactionKindId":"TKD001",
            "transactionDate":"2021-01-01",
            "transactionAmount":"1000000",
            "transactionNote":"Test Transaksi",
            "isAmortized":"N",
            "amortizationPeriod":0,
            "latitude":"123",
            "longitude":"456" ,
            "details": [
                { "transactionJournalId":"TJD1001", "coaId":"1121100","debetAmount":0, "creditAmount":0, "coaPositionId":"Dr"},
                { "transactionJournalId":"TJD1001", "coaId":"2111000","debetAmount":0, "creditAmount":0, "coaPositionId":"Cr"},
                { "transactionJournalId":"TJD2001", "coaId":"5111200","debetAmount":0, "creditAmount":0, "coaPositionId":"Dr"},
                { "transactionJournalId":"TJD2001", "coaId":"2132000","debetAmount":0, "creditAmount":0, "coaPositionId":"Cr"}
            ]
            
        }
        */
        $isAmortize="";
        if($request->transactionKindId =="TK9999"){
            $isAmortize=$request['isAmortizeTextLainnya'];
            $jmlcoa=$request->jml_coa;
            $coaposition="";
            $amountAmor=0;
            $isAmountAmor="N";
            if($isAmortize=="Y"){
                    $nominaltrx=$request['transactionAmount'];
                    $period=$request['amortizationPeriodTextLainnya'];
                    $amountAmor=$nominaltrx/$period;
            }

            //dd($amountAmor);
            for ($i=0; $i < $jmlcoa; $i++) { 
                $debet_amount=number_format((float)$request['debet_'.$i],"2",".","");
                $credit_amount=number_format((float)$request['credit_'.$i],"2",".","");
                $amountAmor=number_format((float)$amountAmor,"2",".","");
               
                if($debet_amount == $amountAmor || $credit_amount == $amountAmor){
                    $isAmountAmor="Y";
                }
                if($request['debet_'.$i] == "0"){
                    $coaposition="Cr";
                }else{
                    $coaposition="Dr";
                }
                if($request['debet_'.$i]==""){

                }
                
                $details[]=[ "transactionJournalId"=>"TJ99999", "coaId"=>$request['coa_id_'.$i],"debetAmount"=>$request['debet_'.$i] , "creditAmount"=>$request["credit_".$i], "coaPositionId"=>$coaposition,"transactionDetailNote"=>$request["keterangan_jurnal_".$i],"isAmortizationAmount"=>$isAmountAmor];
            }
        }else{
            $isAmortize=$request['isAmortizeText'];
            if($isAmortize=='Y'){
                $details=[
                    [ "transactionJournalId"=>$request['jurnalIdVal'], "coaId"=>$request['CoaDbVal'],"debetAmount"=>$request["x1_".$request['jurnalIdVal']."_".$request["CoaDbVal"]."_debet"] , "creditAmount"=>$request["x1_".$request['jurnalIdVal']."_".$request["CoaDbVal"]."_credit"], "coaPositionId"=>"Dr"],
                    [ "transactionJournalId"=>$request['jurnalIdVal'], "coaId"=>$request['CoaCrVal'],"debetAmount"=>$request["x2_".$request['jurnalIdVal']."_".$request["CoaCrVal"]."_debet"], "creditAmount"=>$request["x2_".$request['jurnalIdVal']."_".$request["CoaCrVal"]."_credit"], "coaPositionId"=>"Cr"],
                    [ "transactionJournalId"=>$request['amortizationJurnalIdVal'], "coaId"=>$request['amortizationCoaDbVal'],"debetAmount"=>$request["x3_".$request['amortizationJurnalIdVal']."_".$request["amortizationCoaDbVal"]."_debet"], "creditAmount"=>$request["x3_".$request['amortizationJurnalIdVal']."_".$request["amortizationCoaDbVal"]."_credit"], "coaPositionId"=>"Dr"],
                    [ "transactionJournalId"=>$request['amortizationJurnalIdVal'], "coaId"=>$request['amortizationCoaCrVal'],"debetAmount"=>$request["x4_".$request['amortizationJurnalIdVal']."_".$request["amortizationCoaCrVal"]."_debet"], "creditAmount"=>$request["x4_".$request['amortizationJurnalIdVal']."_".$request["amortizationCoaCrVal"]."_credit"], "coaPositionId"=>"Cr"],
                ];
            }else{
                $details=[
                    [ "transactionJournalId"=>$request['jurnalIdVal'], "coaId"=>$request['CoaDbVal'],"debetAmount"=>$request["x1_".$request['jurnalIdVal']."_".$request["CoaDbVal"]."_debet"] , "creditAmount"=>$request["x1_".$request['jurnalIdVal']."_".$request["CoaDbVal"]."_credit"], "coaPositionId"=>"Dr"],
                    [ "transactionJournalId"=>$request['jurnalIdVal'], "coaId"=>$request['CoaCrVal'],"debetAmount"=>$request["x2_".$request['jurnalIdVal']."_".$request["CoaCrVal"]."_debet"], "creditAmount"=>$request["x2_".$request['jurnalIdVal']."_".$request["CoaCrVal"]."_credit"], "coaPositionId"=>"Cr"],
                ];
            
            }
        }
        
      
     
        $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/transaction/create', [
            'transactionCategoryId' => $request->transactionCategoryId,
            'transactionKindId' => $request->transactionKindId,
            'transactionDate' => $request->transactionDate,
            'transactionAmount' => $request->transactionAmount,
            'transactionNote' => $request->transactionNote,
            'isAmortized' => $isAmortize,
            'amortizationPeriod' => $request->amortizationPeriodText,
            'latitude' => 0,
            'longitude' => 0,
            'details' => $details,
            
        ])->json();
        //dd($response);
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            Flash::error($res);
            return back()
                ->withInput();
        } else {
            $res = $response['submissionStatusName'];
            Flash::success($res);
            return redirect(route('submission.all'));
        }
    }


    public function pinjaman()
    {
        $datamember = DB::table('data_members')->select('id', 'first_name', 'last_name')->get();
        $databank = DB::table('master_banks')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();
        $role=session('roles');
        if($role[0]['roleId']==10){
            $master_product_loans = MasterProductLoans::whereNotIn('id',['PL010','PL011'])->pluck('name', 'id')->prepend('Pilih Produk Pinjaman', '')->toArray();
        }else{
            $master_product_loans = MasterProductLoans::whereIn('id',['PL010','PL011'])->pluck('name', 'id')->prepend('Pilih Produk Pinjaman', '')->toArray();
        }
        
        $master_product_loan_kinds = MasterProductLoanKinds::pluck('name', 'id')->prepend('Pilih Jenis Pinjaman', '')->toArray();
        return view('submission.pinjaman')
            ->with('datamember', $datamember)
            ->with('databank', $databank)
            ->with('master_product_loans', $master_product_loans)
            ->with('master_product_loan_kinds', $master_product_loan_kinds);
    }

   


    public function submitPinjaman(Request $request)
    {
        //$response = Http::withToken(session('access_token'))->get('http://localhost:8028/checker/mytasks?page='.$page.'&&size='.$size, [])->json();


        if ($request->discontoDueDate == null) {
            $discontoDueDate = "";
        } else {
            $discontoDueDate = $request->discontoDueDate;
        }
        if ($request->electronicItemName == null) {
            $electronicItemName = "";
        } else {
            $electronicItemName = $request->electronicItemName;
        }
        if ($request->electronicItemType == null) {
            $electronicItemType = "";
        } else {
            $electronicItemType = $request->electronicItemType;
        }
        if ($request->electronicItemPrice == null) {
            $electronicItemPrice = 0;
        } else {
            $electronicItemPrice = $request->electronicItemPrice;
        }
        if ($request->educationKidName == null) {
            $educationKidName = "";
        } else {
            $educationKidName = $request->educationKidName;
        }

        if ($request->downPaymentAmount == null) {
            $downPaymentAmount = 0;
        } else {
            $downPaymentAmount = $request->downPaymentAmount;
        }

        if ($request->latitude == null) {
            $latitude = 0;
        } else {
            $latitude = $request->latitude;
        }

        if ($request->longitude == null) {
            $longitude = 0;
        } else {
            $longitude = $request->longitude;
        }



        // dd('memberId:'.$request->memberId.",<br>".
        // 'productLoanId:'.$request->productLoanId.",<br>".
        // 'productLoanKindId:'.$request->productLoanKindId.",<br>".
        // 'limitAmount:'.$request->limitAmount.",<br>".
        // 'tenor:'.$request->tenor.",<br>".
        // 'loanPurpose:'.$request->loanPurpose.",<br>".
        // 'disbursementBankId:'.$request->disbursementBankId.",<br>".
        // 'disbursementBankAccountNumber:'.$request->disbursementBankAccountNumber.",<br>".
        // 'discontoDueDate:'.$discontoDueDate.",<br>".
        // 'electronicItemName:'.$electronicItemName.",<br>".
        // 'electronicItemType:'.$electronicItemType.",<br>".
        // 'electronicItemPrice:'.$electronicItemPrice.",<br>".
        // 'educationKidName:'.$educationKidName.",<br>".
        // 'downPaymentAmount:'.$downPaymentAmount.",<br>".
        // 'latitude:'.$latitude.",<br>".
        // 'longitude:'.$longitude);
        $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/loan/open', [
            'memberId' => $request->memberId,
            'productLoanId' => $request->productLoanId,
            'productLoanKindId' => $request->productLoanKindId,
            'limitAmount' => $request->limitAmount,
            'tenor' => $request->tenor,
            'loanPurpose' => $request->loanPurpose,
            'disbursementBankId' => $request->disbursementBankId,
            'disbursementBankAccountNumber' => $request->disbursementBankAccountNumber,
            'discontoDueDate' => $discontoDueDate,
            'electronicItemName' => $electronicItemName,
            'electronicItemType' => $electronicItemType,
            'electronicItemPrice' => $electronicItemPrice,
            'educationKidName' => $educationKidName,
            'downPaymentAmount' => $downPaymentAmount,
            'note' => $request->note,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ])->json();
        //dd($response);
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            Flash::error($res);
            return back()
                ->withInput();
        } else {
            $res = $response['statusDescription'];
            Flash::success($res);
            return redirect(route('submission.all'));
        }
    }

    public function perubahanSimpanan()
    {
        $memberId = session('member_id');
        $memberName = '';
        $productSavingId = '';
        $productSavingDescription = '';
        $defaultAmount = '';
        
        $datamember = DB::table('data_members')->select('id', 'first_name', 'last_name')->get();

        $master_product_savings = MasterProductSavings::pluck('name', 'id')->prepend('Select Product Saving', '')->toArray();

        return view('submission.perubahansimpanan-anggota')
            ->with('datamember', $datamember)
            ->with('memberId', $memberId)
            ->with('memberName', $memberName)
            ->with('productSavingId', $productSavingId)
            ->with('productSavingDescription', $productSavingDescription)
            ->with('defaultAmount', $defaultAmount)
            ->with('master_product_savings', $master_product_savings);
    }

    public function getMembersaving(Request $request){
        $data = $request->all();
        //dd($data);
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'member/membersaving', ['mid' => $request->memberId, 'pid' => $request->productSavingId])->json();
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            return response()->json($res); 
        } else {
            
            /*$memberId = $response['memberId'];
            $memberName = $response['memberName'];
            $productSavingId = $response['productSavingId'];
            $productSavingDescription = $response['productSavingDescription'];
            $defaultAmount = $response['defaultAmount'];*/
           
            return response()->json($response); 

        }
    }

    public function getMembersavinglist(Request $request){
        $data = $request->all();
        //dd($data);
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'saving/membersaving', ['mid' => $request->memberId])->json();
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            return response()->json($res); 
        } else {
            return response()->json($response); 
        }
    }

    public function getMemberloanlist(Request $request){
        $data = $request->all();
        //dd($data);
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'loan/memberloan', ['mid' => $request->memberId])->json();
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            return response()->json($res); 
        } else {
            return response()->json($response); 
        }
    }

    public function getSimpluslist(Request $request){
        $data = $request->all();
        //dd($data);
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'deposito/membersimplus', ['mid' => $request->memberId])->json();
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            return response()->json($res); 
        } else {
            return response()->json($response); 
        }
    }

    public function getDetailLoans($id){
        
        //dd($data);
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'loan/detail/'.$id)->json();
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            return response()->json($res); 
        } else {
            return response()->json($response); 
        }
    }

    public function getMember(Request $request){
        $data = $request->all();
        //dd($data);
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'member/detail/'.$request->memberId)->json();
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            return response()->json($res); 
        } else {
            return response()->json($response); 
        }
    }

    public function getCoa($id){

       
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'master/transactionkinds/'.$id)->json();
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            return response()->json($res); 
        } else {
            return response()->json($response); 
        }
      
    }

    public function getJurnal($id){

       
        $response = Http::withToken(session('access_token'))->get(env('API_URL') . 'master/transactionjournals/'.$id)->json();
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            return response()->json($res); 
        } else {
            return response()->json($response); 
        }
      
    }

    public function getProductLoan($id){

        if($id=='PG'){
            $master_product_loans = MasterProductLoans::select('id','name')->whereIn('id',['PL010','PL011'])->get();
        }else{
            $master_product_loans = MasterProductLoans::select('id','name')->whereNotIn('id',['PL010','PL011'])->get();
        }
        return response()->json($master_product_loans); 
      
    }

    public function getProductLoanKindId($id){

        if($id == 'PL004' || $id == 'PL007'){
            $master_product_loan_kinds = MasterProductLoanKinds::select('id','name')->whereIn('id',['PLK007','PLK008','PLK009','PLK010','PLK011','PLK012','PLK013','PLK014'])->get();
        }else if($id == 'PL008'){
            $master_product_loan_kinds = MasterProductLoanKinds::select('id','name')->whereIn('id',['PLK002','PLK003','PLK004','PLK005','PLK006'])->get();
        }else{
            $master_product_loan_kinds = MasterProductLoanKinds::select('id','name')->whereIn('id',['PLK001'])->get();
        }

      
        return response()->json($master_product_loan_kinds); 
      
    }


    public function submitPerubahanSimpanan(Request $request)
    {
                $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/saving/change', [
                    'memberId' => $request->memberId,
                    'productSavingId' => $request->productSavingId,
                    'changeAmount' => $request->changeAmount,
                    'note' => $request->note,
                ])->json();
                dd($response);
                if (array_key_exists('error', $response)) {
                    $res = $response['message'];
                    Flash::error($res);
                    return back()
                        ->withInput();
                } else {
                    $res = $response['statusDescription'];
                    Flash::success($res);
                    return redirect(route('submission.all'));
                }
          
       
       
    }

    public function penarikanSimpanan()
    {

        $memberId = session('member_id');
        $memberName = '';
        $productSavingId = '';
        $productSavingDescription = '';
        $defaultAmount = '';

        $datamember = DB::table('data_members')->select('id', 'first_name', 'last_name')->get();
        $databank = DB::table('master_banks')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();

        return view('submission.penarikan_simpanan')
            ->with('datamember', $datamember)
            ->with('memberId', $memberId)
            ->with('databank', $databank);
    }

    public function submitPenarikanSimpanan(Request $request)
    {
        //dd($request->all());
        $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/saving/withdrawal', [
            'memberId' => $request->memberId,
            'savingId' => $request->savingId,
            'withdrawalAmount' => $request->withdrawalAmount,
            'transferredToBankId' => $request->transferredToBankId,
            'transferredToBankAccountNumber' => $request->transferredToBankAccountNumber,
            'note' => $request->note,
        ])->json();
        //dd($response);
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            Flash::error($res);
            return back()
                ->withInput();
        } else {
            $res = $response['statusDescription'];
            Flash::success($res);
            return redirect(route('submission.all'));
        }
    }

    public function pembukaanSimplus()
    {

        $memberId = session('member_id');
        $memberName = '';
        $productSavingId = '';
        $productSavingDescription = '';
        $defaultAmount = '';

        $datamember = DB::table('data_members')->select('id', 'first_name', 'last_name')->get();
        $produksimplus = DB::table('master_product_depositos')->select('id', 'name')->pluck('name', 'id')->prepend('Select Produk Simplus', '')->toArray();
        $rollover = DB::table('master_product_deposito_rollover_options')->select('id', 'name')->pluck('name', 'id')->prepend('Select Opsi ARO', '')->toArray();
        $databank = DB::table('master_banks')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();

        return view('submission.pembukaan_simpanan')
            ->with('datamember', $datamember)
            ->with('memberId', $memberId)
            ->with('databank', $databank)
            ->with('produksimplus', $produksimplus)
            ->with('rollover', $rollover);
    }

    public function submitPembukaanSimplus(Request $request)
    {
        $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/deposito/open', [

            'memberId' => $request->memberId,
            'productDepositoId' => $request->productDepositoId,
            'placementAmount' => $request->placementAmount,
            'tenor' => $request->tenor,
            'rolloverOptionId' => $request->rolloverOptionId,
            'note' => $request->note,
            'transferredFromBankId' => $request->transferredFromBankId,
            'transferredFromBankAccountNumber' => $request->transferredFromBankAccountNumber,
        ])->json();
        dd($response);
        // if (array_key_exists('error', $response)) {
        //     $res = $response['message'];
        //     Flash::error($res);
        //     return back()
        //         ->withInput();
        // } else {
        //     $res = $response['statusDescription'];
        //     Flash::success($res);
        //     return redirect(route('submission.all'));
        // }
    }

    public function breakSimplus()
    {

        $datamember = DB::table('data_members')->select('id', 'first_name', 'last_name')->get();
        $databank = DB::table('master_banks')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();

        return view('submission.break_simplus')
            ->with('datamember', $datamember)
            ->with('databank', $databank);
    }

    public function submitBreakSimplus(Request $request)
    {
        $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/deposito/break', [

            'memberId' => $request->memberId,
            'depositoId' => $request->depositoId,
            'note' => $request->note,
            'transferredToBankId' => $request->transferredToBankId,
            'transferredToBankAccountNumber' => $request->transferredToBankAccountNumber
        ])->json();
        //dd($response);
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            Flash::error($res);
            return back()
                ->withInput();
        } else {
            $res = $response['statusDescription'];
            Flash::success($res);
            return redirect(route('submission.all'));
        }
    }

    public function perubahanPinjaman()
    {

        $datamember = DB::table('data_members')->select('id', 'first_name', 'last_name')->get();
        $databank = DB::table('master_banks')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();
        $role=session('roles');
        if($role[0]['roleId']==10){
            $master_product_loans = MasterProductLoans::whereNotIn('id',['PL010','PL011'])->pluck('name', 'id')->prepend('Pilih Produk Pinjaman', '')->toArray();
        }else{
            $master_product_loans = MasterProductLoans::whereIn('id',['PL010','PL011'])->pluck('name', 'id')->prepend('Pilih Produk Pinjaman', '')->toArray();
        }
        
        $master_product_loan_kinds = MasterProductLoanKinds::pluck('name', 'id')->prepend('Pilih Jenis Pinjaman', '')->toArray();
        return view('submission.perubahan_pinjaman')
            ->with('role', $role)
            ->with('master_product_loans', $master_product_loans)
            ->with('master_product_loan_kinds', $master_product_loan_kinds)
            ->with('datamember', $datamember)
            ->with('databank', $databank);
    }

    public function submitPerubahanPinjaman(Request $request)
    {
        if ($request->discontoDueDate == null) {
            $discontoDueDate = "";
        } else {
            $discontoDueDate = $request->discontoDueDate;
        }
        if ($request->electronicItemName == null) {
            $electronicItemName = "";
        } else {
            $electronicItemName = $request->electronicItemName;
        }
        if ($request->electronicItemType == null) {
            $electronicItemType = "";
        } else {
            $electronicItemType = $request->electronicItemType;
        }
        if ($request->electronicItemPrice == null) {
            $electronicItemPrice = 0;
        } else {
            $electronicItemPrice = $request->electronicItemPrice;
        }
        if ($request->educationKidName == null) {
            $educationKidName = "";
        } else {
            $educationKidName = $request->educationKidName;
        }

        if ($request->downPaymentAmount == null) {
            $downPaymentAmount = 0;
        } else {
            $downPaymentAmount = $request->downPaymentAmount;
        }

        if ($request->latitude == null) {
            $latitude = 0;
        } else {
            $latitude = $request->latitude;
        }

        if ($request->longitude == null) {
            $longitude = 0;
        } else {
            $longitude = $request->longitude;
        }


        $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/loan/renewal', [
            'memberId' => $request->memberId,
            'loanId' => $request->loanId,
            'productLoanId' => $request->productLoanId,
            'productLoanKindId' => $request->productLoanKindId,
            'limitAmount' => $request->limitAmount,
            'tenor' => $request->tenor,
            'loanPurpose' => $request->loanPurpose,
            'disbursementBankId' => $request->disbursementBankId,
            'disbursementBankAccountNumber' => $request->disbursementBankAccountNumber,
            'discontoDueDate' => $discontoDueDate,
            'electronicItemName' => $electronicItemName,
            'electronicItemType' => $electronicItemType,
            'electronicItemPrice' => $electronicItemPrice,
            'educationKidName' => $educationKidName,
            'downPaymentAmount' => $downPaymentAmount,
            'note' => $request->note,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ])->json();
        //dd($response);
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            Flash::error($res);
            return back()
                ->withInput();
        } else {
            $res = $response['statusDescription'];
            Flash::success($res);
            return redirect(route('submission.all'));
        }
    }

    public function bayarManualAngsuran()
    {

        $datamember = DB::table('data_members')->select('id', 'first_name', 'last_name')->get();
        $databank = DB::table('master_banks')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();
        $repaymentMethodId = DB::table('master_repayment_methods')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();

        return view('submission.bayar_manual_angsuran')
            ->with('datamember', $datamember)
            ->with('databank', $databank)
            ->with('repaymentMethodId', $repaymentMethodId);
    }

    public function submitBayarManualAngsuran(Request $request)
    {
        $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/loan/repay', [

            'memberId' => $request->memberId,
            'loanId' => $request->loanId,
            'repaymentAmount' => $request->repaymentAmount,
            'repaymentMethodId' => $request->repaymentMethodId,
            'transferredFromBankId' => $request->transferredFromBankId,
            'transferredFromBankAccountNumber' => $request->transferredFromBankAccountNumber,
            'note' => $request->note,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ])->json();
        //dd($response);
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            Flash::error($res);
            return back()
                ->withInput();
        } else {
            $res = $response['statusDescription'];
            Flash::success($res);
            return redirect(route('submission.all'));
        }
    }

    public function pelunasanDipercepat()
    {

        $datamember = DB::table('data_members')->select('id', 'first_name', 'last_name')->get();
        $databank = DB::table('master_banks')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();
        $repaymentMethodId = DB::table('master_repayment_methods')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();

        return view('submission.pelunasan_dipercepat')
            ->with('datamember', $datamember)
            ->with('databank', $databank)
            ->with('repaymentMethodId', $repaymentMethodId);
    }

    public function submitPelunasanDipercepat(Request $request)
    {
        $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/loan/payoff', [

            'memberId' => $request->memberId,
            'loanId' => $request->loanId,
            'repaymentAmount' => $request->repaymentAmount,
            'repaymentMethodId' => $request->repaymentMethodId,
            'transferredFromBankId' => $request->transferredFromBankId,
            'transferredFromBankAccountNumber' => $request->transferredFromBankAccountNumber,
            'note' => $request->note,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ])->json();
        //dd($response);
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            Flash::error($res);
            return back()
                ->withInput();
        } else {
            $res = $response['statusDescription'];
            Flash::success($res);
            return redirect(route('submission.all'));
        }
    }

    public function pelunasanSebagian()
    {

        $datamember = DB::table('data_members')->select('id', 'first_name', 'last_name')->get();
        $databank = DB::table('master_banks')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();
        $repaymentMethodId = DB::table('master_repayment_methods')->select('id', 'name')->pluck('name', 'id')->prepend('Select Bank', '')->toArray();

        return view('submission.pelunasan_sebagian')
            ->with('datamember', $datamember)
            ->with('databank', $databank)
            ->with('repaymentMethodId', $repaymentMethodId);
    }

    public function submitPelunasanSebagian(Request $request)
    {
        $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/loan/halffastrepayment', [

            'memberId' => $request->memberId,
            'loanId' => $request->loanId,
            'repaymentAmount' => $request->repaymentAmount,
            'repaymentMethodId' => $request->repaymentMethodId,
            'transferredFromBankId' => $request->transferredFromBankId,
            'transferredFromBankAccountNumber' => $request->transferredFromBankAccountNumber,
            'note' => $request->note,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ])->json();
        //dd($response);
        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            Flash::error($res);
            return back()
                ->withInput();
        } else {
            $res = $response['statusDescription'];
            Flash::success($res);
            return redirect(route('sumbission.mysumbission'));
        }
    }

    public function register()
    {

        $master_identity_type = MasterIdentityTypes::pluck('name', 'id')->prepend('Select Identity Types', '')->toArray();
        $master_tax_option = MasterTaxOptions::pluck('name', 'id')->prepend('Select Tax Option', '')->toArray();
        $master_genders = MasterGenders::pluck('name', 'id')->prepend('Select Genders', '')->toArray();
        $master_companies = MasterCompanies::pluck('name', 'id')->prepend('Select Companies', '')->toArray();
        $master_employee_statuses = MasterEmployeeStatuses::pluck('name', 'id')->prepend('Select Status', '')->toArray();
        $master_branches = MasterBranches::pluck('name', 'id')->prepend('Select Branch', '')->toArray();
        $master_banks = MasterBanks::pluck('name', 'id')->prepend('Select Bank', '')->toArray();
        return view('submission.register')
            ->with('master_identity_type', $master_identity_type)
            ->with('master_tax_option', $master_tax_option)
            ->with('master_genders', $master_genders)
            ->with('master_companies', $master_companies)
            ->with('master_branches', $master_branches)
            ->with('master_banks', $master_banks)
            ->with('master_employee_statuses', $master_employee_statuses);
    }

    public function submitRegister(Request $request)
    {



        $response = Http::withToken(session('access_token'))->post(env('API_URL') . 'submission/member/register', [
            'nik' => $request->nik,
            'firstName' => $request->firstName,
            'motherName' => $request->motherName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'memberTypeId' => 'MT05',
            'memberSectionId' => 'MS13',
            'memberPositionId' => 'MP12',
            'memberKindId' => 'AB',
            'idCardTypeId' => $request->idCardTypeId,
            'idCardNumber' => $request->idCardNumber,
            'birthPlace' => $request->birthPlace,
            'birthDate' => $request->birthDate,
            'taxOptionId' => $request->taxOptionId,
            'taxNumber' => $request->taxNumber,
            'mobilePhone' => $request->mobilePhone,
            'genderId' => $request->genderId,
            'companyId' => $request->companyId,
            'companyName' => $request->companyName,
            'companyBranchId' => $request->companyBranchId,
            'companyBranchName' => $request->companyBranchName,
            'employeeSection' => $request->employeeSection,
            'employeePosition' => $request->employeePosition,
            'employeeGrade' => $request->employeeGrade,
            'employeeStatusId' => $request->employeeStatusId,
            'employeeJoinDate' => $request->employeeJoinDate,
            'bankId' => $request->bankId,
            'bankAccountNumber' => $request->bankAccountNumber,
            'principalSaving' => $request->principalSaving,
            'mandatorySaving' => $request->mandatorySaving,
            'voluntarySaving' => $request->voluntarySaving,
            'securityQuestion' => $request->securityQuestion,
            'securityAnswer' => $request->securityAnswer,
            'roleId' => 10,

        ])->json();

        if (array_key_exists('error', $response)) {
            $res = $response['message'];
            Flash::error($res);
            //return redirect(route('submission.register'));
            return back()
                ->withInput();
        } else {

            $res = $response['statusDescription'];
            Flash::success($res);
            return redirect(route('sumbission.mysumbission'));
        }
    }

    public function getLimit(Request $request)
    {
        if ($request->ajax()) {
            //dd($request->productLoanId);

            $master_product_loan_rules = DB::table('master_product_loan_rules')
                ->where('product_id', $request->productLoanId)
                ->where('product_loan_kind_id', $request->productLoanKindId)
                ->get();

            if ($master_product_loan_rules->count() != 0) {
                $data = $master_product_loan_rules[0]->max_plafond;
            } else {
                $data = '0';
            }

            return Response::json($data);
        }
    }
}
