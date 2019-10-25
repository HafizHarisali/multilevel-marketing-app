@include('admin.layouts.header')
@include('admin.layouts.aside')
<div id="content" class="app-content" role="main">
   <div class="app-content-body ">
      <div class="hbox hbox-auto-xs hbox-auto-sm">
         <div class="col">
            <!-- main header -->
            <div class="bg-light lter b-b wrapper-md">
               <div class="row">
                  <div class="col-lg-4 col-md-12">
                     <h1 class="m-n h3">General help</h1>
                     <small class="text-muted"></small>
                  </div>
                  <div class="col-lg-8 col-md-12 text-right hidden-xs title-extra-class">
                     <div class="region region-title-extra">
                        <div id="block-block-3" class="block block-block contextual-links-region clearfix">
                           <a href="{{route('support_add')}}" class="btn btn-success btn-addon"><i class="fa fa-life-ring"></i>Get help</a>
                        </div>
                        <!-- /.block -->
                     </div>
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
                           <div class="eps-view view view-general-support-view view-id-general_support_view view-display-id-page view-dom-id-2a181c313e44216f40920adb20ab0941">
                              <div class="panel panel-default panel-view">
                                 <div class="view-content">
                                    <div class="panel panel-default">
                                       <div class="panel-body">
                                          <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                                             <div class="job-details-wrapper">
                                                <h3>{{$query->title}}</h3>
                                                <div class="job-details-inner">
                                                   <div class="panel panel-white">
                                                      <div class="panel-heading clearfix">
                                                         <div class="job-details-left-info">
                                                            <ul>
                                                               <li>Support ID<span>#{{$query->support_id}}</span></li>
                                                               @if($query->priority == 1)
                                                               <li>Priority <span>Highest</span></li>
                                                               @elseif($query->priority == 2)
                                                               <li>Priority <span>High</span></li>
                                                               @elseif($query->priority == 3)
                                                               <li>Priority <span>Medium</span></li>
                                                               @elseif($query->priority == 4)
                                                               <li>Priority <span>Low</span></li>
                                                               @elseif($query->priority == 5)
                                                               <li>Priority <span>Lowest</span></li>
                                                               @endif
                                                            </ul>
                                                            <ul class="target-days">
                                                               @if($query->status == 0)
                                                               <li>{{$ago}}<span>Open</span></li>
                                                               @elseif($query->status == 1)
                                                               <li>{{$ago}}<span>Closed</span></li>
                                                               @elseif($query->status == 2)
                                                               <li>{{$ago}}<span>Completed</span></li>
                                                               @endif
                                                            </ul>
                                                         </div>
                                                         <div class="job-details-right-info">
                                                            @if($query->status == 0)
                                                            <a href="{{route('edit_support',$query->support_id)}}" class="btn btn-primary m-l-xs">Edit</a>
                                                             <a href="{{route('mark_closed',$query->support_id)}}" class="btn btn-danger m-l-xs">Mark as closed</a>
                                                             <a href="{{route('mark_completed',$query->support_id)}}" class="btn btn-danger m-l-xs">Mark as completed</a>
                                                            @elseif($query->status == 1)

                                                            @elseif($query->status == 2)
                                                            <a href="{{route('mark_closed',$query->support_id)}}" class="btn btn-danger m-l-xs">Mark as closed</a>
                                                            @endif
                                                            <a href="{{route('delete_support',$query->support_id)}}" class="btn btn-danger m-l-xs">Delete</a>
                                                         </div>
                                                      </div>
                                                      <div class="panel-body">
                                                         <div class="job-details">
                                                            <h4>Support Description</h4>
                                                            {{$query->description}}
                                                            <div class="job-files clearfix">
                                                               <div class="view view-general-support-file view-id-general_support_file view-display-id-block view-dom-id-d21f3df87400813bf17406bbb83201dc">
                                                                  <div class="view-content">
                                                                     <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                           <div class="item-list">
                                                                              <ul>
                                                                                 <li class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                                                                                    <div class="views-field views-field-uri">        <span class="field-content"><a href="{{asset('public/assets/support/support_files')}}/{{$query->file}}" title="View File" target="_blank"><i class="fa fa-file-archive-o fa-lg"></i></a></span>  </div>
                                                                                 </li>
                                                                              </ul>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="about-employer clearfix">
                                                               <h4>About user</h4>
                                                               <div class="media">
                                                                  <div class="media-left"><img src="{{asset('public/assets/images/users/profiles')}}/{{$query->profile_image}}" width="40" height="40" alt=""></div>
                                                                  <div class="media-body">
                                                                     <div class="user-name"><a href="/users/businessadmin" title="View user profile." class="username">{{$query->user_name}}</a></div>
                                                                     <div class="user-email">Email : <a href="mailto:{{$query->user_email}}">{{$query->user_email}}</a></div>
                                                                     <div class="user-email">Mobile : {{$query->user_phone}}</div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.block -->
                     </div>
                     <div class="region region-content-bottom">
                        @if(!empty($count) > 0)
                        @foreach($comments as $row)
                        <div id="block-views-general-support-comment-block" class="block block-views contextual-links-region clearfix">
                           <div class="view view-general-support-comment view-id-general_support_comment view-display-id-block view-dom-id-17917981a1d4aafb023f38ad8a35ccdd jquery-once-1-processed">
                              <div class="view-content">
                                 <div class="panel panel-default">
                                    <div class="panel-body">
                                       <div class="views-row views-row-1 views-row-odd views-row-first views-row-last sl-item job-comment-list">
                                          <div class="media">
                                             <div class="media-left">
                                                <img src="{{asset('public/assets/images/users/profiles')}}/{{$row->profile_image}}" width="40" height="40" alt="">
                                             </div>
                                             <div class="media-body">
                                                <h4 class="media-heading">{{$row->comment_title}}</h4>
                                                <h5 class="media-user-name"><a href="/users/businessadmin" title="View user profile." class="username">{{$row->comment_user_name}}</a></h5>
                                                <div class="message-info">
                                                   @if($row->comment_status == 0)
                                                   <span class="label bg-info m-r-xs">
                                                   : Open</span>
                                                   @elseif($row->comment_status == 1)
                                                   <span class="label bg-info m-r-xs">
                                                   : On Hold</span>
                                                   @elseif($row->comment_status == 2)
                                                   <span class="label bg-info m-r-xs">
                                                   : Escalated</span>
                                                   @elseif($row->comment_status == 3)
                                                   <span class="label bg-info m-r-xs">
                                                   : Pending</span>
                                                   @elseif($row->comment_status == 4)
                                                   <span class="label bg-info m-r-xs">
                                                   : Waiting On Customer Reply</span>
                                                   @elseif($row->comment_status == 5)
                                                   <span class="label bg-info m-r-xs">
                                                   : Waiting On Third Party</span>
                                                   @elseif($row->comment_status == 6)
                                                   <span class="label bg-info m-r-xs">
                                                   : Customer Reply</span>
                                                   @endif
                                                   <span class="label text-base bg-light ">
                                                      {{ \Carbon\Carbon::parse($row->updated_date_time)->diffForHumans() }}
                                                   </span>
                                                   <a href="{{route('edit_support_comment',['id'=> $row->comment_id,'support_id' => $query->support_id])}}" class="btn btn-xs btn-info m-l-xs">Edit</a>
                                                   <a href="{{route('delete_support_comment',$row->comment_id)}}" class="btn btn-xs btn-danger m-l-xs">Delete</a>
                                                </div>
                                                <div class="comment-description">
                                                   <div class="comment-description-body">{{$row->comment_description}}</div>
                                                   <a href="#" class="hide-link"></a>
                                                </div>
                                                <div class="job-files">
                                                   <div class="view view-general-support-file view-id-general_support_file view-display-id-block_1 view-dom-id-9af52e340e43a3165f5ef277f2932673">
                                                      <div class="view-content">
                                                         <div class="panel panel-default">
                                                            <div class="panel-body">
                                                               <div class="item-list">
                                                                  <ul>
                                                                     <li class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                                                                        <div class="views-field views-field-uri">
                                                                          <span class="field-content">
                                                                           <a href="{{asset('public/assets/support/support_comment_files')}}/{{$row->comment_file}}" title="View File" target="_blank"><i class="fa fa-file-archive-o fa-lg"></i>
                                                                           </a>
                                                                           </span>
                                                                        </div>
                                                                     </li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                        @endif
                        <div id="block-afl-general-support-afl-general-support-comment" class="block block-afl-general-support contextual-links-region clearfix">
                           <div class="panel panel-default">
                              <div class="panel-heading font-bold">Post Your Comment</div>
                              <div class="panel-body">
                                 <form enctype="multipart/form-data" action="{{route('insert_support_comment',$query->support_id)}}" method="post" id="general-support-comment-form" accept-charset="UTF-8">
                                    @csrf
                                    <div>
                                       <div class="form-item clearfix form-type-textfield form-item-title form-group" data-toggle="tooltip" title="" data-original-title="Enter your title">
                                          <label for="edit-title">Title <span class="form-required" title="This field is required.">*</span></label>
                                          <input type="text" id="edit-title" name="title" value="{{old('title')}}" @if($errors->has('title')) autofocus @endif size="60" maxlength="128" class="form-text form-control input-lg-3 required">
                                       </div>
                                       <div class="form-item clearfix form-type-textarea form-item-description form-group" data-toggle="tooltip" title="" data-original-title="Enter your description">
                                          <label for="edit-description">Description <span class="form-required" title="This field is required.">*</span></label>
                                          <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                             <textarea id="edit-description" name="description" @if($errors->has('description')) autofocus @endif cols="60" rows="5" class="form-textarea form-control required">{{old('description')}}</textarea>
                                             <div class="grippie"></div>
                                          </div>
                                       </div>
                                       <div class="form-item clearfix form-type-select form-item-status form-group" data-toggle="tooltip" title="" data-original-title="Select your support status level">
                                          <label for="edit-status">Status <span class="form-required" title="This field is required.">*</span></label>
                                          <select id="edit-status" name="status" class="form-select form-control required">
                                             <option value="0" {{old('status') == 0 ? 'selected':''}}>Open</option>
                                             <option value="1" {{old('status') == 1 ? 'selected':''}}>On Hold</option>
                                             <option value="2" {{old('status') == 2 ? 'selected':''}}>Escalated</option>
                                             <option value="3" {{old('status') == 3 ? 'selected':''}}>Pending</option>
                                             <option value="4" {{old('status') == 4 ? 'selected':''}}>Waiting on Customer Reply</option>
                                             <option value="5" {{old('status') == 5 ? 'selected':''}}>Waiting on Third Party</option>
                                             <option value="6" {{old('status') == 6 ? 'selected':''}}>Customer Reply</option>
                                          </select>
                                       </div>
                                       <div id="file-item-wrapper">
                                          <div class="file-item form-wrapper" id="edit-file-wrapper">
                                             <div id="edit-file-wrapper-file-1-ajax-wrapper">
                                                <div class="form-item clearfix form-type-managed-file form-item-file-wrapper-file-1 form-group" data-toggle="tooltip" title="" data-original-title="(Allowed File Extensions: .png,.jpg,.jpeg,.doc,.docx,.pdf)">
                                                   <label for="edit-file-wrapper-file-1-upload">Attachment </label>
                                                   <div id="edit-file-wrapper-file-1-upload-file-upload-wrapper" class="form-managed-file">
                                                      <input type="file" id="edit-file-wrapper-file-1-upload" name="support_comment_file" size="22" class="form-file">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group ajax-action-group form-wrapper" id="edit-action"></div>
                                       <input type="submit" id="edit-submit" name="op" value="submit" class="form-submit btn btn-default btn-primary">
                                    </div>
                                 </form>
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