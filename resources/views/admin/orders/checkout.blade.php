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
                     <h1 class="m-n h3">Checkout</h1>
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
                              <form action="{{route('checkout_post',$query->user_id)}}" method="post" id="commerce-checkout-form-checkout" accept-charset="UTF-8">
                                 @csrf
                                 <div class="from-panel">
                                    <fieldset class="cart_contents form-wrapper" id="edit-cart-contents">
                                       <legend><span class="fieldset-legend">Payment Details</span></legend>
                                       <div class="fieldset-wrapper">
                                          <div class="view view-commerce-cart-summary view-id-commerce_cart_summary view-display-id-default view-dom-id-c8b84ad2ac49912d5e3a7509ff019618">
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
                                       </div>
                                    </fieldset>
                                    <fieldset class="afl_enrolment_details form-wrapper" id="edit-afl-enrolment-details">
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
                                    <fieldset class="customer_profile_billing form-wrapper" id="edit-customer-profile-billing">
                                       <legend><span class="fieldset-legend">Address of communication</span></legend>
                                       <div class="fieldset-wrapper">
                                          <div class="field-type-addressfield field-name-commerce-customer-address field-widget-addressfield-standard form-wrapper" id="edit-customer-profile-billing-commerce-customer-address">
                                             <div id="customer-profile-billing-commerce-customer-address-add-more-wrapper">
                                                <div id="addressfield-wrapper">
                                                   <div id="edit-customer-profile-billing-commerce-customer-address-und-0" class="form-wrapper">
                                                      <div class="street-block">
                                                         <div class="form-item clearfix form-type-textfield form-item-customer-profile-billing-commerce-customer-address-und-0-thoroughfare form-group">
                                                            <label for="edit-customer-profile-billing-commerce-customer-address-und-0-thoroughfare">Address 1 <span class="form-required" title="This field is required.">*</span></label>
                                                            <input class="thoroughfare form-text form-control input-lg-3 required" autocomplete="address-line1" type="text" id="edit-customer-profile-billing-commerce-customer-address-und-0-thoroughfare" name="address" value="{{old('address')}}" size="30" maxlength="255">
                                                         </div>
                                                      </div>
                                                      <div class="addressfield-container-inline locality-block country-PK">
                                                         <div class="form-item clearfix form-type-textfield form-item-customer-profile-billing-commerce-customer-address-und-0-locality form-group">
                                                            <label for="edit-customer-profile-billing-commerce-customer-address-und-0-locality">City <span class="form-required" title="This field is required.">*</span></label>
                                                            <input class="locality form-text form-control input-lg-3 required" autocomplete="address-level2" type="text" id="edit-customer-profile-billing-commerce-customer-address-und-0-locality" name="city" value="{{old('city')}}" size="30" maxlength="255">
                                                         </div>
                                                         <div class="form-item clearfix form-type-textfield form-item-customer-profile-billing-commerce-customer-address-und-0-postal-code form-group">
                                                            <label for="edit-customer-profile-billing-commerce-customer-address-und-0-postal-code">Postal code </label>
                                                            <input class="postal-code form-text form-control input-lg-3" autocomplete="postal-code" type="text" id="edit-customer-profile-billing-commerce-customer-address-und-0-postal-code" name="postal_code" value="{{old('postal_code')}}" size="10" maxlength="255">
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
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