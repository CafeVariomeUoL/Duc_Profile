<?php

/**
 * @author Umar Riaz
 * Created at 14/07/2021
 * This is the master layout for Duc
 */
?>
<!doctype html>
<html>

<head>
    <title>Duc Profiler</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/jqvmap/jqvmap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/summernote/summernote-bs4.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/site.css') ?>?v=<?php echo rand()?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/nav.css') ?>?v=<?php echo rand()?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/conbtn.css') ?>?v=<?php echo rand()?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/tag/bootstrap-tagsinput.css') ?>"> -->

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?php echo base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script> -->

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Select2 css -->
    <script>var base_url = '<?php echo base_url() ?>';</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="<?php echo base_url('public/js/jsonFormation.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/user_authforTerms.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/formJs.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/pops.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/summary.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/comFunctions.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/conditon.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/conbtn.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/validate.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/assets.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/tags.js') ?>?v=<?php echo rand()?>"></script>
    <script src="<?php echo base_url('public/js/user_terms.js') ?>?v=<?php echo rand()?>"></script>



    <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script> -->
    <script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body class="hold-transition d-flex flex-column h-100">


    <header>
        <?= $this->include('temp/nav') ?>
    </header>
    <main role="main flex-shrink-0">
        <section class="content">
            <div id="con">
                <?= $this->include('temp/alerts') ?>
                <?= $this->renderSection('content') ?>
            </div><!-- /.container-fluid -->
        </section>
    </main>
    <div class="modal fade " id="TermModal" tabindex="-1" role="dialog" aria-labelledby="TermModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="TermModalLabel">Definition of Use Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body " style="max-height: 50vh !important; overflow-y:scroll">
                <table class="table table-bordered  table-responsive">
                    <thead>
                        <tr>
                            <th style="width:25% !important" scope="col">Use Condition</th>
                            <th scope="col">Definition</th>
                        </tr>
                    </thead>
                    <tbody id="termModalBody">

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

    </div>

<div class="modal fade" id="createTerms" tabindex="-1" role="dialog" aria-labelledby="createTerms" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-content1">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Condition Terms</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form action="<?php echo base_url('/AddCon/sava_terms'); ?>" id="termsForm", method="POST">
                    <div class="form-row">
                        <div class="form-group col">
                                <label for="termGName">Term Group Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="text" class="form-control" required name="termGName" id="termGName"  placeholder="Please enter name of term group">
                                <input type="hidden" id="termsJson" name="terms">
                                <input type="email" id="emailtosub" name ="t_email" class="hidden">
                        </div>
                    </div>
                    <div id="userTerms" class="termDiv" style="max-height: 60vh; overflow-y: auto; overflow-x:hidden;overscroll-behavior-y: contain;">
                        <div class="termG card">
                           <div class="form-row mt-3">
                                <legend class="ltext float-left" visible="true">Term 1</legend>
                                <!-- <div class="couter col-6 col-md-2 removeTerm">
                                    <div class="cinner">
                                        <label >Remove</label>
                                    </div>
                                </div> -->
                                <!-- <button type="button" id="removePerson" class="  closebtn  mr-2 btn btn-small removeTerm btn-danger"><i
                                class="fas fa-times"></i></button>-->
                            </div> 
                            <div class="form-row ml-2 mr-2">
                                <div class="form-group col-md-6 col-6 col-12">
                                    <label for="term">Term:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                    <input type="text" class="form-control" required name="term[]"  placeholder="Please enter use condition term">
                                </div>
                                <div class="form-group col-md-6 col-6 col-12">
                                    <label for="t_description">Description:</label>
                                    <input type="text" class="form-control" name="t_description[]"  placeholder="Please enter use condition term decription">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row mt-2">
                    <div class="col-md-12 col-12"> 
                    <button type="button" id="addterm" class="p-1 addterm mpbtn"><i class="fas fa-plus"></i> Term </button>
                    <button type="submit" id="saveterm" class="p-1  mpbtn float-right"><i class="fas fa-save"></i> Terms </button>
                    </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Update Term Model -->
<div class="modal fade" id="updateTerms" tabindex="-1" role="dialog" aria-labelledby="updateTerms" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-content1">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Condition Terms</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form action="<?php echo base_url('/AddCon/update_terms'); ?>" id="utermsForm", method="POST">
                    <div class="form-row">
                        <div class="form-group col">
                                <label for="termGName">Term Group Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="text" class="form-control"  required name="utermGName" id="utermGName"  placeholder="Please enter name of term group">
                                <div class="hidden" id="utermsJson"></div>
                                <input type="email" id="uemailtosub" name ="t_email" class="hidden">
                        </div>
                    </div>
                    <div id="upduserTerms" class="termDiv" style="max-height: 60vh; overflow-y: auto; overflow-x:hidden;overscroll-behavior-y: contain;">

                    </div>
                    <hr>
                    <div class="form-row mt-2">
                    <div class="col-md-12 col-12"> 
                    <button type="button" id="updaddterm" class="p-1 updaddterm mpbtn"><i class="fas fa-plus"></i> Term </button>
                    <button type="submit" id="updateterm" class="p-1  mpbtn float-right">Update</button>
                    </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md " role="document">
        <div class="modal-content modal-content1">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Condition Rules Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th style="width:30% !important" scope="col">Rule Term</th>
                            <th scope="col">Definition</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Forbidden</td>
                            <td>The stated Use/Requirement is not permitted for some or all of the resource (as per the Scope).</td>
                        </tr>
                        <tr>
                            <td>Permitted </td>
                            <td>The stated Use/Requirement is permitted for some or all of the resource (as per the Scope).</td>
                        </tr>
                        <tr>
                            <td>Obligated</td>
                            <td>The stated Use/Requirement is necessary for some or all of the resource (as per the Scope).</td>
                        </tr>
                        <tr>
                            <td>No Requirements</td>
                            <td>No defined requirement for the stated Use Condition.</td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>

</html>