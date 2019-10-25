<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth Routes Start
Route::get('admin/login','Admin\Auth\AuthController@admin_login')->name('admin_login');
Route::post('admin/validating-credentials','Admin\Auth\AuthController@validating_credentials')->name('validating_credentials');
Route::any('admin/logout','Admin\Auth\AuthController@admin_logout')->name('admin_logout');
//Auth Routes End

//Members Routes Start
Route::get('admin/all-members','Admin\Members\MembersController@index')->name('all_members');
Route::get('admin/block-members','Admin\Members\MembersController@block_members')->name('block_members');
Route::get('admin/unverified-members','Admin\Members\MembersController@unverified_members')->name('unverified_members');
Route::get('admin/add-member/{parent?}/{position?}','Admin\Members\MembersController@add')->name('add-member');
Route::post('admin/insert-member','Admin\Members\MembersController@insert')->name('insert_member');
Route::get('admin/edit-member/{id}','Admin\Members\MembersController@edit')->name('edit_member');
Route::post('admin/update-member/{id}','Admin\Members\MembersController@update')->name('update_member');
Route::get('admin/upgrade-package','Admin\Members\MembersController@upgrade_package')->name('upgrade_package');
Route::any('admin/update-user-package/{id}','Admin\Members\MembersController@upgrade_user_package')->name('upgrade_user_package');
Route::get('admin/search-members','Admin\Members\MembersController@search_members')->name('search_members');
Route::get('admin/search-block-members','Admin\Members\MembersController@search_block_members')->name('search_block_members');
Route::get('admin/search-unverify-members','Admin\Members\MembersController@search_unverified_members')->name('search_unverified_members');
Route::get('admin/genealogy-tree/','Admin\Members\MembersController@genealogy_tree')->name('tree');

Route::get('admin/referal-members','Admin\Members\MembersController@referal_members')->name('referal_members');
Route::get('admin/get-user','Admin\Members\MembersController@get_referal_user');
//all user which are on left and right leg
Route::get('admin/member/network-explorer','Admin\Members\MembersController@network_explorer')->name('network_explorer');
Route::get('admin/member/network-explorer-tree','Admin\Members\MembersController@network_explorer_tree');
// all users which are on left leg
Route::get('admin/member/network-explorer-left','Admin\Members\MembersController@network_explorer_left_view')->name('network_explorer_left');
Route::get('admin/member/network-explorer-left-tree','Admin\Members\MembersController@network_explorer_left');
// all users which are on right leg
Route::get('admin/members/network-explorer-right','Admin\Members\MembersController@network_explorer_right_view')->name('network_explorer_right');
Route::get('admin/members/network-explorer-right-tree','Admin\Members\MembersController@network_explorer_right');
Route::get('admin/members/matching-bonus-members','Admin\Members\MembersController@matching_bonus_members')->name('matching_bonus_members');


// Route::get('search-members-by-username','Admin\Members\MembersController@search_members_by_username');
//Member Routes End

//Order Routes Start
Route::get('admin/checkout/{id}','Admin\Members\MembersController@checkout_get')->name('checkout_get');
Route::post('admin/checkout/user/{id}','Admin\Members\MembersController@checkout_post')->name('checkout_post');
Route::get('admin/review/{id}','Admin\Members\MembersController@review_get')->name('review');
Route::post('admin/checkout/review/{id}','Admin\Members\MembersController@review_post')->name('review_post');
Route::get('admin/enrolment-completed/{id}','Admin\Members\MembersController@enrolment_complete')->name('enrolment_complete');
//Order Routes End

//Packages Routes Start
Route::get('admin/manage-packages','Admin\Packages\PackagesController@index')->name('manage_packages');
Route::get('admin/add-package','Admin\Packages\PackagesController@add')->name('add_package');
Route::post('admin/insert-package','Admin\Packages\PackagesController@insert')->name('insert_package');
Route::get('admin/edit-package/{id}','Admin\Packages\PackagesController@edit')->name('edit_package');
Route::post('admin/update-package/{id}','Admin\Packages\PackagesController@update')->name('update_package');
Route::post('admin/delete-package/{id}','Admin\Packages\PackagesController@delete')->name('delete_package');
Route::get('admin/search/','Admin\Packages\PackagesController@filter_packages')->name('filter_packages');
//Packages Routes End

//Settings Routes Start
	//Compensations Routes Start
Route::get('admin/compensation-settings','Admin\Settings\CompensationsController@index')->name('compensation_settings');
Route::post('admin/ajax-update-status/{id}','Admin\Settings\CompensationsController@ajax_update_status');
Route::get('admin/compensation-settings/{slug}','Admin\Settings\CompensationsController@package_bonus_config')->name('binary_package_bonus_config');
Route::post('admin/compensation-settings/{slug}','Admin\Settings\CompensationsController@package_bonus_config_update')->name('package_bonus_config_update');
Route::get('admin/packages-plan-configuration','Admin\Settings\CompensationsController@package_plan_config')->name('package_plan_config');
Route::post('admin/packages-plan-configuration/insert','Admin\Settings\CompensationsController@package_plan_config_insert')->name('package_plan_config_insert');
Route::get('admin/genealogy-config','Admin\Settings\CompensationsController@package_tree_config')->name('package_tree_config');
Route::post('admin/genealogy-config/insert','Admin\Settings\CompensationsController@package_tree_config_update')->name('package_tree_config_update');
Route::get('admin/system-config','Admin\Settings\CompensationsController@system_config')->name('system_config');
Route::post('admin/system-config/update','Admin\Settings\CompensationsController@system_config_update')->name('system_config_update');
Route::get('admin/rank-config','Admin\Settings\CompensationsController@rank_config')->name('rank_config');
Route::post('admin/rank-config/update','Admin\Settings\CompensationsController@rank_config_update')->name('rank_config_update');


	//Compensations Routes End
	//User Settings Routes Start
Route::get('admin/user/profile/{name}','Admin\Settings\SettingsController@profile')->name('user_profile');
Route::get('admin/user/edit-cover-image/{id}','Admin\Settings\SettingsController@edit_cover_image')->name('edit_cover_image');
Route::post('admin/user/update-cover-image/{id}','Admin\Settings\SettingsController@update_cover_image')->name('update_cover_image');
Route::get('admin/user/edit-profile-image/{id}','Admin\Settings\SettingsController@edit_profile_image')->name('edit_profile_image');
Route::post('admin/user/update-profile-image/{id}','Admin\Settings\SettingsController@update_profile_image')->name('update_profile_image');
Route::get('admin/user/edit-profile/auth','Admin\Settings\SettingsController@profile_login')->name('profile_login');
Route::get('admin/user/edit-profile/{id}','Admin\Settings\SettingsController@edit_profile')->name('edit_profile');
Route::post('admin/user/edit-profile-auth/','Admin\Settings\SettingsController@create_profile_password')->name('create_profile_password');
Route::post('admin/user/edit-profile/validate-credentials','Admin\Settings\SettingsController@validate_credentials')->name('validate_profile_credentials');
Route::post('admin/user/update-profile/{id}','Admin\Settings\SettingsController@update_profile')->name('update_profile');
Route::get('admin/ewallet-settings','Admin\Settings\SettingsController@ewallet_settings')->name('ewallet_settings');
Route::post('admin/ewallet-settings/update','Admin\Settings\SettingsController@ewallet_settings_update')->name('ewallet_settings_update');





	//User Settings Routes End
//Settings Routes End

//Advertisements Routes Start
//Promotional Banners Routes Start
Route::get('admin/advertisement/banners','Admin\Advertisements\AdvertisementController@banners')->name('banners');
Route::get('admin/advertisement/banners-160x600','Admin\Advertisements\AdvertisementController@banners_160x600')->name('banners_160x600');
Route::get('admin/advertisement/banners-300x250','Admin\Advertisements\AdvertisementController@banners_300x250')->name('banners_300x250');
Route::get('admin/advertisement/banners-468x60','Admin\Advertisements\AdvertisementController@banners_468x60')->name('banners_468x60');
Route::get('admin/advertisement/banners-728x90','Admin\Advertisements\AdvertisementController@banners_728x90')->name('banners_728x90');
Route::get('admin/advertisement/banners-create','Admin\Advertisements\AdvertisementController@banners_create')->name('banners_create');
Route::post('admin/advertisement/banners-insert','Admin\Advertisements\AdvertisementController@banners_insert')->name('banners_insert');
Route::get('admin/advertisement/{id}/banners-edit','Admin\Advertisements\AdvertisementController@banners_edit')->name('banners_edit');
Route::post('admin/advertisement/{id}/banners-update','Admin\Advertisements\AdvertisementController@banners_update')->name('banners_update');
// Route::post('admin/advertisement/ajax-image-upload','Admin\Advertisements\AdvertisementController@ajax_image_upload')->name('ajax_image_upload');
//Promotional Banners Routes End
//Advertisements Routes End

//Support Routes Start
Route::get('admin/all-support/','Admin\Support\SupportController@index')->name('all_supports');
Route::get('admin/support/add','Admin\Support\SupportController@add_support')->name('support_add');
Route::post('admin/support/insert','Admin\Support\SupportController@insert_support')->name('support_insert');
Route::get('admin/support/{id}/edit','Admin\Support\SupportController@edit_support')->name('edit_support');
Route::post('admin/support/{id}/update','Admin\Support\SupportController@update_support')->name('update_support');

Route::get('admin/support/{id}/view','Admin\Support\SupportController@support_details')->name('support_details');
Route::any('admin/support/view/{id}/close','Admin\Support\SupportController@mark_closed')->name('mark_closed');
Route::any('admin/support/view/{id}/completed','Admin\Support\SupportController@mark_completed')->name('mark_completed');
Route::any('admin/support/{id}/delete','Admin\Support\SupportController@delete_support')->name('delete_support');
Route::get('admin/support/search','Admin\Support\SupportController@filter_support')->name('filter_support');
//Support Routes End

//Support Comments Routes Start
Route::post('admin/{support_id}/support-comment-insert','Admin\Support\SupportController@insert_support_comment')->name('insert_support_comment');
Route::get('admin/support-comment/{id}/edit/destination/support/view/{support_id}','Admin\Support\SupportController@edit_support_comment')->name('edit_support_comment');
Route::post('admin/support-comment/{id}/update/destination/support/view/{support_id}','Admin\Support\SupportController@update_support_comment')->name('update_support_comment');
Route::any('admin/{id}/support-comment-delete','Admin\Support\SupportController@delete_support_comment')->name('delete_support_comment');

//Support Comments Routes End

//Ewallet Routes Start
Route::get('admin/ewallet-summary','Admin\Ewallet\EwalletController@index')->name('ewallet_summary');
Route::get('admin/ewallet-transactions','Admin\Ewallet\EwalletController@all_transactions')->name('all_transactions');
Route::get('admin/income-history','Admin\Ewallet\EwalletController@earning_inward_transactions')->name('earning_inward_transactions');
Route::get('admin/expenses-history','Admin\Ewallet\EwalletController@withdraw_outward_transactions')->name('withdraw_outward_transactions');

Route::post('admin/create-transaction-password','Admin\Ewallet\EwalletController@create_transaction_password')->name('create_transaction_password');
Route::get('admin/initiate-fund-transfer','Admin\Ewallet\EwalletController@transfer_funds')->name('transfer_funds');
Route::post('admin/confirm-transaction','Admin\Ewallet\EwalletController@confirm_transfer_fund')->name('confirm_transfer_fund');
Route::post('admin/do-transaction','Admin\Ewallet\EwalletController@do_transfer_fund')->name('do_transfer_fund');
Route::get('admin/capping','Admin\Ewallet\EwalletController@capping_transactions');
Route::get('admin/matching-bonus','Admin\Ewallet\EwalletController@matching_bonus')->name('matching_bonus');
Route::get('admin/payment-methods','Admin\Ewallet\EwalletController@payment_methods')->name('payment_methods');
Route::get('admin/payment-methods/{slug}','Admin\Ewallet\EwalletController@payment_ewallet_address')->name('payment_ewallet_address');
Route::post('admin/payment-methods/create-wallet-address/{slug}','Admin\Ewallet\EwalletController@create_ewallet_address')->name('create_ewallet_address');
// Route::post('/admin/payment-methods/save-payment-methods','Admin\Ewallet\EwalletController@save_payment_methods')->name('save_payment_methods');
Route::get('admin/withdraw-fund-ewallet','Admin\Ewallet\EwalletController@withdraw_funds_view')->name('withdraw_funds_view');
Route::post('admin/withdraw-fund-ewallet-create','Admin\Ewallet\EwalletController@do_withdraw_fund')->name('do_withdraw_fund');

Route::get('admin/my-withdrawal-requests','Admin\Ewallet\EwalletController@my_active_withdrawal_request')->name('my_active_withdrawal_request');
Route::get('admin/my-withdrawal-requests/processed','Admin\Ewallet\EwalletController@my_processed_withdrawal_request')->name('my_processed_withdrawal_request');
Route::get('admin/my-withdrawal-requests/paid','Admin\Ewallet\EwalletController@my_paid_withdrawal_request')->name('my_paid_withdrawal_request');
Route::get('admin/my-withdrawal-requests/cancelled','Admin\Ewallet\EwalletController@my_rejected_withdrawal_request')->name('my_rejected_withdrawal_request');
Route::post('admin/withdrawal-request/update/cancelled','Admin\Ewallet\EwalletController@cancel_my_withdrawal_request')->name('cancel_my_withdrawal_request');
Route::get('admin/withdrawal-requests/waiting','Admin\Ewallet\EwalletController@withdraw_waiting_requests')->name('withdraw_waiting_requests');
Route::get('admin/withdrawal-requests/processed','Admin\Ewallet\EwalletController@withdraw_processed_requests')->name('withdraw_processed_requests');
Route::get('admin/withdrawal-requests/approved','Admin\Ewallet\EwalletController@withdraw_paid_requests')->name('withdraw_paid_requests');
Route::get('admin/withdrawal-requests/rejected','Admin\Ewallet\EwalletController@withdraw_rejected_requests')->name('withdraw_rejected_requests');
Route::post('admin/withdrawal-requests/update-status-approved-rejected/','Admin\Ewallet\EwalletController@approve_reject_withdrawal_status')->name('approve_reject_withdrawal_status');
Route::post('admin/withdrawal-requests/update-status-paid-cancelled/','Admin\Ewallet\EwalletController@markpaid_paylater_status')->name('markpaid_paylater_status');
Route::get('admin/get-referee-user','Admin\Ewallet\EwalletController@get_referal_user_ewallet')->name('get_referal_user_ewallet');
Route::get('admin/fund-debit','Admin\Ewallet\EwalletController@debit_fund')->name('debit_fund');
Route::post('admin/do-fund-debit','Admin\Ewallet\EwalletController@do_debit_fund')->name('do_debit_fund');
Route::get('admin/all-commissions','Admin\Ewallet\EwalletController@all_commissions')->name('all_commissions');

//Ewallet Routes End

//Ecommerce Routes Start
	//Categories Routes Start
Route::get('ecommerce/categories','Admin\Ecommerce\CategoriesController@index')->name('manage_categories');
Route::get('ecommerce/categories/add','Admin\Ecommerce\CategoriesController@add')->name('add_categories');
Route::post('ecommerce/categories/insert','Admin\Ecommerce\CategoriesController@insert')->name('insert_categories');
Route::get('ecommerce/categories/edit/{id}','Admin\Ecommerce\CategoriesController@edit')->name('edit_categories');
Route::post('ecommerce/categories/update/{id}','Admin\Ecommerce\CategoriesController@update')->name('update_categories');
Route::post('ecommerce/categories/delete/{id}','Admin\Ecommerce\CategoriesController@delete')->name('delete_categories');
	//Categories Routes End
//Ecommerce Routes End

//Notifications Controller Start
Route::get('admin/notifications','Admin\Notifications\NotificationsController@notifications');
Route::get('admin/all-notifications','Admin\Notifications\NotificationsController@all_notifications')->name('all_notifications');
//Notifications Controller End

//Reports Routes Start
Route::get('admin/reports/member-rank-history','Admin\Reports\ReportsController@ranks_history')->name('ranks_history');
Route::get('admin/reports/rank-history','Admin\Reports\ReportsController@self_ranks_history')->name('self_ranks_history');
Route::get('admin/reports/members-package-expiry','Admin\Reports\ReportsController@package_expiries')->name('package_expiries');
//Reports Routes End

//Histoty Routes Start
Route::get('admin/hisory/members-package-upgrade','Admin\History\HistoryController@package_upgrades')->name('package_upgrades');
//Histoty Routes Start

//Exports Routes Start
Route::get('admin/exports/waiting-withdrawal-requests','Admin\Exports\ExportsController@withdrawal_waiting_export')->name('withdrawal_waiting_export');
Route::get('admin/exports/processed-withdrawal-requests','Admin\Exports\ExportsController@withdrawal_processed_export')->name('withdrawal_processed_export');
Route::get('admin/exports/approved-withdrawal-requests','Admin\Exports\ExportsController@withdrawal_approved_export')->name('withdrawal_approved_export');
Route::get('admin/exports/rejected-withdrawal-requests','Admin\Exports\ExportsController@withdrawal_rejected_export')->name('withdrawal_rejected_export');
Route::get('admin/exports/all-transactions','Admin\Exports\ExportsController@all_transactions_export')->name('all_transactions_export');
Route::get('admin/exports/all-members','Admin\Exports\ExportsController@all_members_export')->name('all_members_export');

//Exports Routes End
Route::get('/','DashboardController@index')->name('index');
Route::get('/{id}/{package_id}','DashboardController@upgrade_front_package')->name('upgrade_front_package');
Route::get('/downline-chart','DashboardController@ajax_downlines_chart');
Route::get('/test-tree','Admin\Members\MembersController@test_tree');



