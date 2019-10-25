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
                            <h1 class="m-n h3">Edit help request</h1>
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

                                    <form enctype="multipart/form-data" action="{{route('update_support',$query->id)}}" method="post" id="general-support-form" accept-charset="UTF-8">
                                        @csrf
                                        <div class="from-panel">
                                            <div class="form-item clearfix form-type-textfield form-item-title form-group" data-toggle="tooltip" title="" data-original-title="Enter the support title">
                                                <label for="edit-title">Title <span class="form-required" title="This field is required.">*</span></label>
                                                <input type="text" id="edit-title" name="title" value="{{$query->title}}" @if ($errors->has('title')) autofocus @endif size="60" maxlength="128" class="form-text form-control input-lg-3 required">
                                            </div>
                                            <div class="form-item clearfix form-type-select form-item-priority form-group" data-toggle="tooltip" title="" data-original-title="Select support priority">
                                                <label for="edit-priority">Priority <span class="form-required" title="This field is required.">*</span></label>
                                                <select id="edit-priority" name="priority" class="form-select form-control required">
                                                    <option @if($query->priority == 1) selected="selected" @endif value="1">Highest</option>
                                                    <option @if($query->priority == 2) selected="selected" @endif  value="2">High</option>
                                                    <option @if($query->priority == 3) selected="selected" @endif  value="3">Medium</option>
                                                    <option @if($query->priority == 4) selected="selected" @endif  value="4">Low</option>
                                                    <option @if($query->priority == 5) selected="selected" @endif  value="5">Lowest</option>
                                                </select>
                                            </div>
                                            <div class="form-item clearfix form-type-textarea form-item-description form-group" data-toggle="tooltip" title="" data-original-title="Enter your the support description">
                                                <label for="edit-description">Description <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                                    <textarea id="edit-description" name="description" @if ($errors->has('description')) autofocus @endif cols="60" rows="5" class="form-textarea form-control required">{{$query->description}}</textarea>
                                                    <div class="grippie"></div>
                                                </div>
                                            </div>
                                            <div id="file-item-wrapper">
                                                <div class="file-item form-wrapper" id="edit-file-wrapper">
                                                    <div class="form-file-insert">
                                                        @if(!empty($query->file))
                                                        <div class="form-item-edit clearfix form-type-managed-file form-item-file-wrapper-file-1 form-group" data-toggle="tooltip" title="" data-original-title="(Allowed File Extensions: .png,.jpg,.jpeg,.doc,.docx,.pdf)">
                                                            <label for="edit-file-wrapper-file-1-upload">Attachment </label>
                                                            <div id="edit-file-wrapper-file-1-upload-file-upload-wrapper" class="form-managed-file"><span class="file">
                                                            <a href="{{asset('public/assets/support/support_files')}}/{{$query->file}}" type="application/vnd.openxmlformats-officedocument.wordprocessingml.document; length=630478">{{$query->file}}</a></span>
                                                                <a name="file_wrapper_file_1_remove_button"  class="btn btn-default btn-danger remove-btn">
                                                                    Remove
                                                                </a>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="form-item-insert clearfix form-type-managed-file form-item-file-wrapper-file-1 form-group" data-toggle="tooltip" title="" data-original-title="(Allowed File Extensions:.png,.jpg,.jpeg,.doc,.docx,.pdf)">
                                                            <label for="edit-file-wrapper-file-1-upload">Attachment </label>
                                                            <div id="edit-file-wrapper-file-1-upload-file-upload-wrapper" class="form-managed-file">
                                                                <input type="file" id="edit-file-wrapper-file-1-upload" name="support_file" @if ($errors->has('support_file')) autofocus @endif size="22" class="form-file">
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" id="edit-submit" name="op" value="Submit" class="form-submit btn btn-default btn-primary">
                                        </div>
                                    </form>
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
