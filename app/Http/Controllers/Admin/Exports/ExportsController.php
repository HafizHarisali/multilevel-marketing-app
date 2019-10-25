<?php
namespace App\Http\Controllers\Admin\Exports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;
use App\Exports\WithdrawalWaitingExport;
use App\Exports\WithdrawalReadyForPaymentExport;
use App\Exports\WithdrawalRejectedExport;
use App\Exports\WithdrawalApprovedExport;
use App\Exports\AllTransactionsExport;
use App\Exports\AllMembersExport;

use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller{
	public function withdrawal_waiting_export(){
		return Excel::download(new WithdrawalWaitingExport, 'waiting-withdrawal-requests.csv');
	}

	public function withdrawal_processed_export(){
		return Excel::download(new WithdrawalWaitingExport, 'processed-withdrawal-requests.csv');
	}

	public function withdrawal_approved_export(){
		return Excel::download(new WithdrawalWaitingExport, 'approved-withdrawal-requests.csv');
	}

	public function withdrawal_rejected_export(){
		return Excel::download(new WithdrawalWaitingExport, 'rejected-withdrawal-requests.csv');
	}

	public function all_transactions_export(){
		return Excel::download(new AllTransactionsExport, 'all-transactions.csv');
	}

	public function all_members_export(){
		return Excel::download(new AllMembersExport, 'all-members.csv');
	}
}