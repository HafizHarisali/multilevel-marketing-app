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
                     <h1 class="m-n h3">All support Requests</h1>
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
                           <div class="eps-view view view-general-support view-id-general_support view-display-id-page_1 help-custom-table view-dom-id-1f5fe4dd571b47761da1da7eb54c4de2">
                              <div class="panel panel-default panel-filter">
                                 <div class="panel-heading clearfix">
                                    <h4 class="panel-title" data-toggle="collapse" data-target=".view-filters">
                                       <span class="text-dark-lter"><i class="fa fa-filter text-primary"></i> Show filters.</span>
                                    </h4>
                                 </div>
                                 <div class="panel-collapse view-filters collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                       <form action="{{route('filter_support')}}" method="get" id="views-exposed-form-general-support-page-1" accept-charset="UTF-8">
                                          <div class="from-panel">
                                             <div class="views-exposed-form form-inline">
                                                <div class="views-exposed-widgets clearfix">
                                                   <div id="edit-title-wrapper" class="views-exposed-widget views-widget-filter-title form-group">
                                                      <label for="edit-title">
                                                      Title          </label>
                                                      <div class="views-widget">
                                                         <div class="form-item clearfix form-type-textfield form-item-title form-group">
                                                            <input type="text" id="edit-title" name="title" value="" size="30" maxlength="128" class="form-text form-control input-lg-3">
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div id="edit-priority-wrapper" class="views-exposed-widget views-widget-filter-priority form-group">
                                                      <label for="edit-priority">
                                                      Priority          </label>
                                                      <div class="views-widget">
                                                         <div class="form-item clearfix form-type-select form-item-priority form-group">
                                                            <select id="edit-priority" name="priority" class="form-select form-control">
                                                               <option value="" selected="selected">- Any -</option>
                                                               <option value="1">Highest</option>
                                                               <option value="2">High</option>
                                                               <option value="3">Medium</option>
                                                               <option value="4">Low</option>
                                                               <option value="5">Lowest</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div id="edit-status-wrapper" class="views-exposed-widget views-widget-filter-status form-group">
                                                      <label for="edit-status">
                                                      Status          </label>
                                                      <div class="views-widget">
                                                         <div class="form-item clearfix form-type-select form-item-status form-group">
                                                            <select id="edit-status" name="status" class="form-select form-control">
                                                               <option value="" selected="selected">- Any -</option>
                                                               <option value="0">Open</option>
                                                               <option value="1">Closed</option>
                                                               <option value="2">Completed</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="views-exposed-widget views-submit-button form-group m-t-22">
                                                      <input type="submit" id="edit-submit-general-support" name="" value="Apply" class="form-submit btn btn-default btn-info">          
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                              <div class="panel panel-default panel-view">
                                 <div class="view-content">
                                    <div class="vbo-views-form">
                                       <form class="view-bulk-operation" action="" method="post" id="views-form-general-support-page-1" accept-charset="UTF-8">
                                          <div>
                                             <div class="table-responsive">
                                                <table class="views-table cols-7 table table-0 table-0 table-0 table-0">
                                                   <thead>
                                                      <tr>
                                                         <th class="views-field views-field-title">
                                                            Title          
                                                         </th>
                                                         <th class="views-field views-field-php-1">
                                                            Answer          
                                                         </th>
                                                         <th class="views-field views-field-priority">
                                                            Priority          
                                                         </th>
                                                         <th class="views-field views-field-status">
                                                            Status          
                                                         </th>
                                                         <th class="views-field views-field-created">
                                                            Created date          
                                                         </th>
                                                         <th class="views-field views-field-php">
                                                            Action          
                                                         </th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      @if(!empty($total_records > 0))
                                                      @foreach($query as $row)
                                                      <tr class="odd views-row-first views-row-last">
                                                         <td class="views-field views-field-title title-field">
                                                            <h5>{{$row->title}}</h5>
                                                         </td>
                                                         <td class="views-field views-field-php-1">
                                                            {{$row->answer_count}}         
                                                         </td>
                                                         <td class="views-field views-field-priority">
                                                            @if($row->priority == 1)
                                                            <span class="label bg-primary inline">Highest</span>
                                                            @elseif($row->priority == 2)
                                                            <span class="label bg-primary inline">High</span>
                                                            @elseif($row->priority == 3)
                                                            <span class="label bg-primary inline">Medium</span>
                                                            @elseif($row->priority == 4)
                                                            <span class="label bg-primary inline">Low</span>
                                                            @elseif($row->priority == 5)
                                                            <span class="label bg-primary inline">Lowest</span>
                                                            @endif          
                                                         </td>
                                                         <td class="views-field views-field-status">
                                                            @if($row->status == 0)
                                                            <span class="label bg-info inline">Open</span>
                                                            @elseif($row->status == 1)
                                                            <span class="label bg-info inline">Closed</span>
                                                            @elseif($row->status == 2)
                                                            <span class="label bg-info inline">Completed</span>
                                                            @endif          
                                                         </td>
                                                         <td class="views-field views-field-created">
                                                            {{$row->created_date_time}}         
                                                         </td>
                                                         <td class="views-field views-field-php">
                                                            <a href="{{route('support_details',$row->support_id)}}" class="btn btn-info m-l-xs">View details</a><a href="{{route('mark_closed',$row->support_id)}}" class="btn btn-danger m-l-xs">Mark as Closed</a>          
                                                         </td>
                                                      </tr>
                                                      @endforeach
                                                      @else
                                                      <tr>No Request Found</tr>
                                                      @endif
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.block -->
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