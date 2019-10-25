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
                            <h1 class="m-n h3">{{$data->name}}</h1>
                        </div>
                        <!-- sreeram -->

                    </div>
                </div>
                <!-- / main header -->

                <!-- main content -->
                <div class="wrapper-md user-profile-wrapper">
                    <!--Dashboard-thankyou-section-open -->

                    <!--Dashboard-thankyou-section-close -->
                    <!-- / stats -->

                    <!-- content -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <div class="profile">
                                    </div>
                                    <div class="view view-user-profile view-id-user_profile view-display-id-block dash-content-inner view-dom-id-58abcceea19e47959c1be01d25c06992">

                                        <div class="view-content">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="row-main clearfix">

                                                        <div class="field-content profile-section">
                                                            <div class="profile-cover" style="background-image: url({{asset('public/assets/images/users/covers')}}/{{$data->cover}});background-size: cover;height: 300px;width: 100%;"> <a href="{{route('edit_cover_image',Session::get('id'))}}" class="wall-img-edit-btn"><i class="fa fa-pencil"></i></a>
                                                                <div class="row">
                                                                    <div class="col-md-3 profile-image">
                                                                        <div class="profile-image-container"><img src="{{asset('public/assets/images/users/profiles')}}/{{$data->image}}" width="150" height="150" alt="" /> <a href="{{route('edit_profile_image',Session::get('id'))}}" class="profile-img-edit-btn"><i class="fa fa-pencil"></i></a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="main-wrapper">
                                                                <div class="wrapper-blocks">
                                                                    <div class="col-md-3 user-profile">
                                                                        <ul class="list-unstyled text-center">
                                                                            <li>
                                                                                <p><i class="fa fa-map-marker m-r-xs"></i>{{$data->name}}</p>
                                                                            </li>
                                                                            <li>
                                                                                <p><i class="fa fa-envelope m-r-xs"></i><a href="mailto:drupaldeveloper1995@gmail.com">{{$data->email}}</a></p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-9 m-t-lg">
                                                                        <div class="profil-timeline-wrapper">
                                                                            <div class="profile-timeline">
                                                                                <div class="profile-name-section">
                                                                                    <div class="profile-name-section-inner">
                                                                                        <h3>{{$data->name}}</h3>
                                                                                        <a href="{{route('edit_profile',Session::get('id'))}}" class="btn-red">Edit Profile</a>
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
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="skills-area">
                                                <h3>Profile</h3>
                                                <div class="view view-my-profile view-id-my_profile view-display-id-block view-dom-id-016c7142b79645319474cefec13c8dd5">

                                                    <div class="view-content">
                                                        <div class="panel panel-default">
                                                            <div class="table-responsive">
                                                                <table class="views-table cols-7 table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="views-field views-field-uid">
                                                                                Uid </th>
                                                                            <th class="views-field views-field-uid views-column-odd views-column-first views-column-last">
                                                                                <a href="#" class="active">{{$data->id}}</a> </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="views-field views-field-name-1 views-column-odd views-column-first views-column-last">
                                                                            <th class="views-field views-field-name-1">
                                                                                Username </th>
                                                                            <td class="views-field views-field-name-1 views-column-odd views-column-first views-column-last">
                                                                                <a href="#" title="View user profile." class="username active">{{$data->name}}</a> </td>
                                                                        </tr>
                                                                        <tr class="views-field views-field-field-afl-first-name views-column-odd views-column-first views-column-last">
                                                                            <th class="views-field views-field-field-afl-first-name">
                                                                                First Name </th>
                                                                            <td class="views-field views-field-field-afl-first-name views-column-odd views-column-first views-column-last">
                                                                                {{$data->first_name}} </td>
                                                                        </tr>
                                                                        <tr class="views-field views-field-field-afl-surname views-column-odd views-column-first views-column-last">
                                                                            <th class="views-field views-field-field-afl-surname">
                                                                                Surname </th>
                                                                            <td class="views-field views-field-field-afl-surname views-column-odd views-column-first views-column-last">
                                                                                {{$data->sur_name}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="views-field views-field-mail views-column-odd views-column-first views-column-last">
                                                                            <th class="views-field views-field-mail">
                                                                                E-mail </th>
                                                                            <td class="views-field views-field-mail views-column-odd views-column-first views-column-last">
                                                                                <a href="mailto:drupaldeveloper1995@gmail.com">{{$data->email}}</a> </td>
                                                                        </tr>
                                                                        <tr class="views-field views-field-field-mobile-number views-column-odd views-column-first views-column-last">
                                                                            <th class="views-field views-field-field-mobile-number">
                                                                                Mobile Number </th>
                                                                            <td class="views-field views-field-field-mobile-number views-column-odd views-column-first views-column-last">
                                                                                {{$data->contact}} </td>
                                                                        </tr>
                                                                        <tr class="views-field views-field-field-afl-sponsor views-column-odd views-column-first views-column-last">
                                                                            <th class="views-field views-field-field-afl-sponsor">
                                                                                Sponsor </th>
                                                                            <td class="views-field views-field-field-afl-sponsor views-column-odd views-column-first views-column-last">
                                                                                {{$data->sponsor}}
                                                                            </td>
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

                                </div>
                                <!-- /.block -->
                            </div>
                        </div>
                    </div>
@include('admin.layouts.footer')