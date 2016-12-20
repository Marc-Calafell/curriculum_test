@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Studies
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add studia</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body" style="display: none;">
                        <form role="form">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter the name of studie">
                            </div>


                            <!-- input states -->
                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Input with success</label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                                <span class="help-block">Help block with success</span>
                            </div>
                            <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Input with
                                    warning</label>
                                <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                                <span class="help-block">Help block with warning</span>
                            </div>
                            <div class="form-group has-error">
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with
                                    error</label>
                                <input type="text" class="form-control" id="inputError" placeholder="Enter ...">
                                <span class="help-block">Help block with error</span>
                            </div>





                        </form>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                </div>



                <div class="panel panel-default">
                    <div class="panel-heading">Studies</div>
                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($studies as $study)
                                <tr>
                                    <td>{{ $study->id  }}</td>
                                    <td>{{ $study->name }}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
