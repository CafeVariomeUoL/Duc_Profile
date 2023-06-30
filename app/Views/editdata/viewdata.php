<?php

/**
 * @author Umar Riaz
 * Created at 16/03/2021
 * 
 */

$this->session = \Config\Services::session();

?>
<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>

<fieldset class="card" id="sumpage">
    <div class="card-header">
        <?php $referred_from = $this->session->get('previous_url'); ?>
        <a href="<?php echo $referred_from ?>" class="btn btn-small btn-outline-success float-left"><i class="fas fa-arrow-left"></i></a>
        <h4 class="mb-0 text-center">DUC Profile</h4>
        <small class="text-muted">Please download or edit the profile. </small>
    </div>
    <div class="form-row card-body">
        <div id="summary mt-3 mb-2" class="col-12">
            <table class="table table-striped table-bordered col-12">
                <colgroup>
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 80%">
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
                            <td colspan="2">
                                <div class="form-row" colspan=2>
                                    <h4 class="col-11 text-center">User Information</h4>
                                    <i id="edituserinfo" class="fas fa-edit edit btn btn-small btn-outline-success  float-right" data-toggle="modal" data-target="#userInfoModal"></i>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </tbody>
                <tbody id="userinfobody"></tbody>
                <tbody>
                    <thead>
                        <tr>
                            <td colspan="2">
                                <div class="form-row " colspan=2>
                                    <h4 class="col-11 text-center">Profile Information</h4>
                                    <i id="editprofileinfo" data-toggle="modal" data-target="#profileInfoModal" class="fas fa-edit edit btn btn-small btn-outline-success float-right"></i>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </tbody>
                <tbody id="profileinfobody"></tbody>

                <tbody>
                    <thead class="mt-2">
                        <tr>
                            <td colspan="2">
                                <div class="form-row" colspan=2>
                                    <h4 class="col-11 text-center">Asset Information</h4>
                                    <!-- perInfoModal -->
                                    <i id="editassetinfo" data-toggle="modal" data-target="#assetInfoModel" class="fas fa-edit edit btn btn-small btn-outline-success  float-right"></i>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </tbody>
                <tbody id="assetbody"></tbody>
                <tbody>
                    <thead class="mt-2">
                        <tr>
                            <td colspan="2">
                                <div class="form-row" colspan=2>
                                    <h4 class="col-11 text-center">Condition of Use Statements</h4>
                                    <!-- conInfoModal -->
                                    <i id="editconinfo" data-toggle="modal" data-target="#ConInfoModal" class="fas fa-edit edit btn btn-small btn-outline-success  float-right"></i>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </tbody>
                <tbody id="conditionbody"></tbody>

            </table>
        </div>
    </div>

    <!-- Modal User -->
    <div class="modal fade" id="userInfoModal" tabindex="-1" role="dialog" aria-labelledby="UserInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content1  ">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update User Information</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userUpdate" class="mform" action="<?php echo base_url('Update/updateuser'); ?>" method="post">
                        <div class="form-row mt-1 p-0">
                            <!-- <div class="form-group col-md-6 col-6 col-12">
                                <label for="u_role">Role:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="text" class="form-control" required name="u_role" id="u_role" placeholder="Please specify you role" value=<?php echo $userinfo->{'u_role'} ?>>
                            </div> -->
                            <div class="form-group col-md-12 col-12 col-12">
                                <label for="u_email">Email:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="email" class="form-control" required name="u_email" id="u_email" placeholder="Please enter email" value=<?php echo $userinfo->{'u_email'} ?>>
                            </div>
                        </div>
                        <div class="form-row mt-3 p-0">
                            <div class="form-group col-md-6 col-6 col-12">
                                <input type="number" name="u_id" class="backvalue" value=<?php echo $userinfo->{'u_id'} ?>>
                                <input type="number" class="backvalue" name="p_id" value=<?php echo $profile->{'p_id'} ?>>
                                <label for="u_fname">First Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="text" class="form-control" required name="u_fname" id="u_fname" placeholder="Please enter first name" value=<?php echo $userinfo->{'u_fname'} ?>>
                            </div>
                            <div class="form-group col-md-6 col-6 col-12">
                                <label for="u_lname">Last Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="text" class="form-control" required name="u_lname" id="u_lname" placeholder="Please enter last name" value=<?php echo $userinfo->{'u_lname'} ?>>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="UpdateUserInfo" class="btn btn-primary">Update</button> </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Model -->
    <div class="modal fade" id="profileInfoModal" tabindex="-1" role="dialog" aria-labelledby="UserInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content1">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update Profile Information</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="profileUpdate" class="mform" action="<?php echo base_url('Update/updateprofile'); ?>" method="post">
                        <div class="form-row mt-3 p-0">
                            <div class="form-group col-md-6 col-6 col-12">
                                <input type="number" name="u_id" class="backvalue" value=<?php echo $userinfo->{'u_id'} ?>>
                                <input type="number" class="backvalue" name="p_id" value=<?php echo $profile->{'p_id'} ?>>
                                <!-- <input type="date" class="backvalue"  value="<?php echo date('Y-m-d'); ?>" name="p_ludate" id="p_ludate"> -->
                                <!-- <input type="date" class="backvalue"  value="<?php echo date('Y-m-d'); ?>" name="p_date" id="p_date"> -->
                                <label for="p_name">Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="text" class="form-control" required name="p_name" id="p_name" placeholder="Please enter profile name">
                                <input type="hidden" name="profile" id="p_jsn">
                                <input type="date" class="form-control" hidden name="p_date" id="p_date" placeholder="Please enter profile created date">
                                <input type="text" hidden class="form-control" name="pr_id" id="pr_id" placeholder="Please enter profile id.">
                            </div>
                            <div class="form-group col-md-6 col-6 col-12">
                                <label for="p_version">Version:</label>
                                <input type="text" class="form-control" name="p_version" id="p_version" placeholder="Please specify profile version">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="sumbit" id="UpdateProfileInfo" class="btn btn-primary">Update</button> </form>
                </div>
            </div>
        </div>
    </div>
    <!-- pModel End -->

    <!-- resource Model -->
    <div class="modal fade" id="assetInfoModel" tabindex="-1" role="dialog" aria-labelledby="UserInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content1">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update Asset Information</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="assetUpdate" class="mform" action="<?php echo base_url('Update/updateasset'); ?>" method="post">
                        <div class="form-row mt-3 p-0">
                            <div class="form-group col-md-6 col-sm-12 col-12">
                                <input type="number" name="u_id" class="backvalue" value=<?php echo $userinfo->{'u_id'} ?>>
                                <input type="number" class="backvalue" name="p_id" value=<?php echo $profile->{'p_id'} ?>>
                                <input type="text" class="backvalue" required name="p_name" value=<?php echo $profile->{'p_name'} ?>>
                                <input type="hidden" name="profile" id="a_jsn">
                            </div>
                        </div>
                        <div id="resources"></div>
                        <hr>
                    <div class="form-row mt-4">
                        <div class="col-md-12 col-12 p-2"> 
                        <button type="button" id="addAsset" class="p-1 addAsset"><i class="fas fa-plus"></i> Asset </button>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="UpdateAssetInfo" class="btn btn-primary">Update</button> </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Resource Model End -->

    <!-- Condition Model -->

    <div class="modal fade" id="ConInfoModal" tabindex="-1" role="dialog" aria-labelledby="UserInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content1">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update Conditions</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                    <div id="selection" class="row">
                        <div class="col-6 ml-0 p-1 text-justify chkbox">
                        <h5 class="text-center p-1 bg-gradient-dark">System Terms</h5>
                        <input type="checkbox" id="cce" class="tsel" name="cce" value="cce">
                        <label for="cce">CCE terms v1       <small class="text-info ml-3"><a data-toggle="modal" href="#" class="termM" id="cceTermModal"><i class="fas fa-info-circle"></i></a></small></label><br>
                        <input type="checkbox" id="duo" class="tsel" name="duo" value="duo">
                        <label for="duo"> DUC compatible DUO terms      <small class="text-info ml-3"><a data-toggle="modal" href="#" class="termM" id="duoTermModal"><i class="fas fa-info-circle"></i></a></small></label><br>
                        <input type="checkbox" class="tsel" id="ico" name="ico" value="ico">
                        <label for="ico"> DUC compatible ICO terms       <small class="text-info ml-3"><a data-toggle="modal" href="#" class="termM" id="icoTermModal"><i class="fas fa-info-circle"></i></a></small></label>
                        


                        <!-- <input type="checkbox" id="udef" name="udef" value="udef"> <label for="udef">User defined terms (unrestricted)</label> -->
                        </div>
                        <div class="col-6 p-1 border-left">
                            <h5 class="text-center p-1 bg-gradient-dark">User Defined Terms</h5>
                            <div class="form-group">
                                <label for="userEmail">Please enter a valid email to use your own Terms:</label>
                                <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="username@email.com">
                                <label id="email-error" class="error" hidden for="userEmail">Please enter a valid email.</label>
                            </div>
                            <div id="userlist">

                            </div>
                        <input name="fetch_terms" id="fetch_terms" readonly disabled class="btn addcon action-button w-auto mb-3" value="Use Saved Terms"/><br>
                        <!-- <input name="create_terms" id="create_terms" readonly disabled class="btn addcon action-button w-auto" value="Create New Terms"/><br> -->
                        </div>
                    </div> 
                    </div>
                    <form id="conUpdate" class="mform" action="<?php echo base_url('Update/updateconditions'); ?>" method="post">


                        <input type="number" name="u_id" class="backvalue" value=<?php echo $userinfo->{'u_id'} ?>>
                        <input type="number" class="backvalue" name="p_id" value=<?php echo $profile->{'p_id'} ?>>
                        <input type="text" class="backvalue" name="p_name" value=<?php echo $profile->{'p_name'} ?>>
                        <div id="conditions">


                        </div>
                        <div class="form-row mb-4">
                            <div class="col-md-2 col-2"> <button type="button" id="addcon" class="form-control addcon btn btn-light"><i class="fas fa-plus"></i>Condition</button></div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="UpdateConInfo" class="btn btn-primary">Update</button>
                    <input type="hidden" name="profile" id="c_jsn">
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="text-center mb-3">
        <div class="dropdown">
            <button type="dropbtn" id="dson" class="btn dropbtn btn-info">Download Profile</button>
            <div class="dropdown-content">
                <a href="#" id="jsdld">JSON</a>
                <a href="#" id="exdld">Excel</a>
                <!-- <a href="#">Link 3</a> -->
            </div>
        </div>

    </div>
    <hr>
</fieldset>
<script>
    $.fn.modal.Constructor.prototype._enforceFocus = function () { };
    var d = <?php echo json_encode($profile) ?>;
    var u = <?php echo json_encode($userinfo) ?>;
    var JsonFromDb = JSON.parse(d['p_data'])
    var data = JsonFromDb.profile;
    var conInfo = data.conditions;
    var assetInfo = data.assets;
    var profileInfo = [];
    console.log(data);
    var item ={}; 
    $.each(data, (i,v)=>{
        if(i == "conditions" || i == "assets"){
          return;
        }else{
          item[i] = v;
        }
        
    })

    profileInfo.push(item);
    setUser();
    setCon();
    setAssets();
    setProfile();
    
// Function to se options for select input fields   
function setOptions(selector, arr) {
    if (Array.isArray(arr)) {
        $.each(arr, function(key, value) {
            var o = new Option(value, value, true, true);
            selector.append(o).trigger('change');
            selector.change();
        })
    } else {
        var e = arr;
        var o = new Option(e, e, true, true);
        selector.append(o).trigger('change');
        selector.change();
    }
}
// Function to set conditions
function setCon(){
    // let terms = [];
    // let rule = ["Obligatory", "Permitted", "Forbidden", "No Requirements"]
    var c = 1;
    var xyz = [];
    console.log(conInfo);
    xyz = conInfo.sort(function(a, b) {
        if (a.conditionTermLabel != undefined) {
            var textA = a.conditionTermLabel.toUpperCase();
            var textB = b.conditionTermLabel.toUpperCase();
            return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        }
        if (a.useConditionLabel != undefined) {
            var textA = a.useConditionLabel.toUpperCase();
            var textB = b.useConditionLabel.toUpperCase();
            return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;

        }
    });
    $.each(xyz, function(x) {
        var t = xyz[x]["conditionTermLabel"] != undefined ? xyz[x]["conditionTermLabel"]:"";
        var d = xyz[x]["conditionParameter"] != undefined ? xyz[x]["conditionParameter"]:"";
        var role = xyz[x]["rule"] != undefined ? xyz[x]["rule"] : '';
        var scp = xyz[x]["scope"] != undefined ? xyz[x]["scope"] : '';
        let s = $('#conditions').children().length;
        $('#conditionbody').append(`
            <tr>
            <td><b>Condition ${c}</b></td>
            <td class="text-left">Term: ${t} || Rule: ${role} || Scope:${scp},  || Parameter: ${d}</td>
            </tr>
        `);
        $("#conditions").append(`
            <div class="congroup" id="con${c}">
            <div class="form-row mt-3">
                <div class="col-12">
                <legend class="col-6 col-md-2 ltext" visible="true">Statement ${s + 1}</legend>
                <div class="couter removeCon float-right"> <div class="cinner"><label>Remove</label></div></div>
                </div>
            </div>
            <div class="conInfo">
                <div class="form-row ml-2 mr-2">
                    <div class="form-group form-groupC col-md-4 col-sm-12 col-12">
                        <span id="c_term${c}">
                            <label for="r_dlevel">Use Condition:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                            <select name="c_term" multiple="multiple" required class="form-control c_term">
                                <option></option>
                            </select>
                        </span>
                    </div>
                    <div class="form-group form-groupC ruleG col-md-4 col-sm-12 col-12 " id="ruleG${c}">
                    <span id="c_appli${c}">
                        <input type="text" name="c_ava" class="form-controle backvalue">
                    </span>
                    <span id="c_rule${c}">
                        <label for="c_rule">Rule:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small><small class="text-info ml-3"><a data-toggle="modal" data-trigger="focus" href="#infoModal"><i class="fas fa-info-circle"></i></a></small></label>
                        <select name="c_rule" required class="form-control c_rule">
                            <option></option>
                        </select>
                    </span>
                </div>
                <div class="form-group form-groupC col-md-4 col-sm-12 col-12">
                <span id="c_ruleScope1">
                    <label for="c_rscope">Scope:</label><small class="text-danger"><i class="fas fa-star fa-xs"></i></small>
                    <select name="c_rscope" required  class="form-control c_rscope">
                    <option></option>
                    </select>
                </span>
                </div>
                </div>
                <div class="form-row ml-2 mr-2">
                <div class="form-group form-groupC col-md-12 col-sm-12 col-12">
                <span id="c_detail${c}">
                    <label for="c_detail">Condition Parameter:</label>
                    <textarea type="textarea" rows="1" maxlength="250" class="form-control c_detail" name="c_detail"
                        placeholder="Please enter qualifiers for the use condition (optional)">${d}</textarea>
                </span>
            </div>
                </div>
            </div>
        </div>
      `);
      let termInput = $('#con'+c).find('.c_term');
      let ruleInput = $('#con'+c).find('.c_rule');
      let scopeInput = $('#con'+c).find('.c_rscope');
      setOptions(termInput,t);
      setOptions(ruleInput,role);
      setOptions(scopeInput,scp);
      c++;
    })

        var terms = [];
        var rule = ["Obligated", "Permitted", "Forbidden", "No Requirements"]
        $(".c_term").select2({
            placeholder: "Please select use condition",
            theme: "bootstrap",
            width: "100%",
            tags: true,
            tokenSeparators: [",", ";"],
            maximumSelectionLength: 1,
            data: terms
        });
        $(".c_rule").select2({
            placeholder: "Please select condition rule",
            theme: "bootstrap",
            width: "100%",
            data: rule
        });

   
      autosize($('.c_detail'));
      autosize($('.r_detail'));

      if ($('#conditions').hasScrollBar()) {

        $('#conditions').get(0).scrollTop = $('#conditions').get(0).scrollHeight;

      }


}

// Function to se options for select input fields   End Here
$('#UpdateConInfo').on('click', function () {
    let cInputs = $('#conditions').find('.congroup');
    let ArrOfCons = [];
    $.each(cInputs,function(i,v){
        let cObject ={};
        var inputElements = v.querySelectorAll("input, select, textarea");
        $.each(inputElements,function(i,v){
            var input = $(v);
            var name = input.parent().find("label").text().slice(0, -1);
            var value = input.val();
            if(name == "Use Condition"){cObject["conditionTermLabel"] = value[0];}
            if(name == "Rule"){cObject["rule"] = value;}
            if(name == "Scope"){cObject["scope"] = value;}
            if(name == "Condition Parameter"){cObject["conditionParameter"] = value;}
        });
        ArrOfCons.push(cObject);
    })
    let nc= {};
    nc["c"] = ArrOfCons;
    let newJson = JsonToUpdate(JsonFromDb,nc);
    console.log(newJson);
    $('#c_jsn').val(newJson);
    if ($("#conUpdate").valid()) {
        $('#conUpdate').submit();
        $('#c_jsn').val('');
        ('#ConInfoModal').modal('hide');
    } else {
        alert("Please fill all mandatory fields") 
    }

});


//  Function to add Assets to the body 

function setAssets(){

    $.each(assetInfo,(i,v)=>{
        var name = v["assetName"] != undefined ? v["assetName"] : '';
        var des = v["assetDescription"] != undefined ? v["assetDescription"] : '';
        var ref = v["assetReferences"] != undefined ? v["assetReferences"] : '';
        var uri = v["assetURI"] != undefined ? v["assetURI"] : '';
        console.log(ref);

        $('#assetbody').append(`
        <tr>
        <td><b>Asset ${i+1}</b></td>
        <td class="text-left">Name: ${name} ||  Description: ${des} || References: ${ref} || URI : ${uri} </td>
        </tr>

        `);

        $('#resources').append(` <div class=" resgroup" id="res${i+1}">
                    <div class="form-row mt-3">
                         <div class="col-12">
                         <legend class="col-6 col-md-2 ltext" visible="true">Asset ${i + 1}</legend>
                         <div class="couter removeRes float-right"> <div class="cinner"><label>Remove</label></div></div>
                         </div>
                    </div>
                    <div class="ainfo">
                    <div class="form-row mt-3 p-0">
                        <div class="form-group col-md-6 col-sm-12 col-12">
                            <label for="r_name">Asset Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                            <input type="text" name="r_name" required id="r_name" value="${name}" placeholder="Please enter asset name." class="form-control">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-12">
                            <label for="r_des">Asset Description:</label>
                            <input type="text" name="r_des" id="r_des"  value="${des}" placeholder="Please enter asset description." class="form-control">
                        </div>
                    </div>
                    <div class="form-row 1 p-0">
                            <span class="form-group col-md-6 col-6 col-6" id="p_reflist">
                                <label for="p_refs">Asset References:</label>

                                <select name="p_refs[]" id="p_refs${i}"  class="form-control p_refs" multiple="multiple">
                                </select>
                            </span>
                            <span class="form-group col-md-6 col-6 col-6" id="p_reflist">
                                <label for="p_refs">Asset Uri:</label>
                                <input type="url" name="a_uri"   value="${uri}" id="a_uri" placeholder="https://www.example.com" class="form-control">
                            </span>
                    </div>
                    </div>
               </div>`);

        let refList = $("#p_refs"+i);
        setOptions($("#p_refs"+i), ref);

    })

    $(".p_refs").select2({
        placeholder: "Please enter reference and press enter",
        tags: true,
        tokenSeparators: [",", ";"],
        theme: "bootstrap",
        width: '100%'
    });


}


$('#UpdateAssetInfo').on('click',function(){
    let allAssets = $('#resources').find('.resgroup');
    let ArrOfAssets = [];
    $.each(allAssets,function(i,v){
        let aObject ={};
        var inputElements = v.querySelectorAll("input, select, textarea");
        $.each(inputElements,function(i,v){
            var input = $(v);
            var name = input.parent().find("label").text().slice(0, -1);
            var value = input.val();

            if(name == "Asset Name"){
                aObject["assetName"] = value;
            }
            
            if(name == "Asset Description"){
                aObject["assetDescription"] = value;
            }
            
            if(name == "Asset References"){
                aObject["assetReferences"] = value;
            }
            
            if(name == "Asset Uri"){
                aObject["assetURI"] = value;
            }
          
        })

        ArrOfAssets.push(aObject);
    })

    var na = {};
    na["a"] =ArrOfAssets;
    let newJson = JsonToUpdate(JsonFromDb,na);
    console.log(newJson);
    $('#a_jsn').val(newJson);
    if ($("#assetUpdate").valid()) {
        $('#assetUpdate').submit();
        $('#a_jsn').val('');
        ('#assetInfoModel').modal('hide');
    } else {
        alert("Please fill all mandatory fields") 
    }
});

// Function to set Profile
function setProfile(){
    $('#profileinfobody').empty();
    console.log(profileInfo[0])
    const pEntries = Object.fromEntries(
        Object.entries(profileInfo[0]).map(([key, val]) => [ key = formateName(key), val]),
    );
    for (const [key, value] of Object.entries(pEntries)) {
        $("#profileinfobody").append(`
        <tr>
        <td><b>${key}</b></td>
        <td class="text-left">${value}</td>
        </tr>
        `);
    }
    $('#p_name').val(pEntries['Profile Name']);
    $('#p_version').val(pEntries['Profile Version']);
    $('#pr_id').val(pEntries['Profile Id']);   
    $('#a_lang').val(pEntries['Language']);
    $('#r_pmode').val(pEntries['Permission Mode']);
    setOptions($('#a_lang'),pEntries['Language']);
}
//UpdateProfileInfo
$('#UpdateProfileInfo').on('click', function() {
    
    const today = new Date();
    let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    console.log(date);
    console.log("Profile is being Updated");
    var np = {};
    np["p"] ={};
    np["p"]['profileName'] = $("#p_name").val();
    np["p"]['profileVersion'] = $("#p_version").val();
    np["p"]['profileId'] = $("#pr_id").val();
    np["p"]['creationDate'] = data.creationDate;
    np["p"]['permissionMode'] = $("#r_pmode").val();
    np["p"]['language'] = $("#a_lang").val();
    np["p"]['lastUpdated'] = date;
    np["p"]['ducVersion']="0.0.1";

    let newJson = JsonToUpdate(data,np);

    $('#p_jsn').val(newJson);
    console.log( $('#p_jsn').val());
    if ($("#profileUpdate").valid()) {
        $('#profileUpdate').submit();
        $('#p_jsn').val('');
        ('#profileInfoModal').modal('hide');
    } else {
        alert("Please fill all mandatory fields") 
    }

});

function setUser(){
    $("#userinfobody").append(`
           <tr>
                <td><b>First Name</b></td>
                <td class="text-left">${u['u_fname']}</td>
           </tr>
           <tr>
                <td><b>Last Name</b></td>
                <td class="text-left">${u['u_lname']}</td>
           </tr>
           <tr>
                <td><b>Email</b></td>
                <td class="text-left">${u['u_email']}</td>
           </tr>
`);
}

function formateName(name){

    switch (name) {
        case "profileName":
            return "Profile Name";            
            break;
        case "profileVersion":
            return "Profile Version";
            break;
        case "creationDate":
            return "Creation Date";
            break;
        case "lastUpdated":
            return "Last Updated";
            break;
        case "permissionMode":
            return "Permission Mode";
            break;
        case "language":
            return "Language";
            break;
        case "profileId":
            return "Profile Id";
            break;
        case "ducVersion":
            return "Duc Version";
            break;
        default:
            return name;
            break;
    }

}

function dateString2Date(dateString) {
    // console.log(dateString)
    const dt = dateString.split(/\-|\s/);
    const dtString = dt[2]+"/"+dt[1]+"/"+dt[0]
    return dtString;
}

$(document).on('click', '#editprofileinfo', ()=>{})
</script>
<!-- <script id="viewScript" src="<?php echo base_url('assets/js/viewdata.js') ?>"></script> -->
<?= $this->endSection() ?>