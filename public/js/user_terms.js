$(function () {
    $.fn.modal.Constructor.prototype._enforceFocus = function () { };
    //TermModals viewing 
    $(document).on('click', '.termM', function () {
        // alert($(this).attr("id"));
        let id = $(this).attr("id");
        if (id.startsWith('user')) {
            let v = $(this).closest('.form-row').find('.hidden').html();
            console.log(JSON.parse(v));
            termsArr = JSON.parse(v);
        } else {
            switch (id) {
                case 'cceTermModal':
                    termsArr = cceTerms;
                    break;
                case 'icoTermModal':
                    termsArr = icoTerms;
                    break;
                case 'duoTermModal':
                    termsArr = duoTerms;
                    break;
                default:
                    break;
            }
        }
        $('#termModalBody').empty();
        $('#TermModal').modal({
            show: true
        })
    });

    $('#TermModal').on('show.bs.modal', function (event) {
        $.each(termsArr, (i, v) => {
            $('#termModalBody').append(`
                <tr>
                    <td>${v.Term}</td>
                    <td>${v.Des}</td>
                </tr>
            `);
        })
        $("#TermModal").on('hidden.bs.modal', function () {
            $('#termModalBody').empty();
        });
    })
    //TermModals viewing 

    $('#udef').click(function () {
        //check if checkbox is checked
        if ($(this).is(':checked')) {
            $('#fetch_terms').removeAttr('disabled'); //enable input
            $('#create_terms').removeAttr('disabled'); //enable input     
        } else {
            $('#fetch_terms').attr('disabled', true); //disable input
            $('#create_terms').attr('disabled', true); //disable input
        }
    });
    $('#create_terms').on('click', function () {

        $('#createTerms').modal({
            show: true
        })
    })

    // Email Validation
    $("#userEmail").on("keyup change", function (e) {
        // do stuff!

        let valid = validateEmail($(this).val())
        if (valid) {
            $('#fetch_terms').removeAttr('disabled'); //enable input
            $('#create_terms').removeAttr('disabled'); //enable input 
            $('#email-error').attr('hidden', true); //enable input 
        } else {
            // $('#email-error').show();
            $('#email-error').removeAttr('hidden');
            $('#fetch_terms').attr('disabled', true); //disable input
            $('#create_terms').attr('disabled', true); //disable input   
        }
    })

    // fetchTerms
    $('#fetch_terms').on('click', async ()=> {
        $('#userlist').empty();
        let email = $("#userEmail").val();
        var passcode = await CheckPassCode().then((r) => {
            return r
        })
        await validUser(email, passcode).then((r) => {
            if(r){
                var req = $.ajax({
                    url: base_url + "/GetTerms/userterms/" + email,
                    type: "GET",
                    dataType: "json"
                }).done(function (res) {
                    if (res.length > 0) {
                        $.each(res, function (r) {
                            console.log(res[r]);
                            var term = JSON.parse(res[r].terms);
                            $('#userlist').append(
                                `<div class="form-row">
                            <input type="checkbox"  class="uterm tsel"  id ="userT${r + 1}"value="${res[r].t_name}}">
                            <label class="ml-2" for="userT${r + 1}"> ${res[r].t_name}
                                <small class="text-info ml-3">
                                    <a data-toggle="modal" href="#" class="termM" id="userT${r + 1}">
                                       <i class="fas fa-info-circle"></i>
                                    </a>
                                </small>
                                <small class="text-info ml-3">
                                    <a data-toggle="modal" href="#" class="termE" id="userT${r + 1}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </small>
                                <small class="text-info ml-3">
                                <a data-confirm="Are you sure to delete this item?" href="#" class="termD  text-danger" id="userT${r + 1}">
                                   <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </small> 
                            </label>
                            <div class="hidden u_tjson json"> ${res[r].terms}</div>
                            <input type="hidden" class="t_id" value="${res[r].id}">
                            <input type="hidden" class="u_email" value="${res[r].u_email}">
                            <input type="hidden" class="t_name" value="${res[r].t_name}">
                        </div>
                        `
        
                            );
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'You do not have any saved terms, Please create new Terms or use different email.',
                        })
                    }
                })

            }
        })
    })

    //createTerms 

    $(document).on('click', '#addterm', function () {
        //    .tInfo
        let t = $('#userTerms').children().length;
        $("#userTerms").append(`
      <div class="termG card m-auto">
            <div class="form-row mt-3">
               <div class="col-12">
                    <legend class="ltext" visible="true">Term ${t + 1}</legend>
                    <div class="couter removeTerm float-right">
                        <div class="cinner">
                            <label>Remove</label>
                        </div>
                    </div>
               </div>
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
      
      `);
        if ($('#userTerms').hasScrollBar()) {

            $('#userTerms').get(0).scrollTop = $('#userTerms').get(0).scrollHeight;

        }
    })

    $(document).on('click', '.removeTerm', function () {
        let s = $('#userTerms').children();
        let legend = $(this).closest('.termG').find('.ltext');
        let legendTxt = legend.text();
        let currentIndex = returnIndex(legendTxt);
        var ls = $('.ltext');
        if (currentIndex != ls.length) {

            $.each(s, function (i, v) {

                if (i > currentIndex) {
                    $(v).find('.ltext');
                    let txt = $(v).find('.ltext');
                    $(txt).text('');
                    $(txt).text('Term ' + i);
                }
            })
        }
        $(this).closest('.termG').remove();
    })

    function returnIndex(cl) {
        let n = cl.split(' ');
        let i = parseInt(n[1]) - 1;
        return i;
    }


    // Saving Terms 

    $(document).on('click', '#saveterm', (e) => {
        e.preventDefault();
        var Termform = $("#termsForm");
        let email = $("#userEmail").val();
        $('#emailtosub').val(email);
        var validator = Termform.validate({
            debug: true,
            success: "valid",
            ignore: []
        });
        if (Termform.valid() === true) {
            var terms = [];
            let termsDivs = $("#userTerms").find('.termG');
            $.each(termsDivs, (i) => {
                var inputs = termsDivs[i].querySelectorAll("input, select,textarea");
                let item = {};
                $.each(inputs, function (i) {
                    var input = $(this);
                    $(this).closest('span').css("background-color", "");
                    // var nm = input.attr('name');
                    var name = input.parent().find("label").text().slice(0, -1);
                    var value = input.val();
                    if (name == "Term") {
                        item["Term"] = value;
                    } else { item["Des"] = value }

                })
                terms.push(item);
            })

            var c = JSON.stringify(terms, null, 2);
            $("#termsJson").val(c);
            console.log(Termform.data());
            submitTerms();
            $('#userTerms').empty();
            $('#createTerms').modal('hide');

        } else { alert("Please fill all required fields") }
    })

    function submitTerms() {
        var name = $("#termGName").val();
        var email = $("#emailtosub").val();
        var terms = $("#termsJson").val();
        $.ajax({
            type: "POST",
            url: base_url + '/AddCon/sava_terms',
            data: { name: name, terms: terms, email: email },
            success: function (data) {
                console.log(data["pass"])
                localStorage.setItem('passcode', data["pass"]);
                Swal.fire(
                    'Saved!',
                    'Your terms has been saved.',
                    'success'
                )
                fetchTermAfterUpdate();
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        });
       

    }

    // Update Terms
    let UpTArr = [];
    let Upemail = '';
    let Upname = '';
    let UpId ='';
    $(document).on('click', '.termE', function () {
        let v = $(this).closest('.form-row').find('.hidden').html();
        Upname = $(this).closest('.form-row').find('.t_name').val();
        Upemail = $(this).closest('.form-row').find('.u_email').val();
        UpId = $(this).closest('.form-row').find('.t_id').val();
        console.log(Upemail);
        console.log(Upname)
        UpTArr = JSON.parse(v);
        $('#updateTerms').modal({
            show: true
        })


    })

    $('#updateTerms').on('show.bs.modal', function (event) {
        $('#upduserTerms').empty();
        $('#utermGName').val(Upname);
        $('#uemailtosub').val(Upemail);
        $.each(UpTArr, function (i, v) {
            console.log(v);
            let t = $('#upduserTerms').children().length;
            let rmbutton = ``;
            if (t > 0) {
                rmbutton = `
                            <div class="couter UpremoveTerm float-right">
                                    <div class="cinner">
                                        <label>Remove</label>
                                    </div>
                            </div>`
            }

            $('#upduserTerms').append(`
            <div class="termG card m-auto">
            <div class="form-row mt-3">
               <div class="col-12">
                    <legend class="ltext" visible="true">Term ${t + 1}</legend>
                    ${rmbutton}
               </div>
            </div>
           <div class="form-row ml-2 mr-2">
              <div class="form-group col-md-6 col-6 col-12">
                  <label for="term">Term:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                  <input type="text" class="form-control" required name="term[]" value="${v["Term"]}"  placeholder="Please enter use condition term">
              </div>
              <div class="form-group col-md-6 col-6 col-12">
                  <label for="t_description">Description:</label>
                  <input type="text" class="form-control" name="t_description[]" value="${v["Des"]}"  placeholder="Please enter use condition term decription">
              </div>
          </div>
      </div>

            `);

        })


    });

    // Update Terms Remove Terms 

    $(document).on('click', '.UpremoveTerm', function () {
        let s = $('#upduserTerms').children();
        let legend = $(this).closest('.termG').find('.ltext');
        let legendTxt = legend.text();
        let currentIndex = returnIndex(legendTxt);
        var ls = $('.ltext');
        if (currentIndex != ls.length) {

            $.each(s, function (i, v) {

                if (i > currentIndex) {
                    $(v).find('.ltext');
                    let txt = $(v).find('.ltext');
                    $(txt).text('');
                    $(txt).text('Term ' + i);
                }
            })
        }
        $(this).closest('.termG').remove();
    })

    // Update Terms Add more Terms
    $(document).on('click', '#updaddterm', () => {
        let t = $('#upduserTerms').children().length;
        let rmbutton = ``;
        if (t > 0) {
            rmbutton = `
                        <div class="couter UpremoveTerm float-right">
                                <div class="cinner">
                                    <label>Remove</label>
                                </div>
                        </div>`
        }
        $("#upduserTerms").append(`
        <div class="termG card m-auto">
              <div class="form-row mt-3">
                 <div class="col-12">
                      <legend class="ltext" visible="true">Term ${t + 1}</legend>
                      ${rmbutton}
                 </div>
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
        
        `);
        if ($('#upduserTerms').hasScrollBar()) {

            $('#upduserTerms').get(0).scrollTop = $('#upduserTerms').get(0).scrollHeight;

        }

    })

    // Update Terms Function

    $(document).on('click', '#updateterm', async (e) => {

        // utermsForm
        e.preventDefault();
        var Termform = $("#utermsForm");
        let email = $("#userEmail").val();
        var validator = Termform.validate({
            debug: true,
            success: "valid",
            ignore: []
        });
        if (Termform.valid() === true) {
            var terms = [];
            let termsDivs = $("#upduserTerms").find('.termG');
            $.each(termsDivs, (i) => {
                var inputs = termsDivs[i].querySelectorAll("input, select,textarea");
                let item = {};
                $.each(inputs, function (i) {
                    var input = $(this);
                    $(this).closest('span').css("background-color", "");
                    // var nm = input.attr('name');
                    var name = input.parent().find("label").text().slice(0, -1);
                    var value = input.val();
                    if (name == "Term") {
                        item["Term"] = value;
                    } else { item["Des"] = value }

                })
                terms.push(item);
            })

            var c = JSON.stringify(terms, null, 2);
            $("#utermsJson").val(c);
            console.log(Termform.data());
            await UpdateTerms();
            $('#upduserTerms').empty();
            $('#updateTerms').modal('hide');


        } else { alert("Please fill all required fields") }

    })

    var UpdateTerms = async () => {
        var name = $("#utermGName").val();
        var email = $("#userEmail").val();
        var terms = $("#utermsJson").val();
        var passcode = await CheckPassCode().then((r) => {
            console.log(r);
            return r
        })
        await validUser(email, passcode).then((r) => {
            
            if (r) {
                $.ajax({
                    type: "POST",
                    url: base_url + '/AddCon/update_terms',
                    data: { id: UpId,name:name, terms: terms, email: email },
                    success: function (data) {
                        Swal.fire(
                            'Updated!',
                            'Your terms has been Updated.',
                            'success'
                        )
                        fetchTermAfterUpdate();

                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                });
            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter correct passcode',
                })

            }

        
        })


    }

    /**
     * Updating Terms validations
     */



    // Delete Terms 

    $(document).on('click', '.termD', async(e) => {
        console.log(e.target)
        let v = $(e.target).closest('.form-row').find('.hidden').html();
        Upname = $(e.target).closest('.form-row').find('.t_name').val();
        Upemail = $(e.target).closest('.form-row').find('.u_email').val();
        // Upname = $(this).closest('.form-row').find('.t_name').val();
        let t_id = $(e.target).closest('.form-row').find('.t_id').val();
        console.log(Upname); 
        console.log(t_id); 
        console.log(Upemail); 
        // Upemail = $(this).closest('.form-row').find('.t_email').val();
        var email = $("#userEmail").val();
        var passcode = await CheckPassCode().then((r) => {
            return r
        })
        await validUser(email, passcode).then((r) => {
            console.log(r);
            if(r==true){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
        
                        $.ajax({
                            type: "POST",
                            url: base_url + '/AddCon/delete_terms',
                            data: { id: t_id },
                            success: function (data) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                fetchTermAfterUpdate();

                            },
                            error: function () {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                })
                            }
                        });
                    }
                })

            }
        })

 

    })

    function waitforme(millisec) {
        return new Promise(resolve => {
            setTimeout(() => { resolve('') }, millisec);
        })
    }
   
    // fetching terms after create update remove

    var fetchTermAfterUpdate = ()=>{
        $('#userlist').empty();
        let email = $("#userEmail").val();
        var req = $.ajax({
            url: base_url + "/GetTerms/userterms/" + email,
            type: "GET",
            dataType: "json"
        }).done(function (res) {
        console.log("I am being called")

            if (res.length > 0) {
                $.each(res, function (r) {
                    console.log(res[r]);
                    var term = JSON.parse(res[r].terms);
                    $('#userlist').append(
                        `<div class="form-row">
                    <input type="checkbox"  class="uterm tsel"  id ="userT${r + 1}"value="${res[r].t_name}}">
                    <label class="ml-2" for="userT${r + 1}"> ${res[r].t_name}
                        <small class="text-info ml-3">
                            <a data-toggle="modal" href="#" class="termM" id="userT${r + 1}">
                               <i class="fas fa-info-circle"></i>
                            </a>
                        </small>
                        <small class="text-info ml-3">
                            <a data-toggle="modal" href="#" class="termE" id="userT${r + 1}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </small>
                        <small class="text-info ml-3">
                        <a data-confirm="Are you sure to delete this item?" href="#" class="termD  text-danger" id="userT${r + 1}">
                           <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </small> 
                    </label>
                    <div class="hidden u_tjson json"> ${res[r].terms}</div>
                    <input type="hidden" class="t_id" value="${res[r].id}">
                    <input type="hidden" class="u_email" value="${res[r].u_email}">
                    <input type="hidden" class="t_name" value="${res[r].t_name}">
                </div>
                `

                    );
                })
            }
        })
    }



});