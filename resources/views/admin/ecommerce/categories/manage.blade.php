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
                     <h1 class="m-n h3">Manage Category</h1>
                     <small class="text-muted"></small>
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
                     <div class="region region-content">
                        <div id="block-system-main" class="block block-system clearfix">
                           <div class="view view-manage-categories view-id-manage_categories view-display-id-page view-dom-id-f49cc08f24a2a8a2af06bdec8b1fb429">
                              <div class="view-header">
                                 <p><a href="/admin/structure/taxonomy/product_category/add?destination=afl/mange-product-category" title="Add New Category"><button class="btn m-b-xs btn-sm btn-primary btn-addon"><i class="fa fa-plus"></i>Add New Category</button></a></p>
                              </div>
                              <div class="view-filters">
                                 <form action="/afl/mange-product-category" method="get" id="views-exposed-form-manage-categories-page" accept-charset="UTF-8">
                                    <div class="from-panel">
                                       <div class="views-exposed-form form-inline">
                                          <div class="views-exposed-widgets clearfix">
                                             <div id="edit-name-wrapper" class="views-exposed-widget views-widget-filter-name form-group">
                                                <label for="edit-name">
                                                Title          </label>
                                                <div class="views-widget">
                                                   <div class="form-item clearfix form-type-textfield form-item-name form-group">
                                                      <input type="text" id="edit-name" name="name" value="" size="30" maxlength="128" class="form-text form-control input-lg-3">
                                                   </div>
                                                </div>
                                             </div>
                                             <div id="edit-tid-raw-wrapper" class="views-exposed-widget views-widget-filter-tid_raw form-group">
                                                <label for="edit-tid-raw">
                                                Id          </label>
                                                <div class="views-widget">
                                                   <div class="form-item clearfix form-type-textfield form-item-tid-raw form-group">
                                                      <input type="text" id="edit-tid-raw" name="tid_raw" value="" size="30" maxlength="128" class="form-text form-control input-lg-3">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="views-exposed-widget views-submit-button form-group m-t-22">
                                                <input type="submit" id="edit-submit-manage-categories" name="" value="Search" class="form-submit btn btn-default btn-primary">              <input type="submit" id="edit-reset" name="op" value="Clear" class="form-submit btn btn-default btn-primary">          
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <div class="view-content">
                                 <div class="panel panel-default">
                                    <div class="table-responsive">
                                       <table class="views-table cols-2 table">
                                          <thead>
                                             <tr>
                                                <th class="views-field views-field-name">
                                                   Name              
                                                </th>
                                                <th class="views-field views-field-edit-term">
                                                   edit              
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @if(!empty($total_records) > 0)
                                             @foreach($query as $row)
                                             <tr class="odd views-row-first">
                                                <td class="views-field views-field-name">
                                                   {{$row->name}}             
                                                </td>
                                                <td class="views-field views-field-edit-term">
                                                   <a href="{{route('edit_categories',$row->id)}}">edit</a>
                                                </td>
                                             </tr>
                                             @endforeach
                                             @else
                                             <tr>
                                                <h5>No Categories Found</h5>
                                             </tr>
                                             @endif
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.block -->
                     </div>
                  </div>
               </div>
            <!-- / main content -->
         </div>
      </div>
   </div>
</div>
@include('admin.layouts.footer')