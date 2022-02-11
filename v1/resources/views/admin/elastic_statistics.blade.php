@php
$elastic_statics=\App::call('App\Http\Controllers\DataStatisticsController@ElasticAccountInfo');
@endphp
@if($elastic_statics)
@if($elastic_statics->success)   
   <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 p-0">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h4>Emails statistics</h4>
                                    <table class="table bg-light cardtable">
                                        <tbody>
                                           	<tr>
                                                <td>Parent company</td>
                                                <td class="text-right">{{$elastic_statics->data->parentcompanyname??''}}</td>
                                            </tr>
										    <tr>
                                                <td>Company</td>
                                                <td class="text-right">{{$elastic_statics->data->company??''}}</td>
                                            </tr>
                                            <tr>
                                                <td>Emails sent this month</td>
                                                <td class="text-right">{{$elastic_statics->data->monthlyemailssent??''}}</td>
                                            </tr>
                                            <tr>
                                                <td>Remaining free emails</td>
                                                <td class="text-right">{{$elastic_statics->data->emailcredits??''}}</td>
                                            </tr>
                                            <tr>
                                                <td>Contact limit</td>
                                                <td class="text-right">{{$elastic_statics->data->maxcontacts??''}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endif
@endif