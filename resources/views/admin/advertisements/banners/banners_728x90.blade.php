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
                            <h1 class="m-n h3">Promotional Banners</h1>
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
                            @include('admin.layouts.promotional-tools-nav')
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">
                                    <div class="eps-view view view-promotional-banners view-id-promotional_banners view-display-id-page_1 view-dom-id-a48ae98e9bed10986d6e6d576ec0d7b0">
                                        <div class="view-header">
                                            <a href="{{route('banners_create')}}" class="btn btn-primary" style="margin :10px;"> Create Banner </a>
                                        </div>
                                        <div class="panel panel-default panel-view">
                                            <div class="view-content">
                                                <div id="views-bootstrap-grid-1" class="views-bootstrap-grid-plugin-style">
                                                    <div class="row">
                                                        @if($total_records > 0)
                                                        @foreach($query as $row)
                                                        <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                                            <div class="views-field views-field-nothing"> <span class="field-content"><div class="promotional-banners">
                                                                <h1><a href="#">{{$row->banner_title}}</a></h1>
                                                                <div class="banner-image">
                                                                @php($data = array(
                                                                'key' => explode('x',$row->banner_size)
                                                                ))
                                                                <img src="{{asset('public/assets/images/advertisement/banners/')}}/{{$row->banner_image}}" width="{{$data['key'][0]}}" height="{{$data['key'][1]}}" alt="">
                                                                <div class="banner-image-copy">
                                                                    <a href="#"><img src="{{asset('public/assets/images/advertisement/banners/')}}/{{$row->banner_image}}" width="100" height="100" alt=""></a>
                                                                </div>
                                                                <div class="banner-essential-text">
                                                                    <span class="banner-size-custom-text">
                                                                        <a href="/taxonomy/term/12">{{$row->banner_size}}</a>
                                                                    </span>
                                                                <span class="banner-export-code"></span>
                                                            </div>
                                                            <div class="copy-banner">
                                                                <a href="#" data-toggle="modal" data-target="#promotion-banner-details" class="btn show-banner" data-id="35"> Show Code</a>
                                                                <span class="span_edit"><a href="{{route('banners_edit',$row->id)}}">Edit</a> </span> <span class="span_edit"><a href="">Delete</a> </span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    </span>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <h4>No Banner Found</h4>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="view-footer">
                                <div id="promotion-banner-details" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content popup-width-840">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                <h4 class="modal-title">Promotion Banners</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="promotion-model-content">
                                                    <div class="banner-code">
                                                    </div>
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td><span class="promotion-image-title"> Banner : </span></td>
                                                                <td><span class="image-banner"> [field_banner_image]</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <span class="bannet-title">Banner Name : </span></td>
                                                                <td> <span class="bannet-title-content">[title]</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="banner-size">Banner Size : </span></td>
                                                                <td><span class="banner-size-content">[field_banner_style]</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="banner-code-heading"> Banner code :  </span></td>
                                                                <td>
                                                                    <div class="export-code-width"><span class="banner-code-content"></span></div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>

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
 <script type="text/javascript">
    jQuery(function($) {
        $(document).ready(function() {
            $(".show-banner").click(function() {
                $(".image-banner").html($(this).parent().parent().find("div.banner-image-copy a").html());
                $(".bannet-title-content").html($(this).parent().parent().parent().find("h1").html());
                $(".banner-size-content").html($(this).parent().parent().find("div.banner-essential-text").find("span.banner-size-custom-text").find("a").html());
                $(".destination-url-content").html($(this).parent().parent().find("div.banner-essential-text").find("span.destination-url-text").html());
                $(".banner-code-content").html($(this).parent().parent().find("div.banner-essential-text").find("span.banner-export-code").html());
                $(".banner-code-content").append($(this).parent().parent().find("img").attr("src"));
                $(".banner-code-content").append($(this).parent().parent().find("div.banner-essential-text").find("span.banner-export-code-content-img").html());
                $(".banner-code-content").append($(this).parent().parent().find("div.banner-essential-text").find("span.banner-export-code-a-link").html());

            });
        });
    });
</script>