<?php

/**
 * @author Umar Riaz
 * Created at 01/07/2020
 * 
 */
?>

<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>

<!-- multistep form -->
<form id="msform" action="<?php echo base_url('/AddCon/sava_profile'); ?>" method="post">
    <!-- progressbar -->
    <ul id="progressbar">
        <li id="uinfo" class="active">User</li>
        <li id="pinfo">Profile</li>
        <li id="rinfo">Asset</li>
        <li id="chinfo">Select Use Condition Terms</li>
        <li id="cinfo">Use Statements</li>
        <!-- <li id="cinfo">Use Conditions</li>
            <li id= "pinfo">Publications</li> -->
        <li id="sinfo">Summary</li>

    </ul>

    <!-- fieldsets -->
    <!-- User Info -->
    <fieldset id="userinfofield">
        <div class="card-header">
            <h3 class="mb-0 text-center">User Information</h3>
            <small class="mb-0 text-center">If you want to save profile in our server (to use later), Please enter user details.</small>
            <!--             <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
                <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small> -->
        </div>
        <div id="userinformation">
        <div class="col-md-12 mt-3 col-12"> <button type="button" id="adduser" class="form-control  adduser"><i class="fas fa-plus"></i> User Info </button></div>
             <div id="usr"></div>
            <!-- <div class="form-row mt-3 p-0">
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="u_role">Role:</label>
                    <input type="text" class="form-control" value="<?php if (isset($role)) echo $role ?>" name="u_role" id="u_role" placeholder="Please specify you role">
                </div>
                <div class="form-group col-md-12 col-12 col-12">
                    <label for="u_email">Email:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                    <input type="email" class="form-control" value="<?php if (isset($email)) echo $email ?>" required name="u_email" id="u_email" placeholder="Please enter email">
                </div>
            </div>
            <div class="form-row mt-1 p-0">
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="u_fname">First Name:</label>
                    <input type="text" class="form-control" value="<?php if (isset($fname)) echo $fname ?>" name="u_fname" id="u_fname" placeholder="Please enter first name">
                </div>
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="u_lname">Last Name:</label>
                    <input type="text" class="form-control" value="<?php if (isset($lname)) echo $lname ?>" name="u_lname" id="u_lname" placeholder="Please enter last name">
                </div>
            </div>
        </div>
        <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
            <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small> -->
</div>
        <hr>

        <input name="next" id="userInfo" class="next btn action-button"  readonly value="Next" />
        <input type="button" name="bc" id="userToSum" class="action-button backToSum" value="Summary" />
    </fieldset>
    <!-- Profile Info -->
    <fieldset id="profileinfofield">
        <div class="card-header">
            <h3 class="mb-0 text-center">Profile Information</h3>
            <small class="mb-0 text-center">Please enter a name and version number for this DUC profile</small>

            <!-- <small class="text-muted mr-2">All fields marked with </small><small class="text-danger"> -->
            <!-- <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small> -->
        </div>
        <div id="pinformation">
            <div class="form-row mt-3 p-0">
                <!-- <div class="form-group col-md-6 col-6 col-12 hidden">
                    <label for="p_id">Id:</label> -->

                <!-- </div> -->
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="p_name">Profile Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                    <input type="text" class="form-control" required name="p_name" id="p_name" placeholder="Please create a name for this profile">
                </div>
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="p_version">Profile Version:</label>
                    <input type="text" class="form-control" name="p_version" id="p_version" placeholder="Please create a version for this profile e.g. 0.0.1">
                </div>
            </div>
            <div class="form-row">
                <input type="text" class="form-control hidden" name="p_id" id="p_id" placeholder="Please enter profile id.">
            </div>
            <div class="form-row mt-1 p-0">
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="p_date">Creation Date:</label>
                    <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="p_date" id="p_date" readonly placeholder="Please enter profile created date">
                </div>
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="p_date">Last Update Date:</label>
                    <input type="date" class="form-control"  value="<?php echo date('Y-m-d'); ?>" name="p_ludate" id="p_ludate" readonly placeholder="Please enter profile Last Updated date">
                </div>
            </div>
            <div class="form-row mt-1 p-0">
                <div class="form-group col-md-6 col-sm-6 col-6">
                    <span id="r_permission">
                        <label for="r_pmode">Permission Mode:</label>
                        <select name="r_pmode" id="r_pmode" class="form-control">
                        <option></option>
                        <option>All unstated conditions permitted</option>
                        <option>All unstated conditions forbidden</option>
                        </select>
                    </span>
                </div>
                <span class="form-group col-md-6 col-6 col-6" id="p_reflist">
                    <label for="a_lang">Language:</label>
                    <select name="a_lang" id="a_lang" class="form-control" >
                    </select>
                </span>

            </div>
        </div>
        <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
            <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small>
        <hr>
        <input type="button" name="previous" class="previous btn action-button" value="Previous" />
        <input name="next" id="pInfo" class="next btn action-button" readonly value="Next" />
        <input type="button" name="bc" id="profileToSum" class=" action-button backToSum" value="Summary" />
    </fieldset>

    <!-- Resource  -->
    <fieldset id="resoucefield">
        <div class="card-header">
            <h3 class="mb-0 text-center">Asset Information</h3>
            <small class="mb-0 text-center">Please enter details of the asset for this DUC profile</small>
        </div>
        <div id="resources" class="p4"></div>
        <div class="form-row mt-4">
            <div class="col-md-12 col-12 p-2"> 
                <button type="button" id="addAsset" class="p-1 addAsset"><i class="fas fa-plus"></i> Asset </button>
            </div>
        </div>
        <hr style="height:1px;border:none;color:#333;background-color:#333;" />

        <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
            <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small>

        <hr>
        <input type="button" name="previous" class="previous btn action-button" value="Previous" />
        <input name="next" id="dataInfo" class="next btn action-button" readonly value="Next" />
        <input type="button" id="dataToSum" name="bc" class="btn action-button backToSum" value="Summary" />
    </fieldset>
    <fieldset id= "selectionfield">
        <div class="card-header">
            <h3 class="mb-0 text-center">Select Use Condition Terms</h3>
            <p class="nowrap text-center text-muted">Please select use condition terms group or define your own.</p>
        </div>
        <div id="selection" class="row">
            <div class="col-6 ml-0 p-1 text-justify chkbox">
                <h5 class="text-center p-1 bg-gradient-dark">System Terms</h5>
                <input type="checkbox" id="cce" class="tsel" name="cce" value="cce">
                <label for="cce">CCE terms v1       <small class="text-info ml-3"><a data-toggle="modal" href="#" class="termM" id="cceTermModal"><i class="fas fa-info-circle"></i></a></small></label><br>
                <input type="checkbox" id="duo" class="tsel" name="duo" value="duo">
                <label for="duo"> DUC compatible DUO terms      <small class="text-info ml-3"><a data-toggle="modal" href="#" class="termM" id="duoTermModal"><i class="fas fa-info-circle"></i></a></small></label><br>
                <input type="checkbox" class="tsel" id="ico" name="ico" value="ico">
                <label for="ico"> DUC compatible ICO terms       <small class="text-info ml-3"><a data-toggle="modal" href="#" class="termM" id="icoTermModal"><i class="fas fa-info-circle"></i></a></small></label>
                <h5 class="text-center p-1 bg-gradient-dark">User Defined Terms</h5>

                <div class="form-group">
                    <label for="userEmail">Please enter a valid email to use/create your own Terms:</label>
                    <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="username@email.com">
                    <label id="email-error" class="error" hidden for="userEmail">Please enter a valid email.</label>
                </div>
                <div id="userlist">

                </div>
                <!-- <input type="checkbox" id="udef" name="udef" value="udef"> <label for="udef">User defined terms (unrestricted)</label> -->
            </div>
            <div class="col-6 border-left text-center">
            <input name="fetch_terms" id="fetch_terms" readonly disabled class="btn action-button w-auto" value="Use Saved Terms"/><br>
            <input name="create_terms" id="create_terms" readonly disabled class="btn action-button w-auto" value="Create New Terms"/><br>
            </div>
        </div>
        <!-- <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
            <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small> -->
        <hr>
        <input type="button" name="previous" class="previous btn action-button" value="Previous" />
        <input name="next" id="selectionToCon" readonly class="next btn selectionToCon action-button" value="Next" />
        <input type="button" name="bc" id="profileToSum" class=" action-button backToSum" value="Summary" />
    </fieldset>
    <fieldset id="conField">
        <div class="card-header">
            <h3 class="mb-0 text-center">Condition of Use Statements</h3>
            <p class="nowrap text-center text-muted">Create Condition of Use Statement using the following format: Considering the stated <b>[conditionTerm]</b>, for which the details are <b>[conditionParameter]</b>, this form of use is set by <b>[rule]</b>, and applies to the <b>[scope]</b> of the asset.</p>
        </div>
        <div id="conditions" class="p4 conClass">
        <?= $this->include('addCon/condition') ?>
        </div>
        <div class="form-row mt-4">
            <div class="col-md-12 col-12"> 
                <button type="button" id="addcon" class="p-1 addcon"><i class="fas fa-plus"></i> Use Statement</button>
            </div>
        </div>
        <hr style="height:1px;border:none;color:#333;background-color:#333;" />
        <!-- <div class="form-row">
            <div class="form-group col-md-12 col-12">
                <span>
                    <label for="cce_comment">Comments Regarding CCE:</label>
                    <textarea name="cce_comment" id="cce_comment" class="form-control" cols="30" rows="3"></textarea>
                </span>

            </div>
        </div> -->
        <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
            <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small>
        <hr>
        <input type="button" name="previous" class="btn previous action-button" value="Previous" />
        <input type="button" id="conInfo" name="next" readonly class="btn next action-button" value="Next" />
        <input type="button" name="bc" id="conToSum" name="bc" class="btn action-button backToSum" value="Summary" />
    </fieldset>
    <fieldset id="summaryField">
        <div class="card-header">
            <h3 class="mb-0 text-center">Summary</h3>
            <small class="text-muted">Please review your DUC profile. </small>
        </div>
        <div class="form-row">
            <div id="summary mt-3 mb-2" class="col-12">
                <table class="table table-striped table-bordered col-12">
                    <colgroup>
                        <col span="1">
                        <col span="1">
                        <col span="1">
                        <col span="1">
                        <col span="1">
                        <col span="1">
                    </colgroup>
                    <thead class="thead-dark" style="display: none;">
                        <tr class="row">
                            <th scope="col">Input</th>
                            <th scope="col">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <thead class="mt-2">
                            <tr>
                                <td colspan="6">
                                    <div class="form-row" colspan=2>
                                        <div class="col-1"></div>
                                        <h4 class="col-10 text-center">User Information</h4>
                                        <i id="edituserinfo" class="fas fa-edit edit btn btn-small btn-outline-success  float-right"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </tbody>
                    <tbody id="userinfobody"></tbody>
                    <tbody>
                        <thead class="mt-2">
                            <tr>
                                <td colspan="6">
                                    <div class="form-row" colspan=2>
                                        <div class="col-1"></div>
                                        <h4 class="col-10 text-center">Profile Information</h4>
                                        <i id="editpinfo" class="fas fa-edit edit btn btn-small btn-outline-success  float-right"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </tbody>
                    <tbody id="pinfobody"></tbody>
                    <tbody>
                        <thead>
                            <tr>
                                <td colspan="6">
                                    <div class="form-row " colspan=2>
                                        <div class="col-1"></div>
                                        <h4 class="col-10 text-center">Resource Information</h4>
                                        <i id="editdatasetinfo" class="fas fa-edit edit btn btn-small btn-outline-success float-right"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </tbody>
                    <tbody id="datainfobody"></tbody>

                    <tbody>
                        <thead class="mt-2">
                            <tr>
                                <td colspan="6">
                                    <div class="form-row" colspan=2>
                                        <div class="col-1"></div>
                                        <h4 class="col-10 text-center">Use Statements</h4>
                                        <i id="editconinfo" class="fas fa-edit edit btn btn-small btn-outline-success  float-right"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </tbody>
                    <tbody id="conditionbody"></tbody>
                </table>

            </div>
        </div>
        <hr>
        <input type="button" name="previous" class="btn previous action-button" value="Previous" />
        <button type="submit" disabled style="display: none" aria-hidden="true"></button>
        <input type="button" name="vjson" class="btn action-button" id="vjson" value="Submit" />


    </fieldset>
    <input type="hidden" name="profile" id="jsn">
    <!-- <input type="hidden" name="p_id" id ="pid"> -->
    <div class="modal" id="viewJson" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content1 ">
                <div class="modal-header">
                    <h5 class="modal-title">DUC Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div id="jbody"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="svjson" class="btn btn-primary">Save Profile</button>
                    <div class="dropdown">
                        <button type="dropbtn" id="dson" class="btn dropbtn btn-info">Download Profile</button>
                        <div class="dropdown-content">
                            <a href="#" id="jsdld">JSON</a>
                            <a href="#" id="exdld">Excel</a>
                            <!-- <a href="#">Link 3</a> -->
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- Create Term Modal -->

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

<!-- DataLevelModal -->

<div class="modal fade " id="DataLevelModal" tabindex="-1" role="dialog" aria-labelledby="DataLevelLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="DataLevelModal">Definition of Datatype </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body " style="max-height: 50vh !important; overflow-y:scroll">
                <table class="table table-bordered  table-responsive">
                    <thead>
                        <tr>
                            <th style="width:25% !important" scope="col">Data Level</th>
                            <th scope="col">Definition</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>UNKNOWN</td>
                            <td>This level should be set where the user does not know the asset type. </td>
                        </tr>
                        <tr>
                            <td>DATABASE</td>
                            <td>This should be used for assets that are a structured set of set of records or data typically held in a computer readable format, such that they can be searched.</td>
                        </tr>
                        <tr>
                            <td>METADATA</td>
                            <td>A set of data that describes or gives information about other data (e.g., the database consists of 13,000 records, recorded in the comma separated format).</td>
                        </tr>
                        <tr>
                            <td>SUMMARISED</td>
                            <td>This is a set of records that contain summarised information about another asset to which they relate. For example, a collection of abstracts would be “SUMMARISED” dataset about the papers to which they refer. Whereas, information about how many papers or what format they were recorded in (e.g., PDF) would be METADATA.</td>
                        </tr>
                        <tr>
                            <td>DATASET</td>
                            <td>This relates to the direct measurements collected from an experiment or other such observations.</td>
                        </tr>
                        <tr>
                            <td>RECORDSET</td>
                            <td>This is a collection of individual records.</td>
                        </tr>
                        <tr>
                            <td>RECORD</td>
                            <td>A piece of evidence about a past event (such as an observation, experiment, or interview for example) kept in a permanent form.</td>
                        </tr>
                        <tr>
                            <td>RECORDFIELD</td>
                            <td>A container for a specified attribute of the record.</td>
                        </tr>
                        <tr>
                            <td>MATERIALS</td>
                            <td>This relates to any asset that is a physical entity that is available for subsequent use or inspection. </td>
                        </tr>
                        <tr>
                            <td>OTHER</td>
                            <td>This type should be used where the “type” of an asset is known but it does not fit any of the other predefined categories.</td>
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

<!-- <script src="<?php echo base_url('assets/js/getdata.js') ?>"></script> -->
<script>
    $('#reset_query').click(function() {
        location.reload();
    });
    //     var r = ["OBLIGATED", "PERMITTED",  "FORBIDDEN"]


    $(document).ready(function() {
        $('#infoP').popover({
            title: "<h6>Condition Rule Information</h6>",
            content: `<p>
                    <b>• Forbidden</b> – this strictly prohibits the stated use. <br>
                    <b>• Permitted </b>– Indicates that the permission is absolute and universal.<br>
                    <b>• Obligated </b>– Indicates that not only is a use permitted but that it MUST be performed in practice.<br>
                    <b>• No Stated Rule </b>– No rule specified for this term.<br>
                    </p>`,
            html: true,
            animation: true,

        })

        // $('#p_date').val(new Date().toDateInputValue());
        // $('#p_ludate').val(new Date().toDateInputValue());
    })
</script>

<?= $this->endSection() ?>