@include('admin.layouts.header')
@include('admin.layouts.aside')
<div id="content" class="app-content" role="main">
   <div class="app-content-body ">
      <div class="hbox hbox-auto-xs hbox-auto-sm">
         <div class="col">
            <!-- main header -->
            <div class="bg-light lter b-b wrapper-md">
               <div class="row">
                  <div class="col-sm-12 col-xs-12">
                     <h1 class="m-n h3">Review order</h1>
                  </div>
                  <!-- sreeram -->
               </div>
            </div>
            <!-- / main header -->
            <!-- main content -->
            <div class="wrapper-md ">
               <!--Dashboard-thankyou-section-open -->   
               <!--Dashboard-thankyou-section-close --> 
               <!-- / stats -->
               <!-- content -->
               <div class="row">
                  <div class="col-md-12">
                     <div class="mw-650 mr-auto">
                        <div class="region region-content">
                           <div id="block-system-main" class="block block-system clearfix">
                              <form action="{{route('review_post',$query->user_id)}}" method="post" id="commerce-checkout-form-review" accept-charset="UTF-8">
                                 <div class="from-panel">
                                    @csrf 
                                    <div class="checkout-help">
                                       Review your order before continuing.
                                    </div>
                                    <div class="checkout_review form-wrapper" id="edit-checkout-review">
                                       <table class="checkout-review table">
                                          <tbody>
                                             <tr class="pane-title odd cart-contents-title odd">
                                                <td colspan="2">Payment Details</td>
                                             </tr>
                                             <tr class="pane-data even cart-contents-data even">
                                                <td colspan="2" class="pane-data-full">
                                                   <div class="view view-commerce-cart-summary view-id-commerce_cart_summary view-display-id-default view-dom-id-72d0efcc3660259525f0e0641773283a">
                                                      <div class="view-content">
                                                         <div class="panel panel-default">
                                                            <div class="table-responsive">
                                                               <table class="views-table cols-3 table">
                                                                  <thead>
                                                                     <tr>
                                                                        <th class="views-field views-field-line-item-title">
                                                                           Title              
                                                                        </th>
                                                                        <th class="views-field views-field-quantity">
                                                                           Quantity              
                                                                        </th>
                                                                        <th class="views-field views-field-commerce-total views-align-right">
                                                                           Price              
                                                                        </th>
                                                                     </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                     <tr class="odd views-row-first views-row-last">
                                                                        <td class="views-field views-field-line-item-title">
                                                                           {{$query->package}}            
                                                                        </td>
                                                                        <td class="views-field views-field-quantity">
                                                                           1.00              
                                                                        </td>
                                                                        <td class="views-field views-field-commerce-total views-align-right price">
                                                                          {{$query->fees}}              
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="view-footer">
                                                         <div class="commerce-order-handler-area-order-total">
                                                            <div class="field field-name-commerce-order-total field-type-commerce-price field-label-hidden">
                                                               <div class="field-items">
                                                                  <div class="field-item even">
                                                                     <table class="commerce-price-formatted-components table">
                                                                        <tbody>
                                                                           <tr class="component-type-commerce-price-formatted-amount odd">
                                                                              <td class="component-title">Order total</td>
                                                                              <td class="component-total">{{$query->fees}}</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <fieldset class="afl_enrolment_details_review form-wrapper" id="edit-afl-enrolment-details-review">
                                       <legend><span class="fieldset-legend">Enrolment Details</span></legend>
                                       <div class="fieldset-wrapper">
                                          <div class="table-responsive">
                                             <table class="table">
                                                <tbody>
                                                   <tr class="odd">
                                                      <td>First name :</td>
                                                      <td>{{$query->first_name}}</td>
                                                   </tr>
                                                   <tr class="even">
                                                      <td>Surname :</td>
                                                      <td>{{$query->sur_name}}</td>
                                                   </tr>
                                                   <tr class="odd">
                                                      <td>Username :</td>
                                                      <td>{{$query->name}}</td>
                                                   </tr>
                                                   <tr class="even">
                                                      <td>Mail :</td>
                                                      <td>{{$query->email}}</td>
                                                   </tr>
                                                   <tr class="odd">
                                                      <td>Sponsor :</td>
                                                      <td>{{$query->sponsor}}</td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </fieldset>
                                    <fieldset class="commerce_payment form-wrapper" id="edit-commerce-payment">
                                       <legend><span class="fieldset-legend">Payment</span></legend>
                                       <div class="fieldset-wrapper">
                                          <div id="edit-commerce-payment-payment-method" class="form-radios">
                                             <div class="form-item clearfix form-type-radio form-item-commerce-payment-payment-method radio active-payment">
                                                <label class="i-checks"><input type="radio" id="edit-commerce-payment-payment-method-ewallet-paymentcommerce-payment-ewallet-payment" name="ewallet_payment" value="{{$ewallet_total}}" class="form-radio radio ajax-processed" checked=""><i></i></label>  <label class="option" for="edit-commerce-payment-payment-method-ewallet-paymentcommerce-payment-ewallet-payment"><i class="fa fa-money" aria-hidden="true"></i>E-wallet </label>
                                             </div>
                                             <div style="visibility: hidden;" class="form-item clearfix form-type-radio form-item-commerce-payment-payment-method radio">
                                                <label class="i-checks"><input type="radio" id="edit-commerce-payment-payment-method-epin-paymentcommerce-payment-epin-payment" name="commerce_payment[payment_method]" value="epin_payment|commerce_payment_epin_payment" class="form-radio radio ajax-processed"><i></i></label>  <label class="option" for="edit-commerce-payment-payment-method-epin-paymentcommerce-payment-epin-payment"><i class="fa fa-key" aria-hidden="true"></i>E-pin </label>
                                             </div>
                                          </div>
                                          @if(!empty($ewallet_total > 0))
                                          <div id="payment-details">
                                             You have {{$ewallet_total}} USD in your E-wallet to proceed with the payment. Please continue to next step to complete the payment.
                                             If you want to credit more in your Ewallet, You can transfer amount in the account no. given below.
                                             <input type="hidden" name="total_fees" value="{{$query->fees}}">
                                             <input type="hidden" name="package_id" value="{{$query->package_id}}">
                                             <input type="hidden" name="ewallet" value="1">
                                          </div>
                                          @else
                                          <div id="payment-details">
                                             You have not enough balance to proceed further.
                                             You have {{$ewallet_total}} USD in your E-wallet to proceed with the payment. Please continue to next step to complete the payment.
                                             If you want to credit in your Ewallet, You can transfer amount in the account no. given below.
                                             <input type="hidden" name="commerce_payment[payment_details][dummy]" value="dummy">
                                          </div>
                                          @endif
                                       </div>
                                    </fieldset>
                                    <fieldset class="checkout-buttons form-wrapper" id="edit-buttons">
                                       <div class="fieldset-wrapper"><input class="checkout-continue form-submit btn btn-default btn-primary checkout-processed" type="submit" id="edit-continue" name="op" value="Continue to next step"><span class="checkout-processing element-invisible"></span><span class="button-operator"></span></div>
                                    </fieldset>
                                 </div>
                              </form>
                           </div>
                           <!-- /.block -->
                        </div>
                     </div>
                  </div>
               </div>
               <!-- / content -->
            </div>
            <!-- / main content -->
         </div>
      </div>
   </div>
</div>
@include('admin.layouts.footer')