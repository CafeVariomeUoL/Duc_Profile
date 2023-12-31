$(function () {

  //Condition Rules Hide and Seek
  $(".backToSum").hide();
  var c = 2;
  autosize(document.querySelector('.c_detail'));
  autosize(document.querySelector('.r_detail'));
  $('.c_rscope').select2({
    placeholder: "Please select condition & rule scope",
    theme: "bootstrap",
    width: "100%",
    data: ["Whole of Asset", "Part of Asset"]
  });

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

  //Term Selection
  $(document).on('change', '.tsel', function (e) {
    let id = $(this).attr("id");
    var sr = $(document).find('.c_term');
    $(sr).find('option').remove().end().append('<option></option>')
    if (id == "cce") {
      if ($(this).is(":checked")) {
        $.each(cceTerms, (i, v) => {
          terms.push(v.Term)
        })
      } else {
        $.each(cceTerms, (i, v) => {
          terms.pop(v.Term)
        })
      }
    }
    if (id == "duo") {
      if ($(this).is(":checked")) {
        $.each(duoTerms, (i, v) => {
          terms.push(v.Term)
        })
      } else {
        $.each(duoTerms, (i, v) => {
          terms.pop(v.Term)
        })
      }
    }
    if (id == "ico") {
      if ($(this).is(":checked")) {
        $.each(icoTerms, (i, v) => {
          terms.push(v.Term)
        })
      } else {
        $.each(icoTerms, (i, v) => {
          terms.pop(v.Term)
        })
      }
    }
    if (id.startsWith('user')) {
      let v = $(this).closest('.form-row').find('.hidden').html();
      console.log(JSON.parse(v));
      var termsArr = JSON.parse(v);
      if ($(this).is(":checked")) {
        $.each(termsArr, (i, v) => {
          terms.push(v.Term)
        })
      } else {
        $.each(termsArr, (i, v) => {
          terms.pop(v.Term)
        })
      }
    }
    $(".c_term").select2({
      placeholder: "Please select use condition",
      theme: "bootstrap",
      width: "100%",
      tags: true,
      tokenSeparators: [",", ";"],
      maximumSelectionLength: 1,
      data: terms
    });
    terms = [...new Set(terms)]
    console.log(terms)
  })
  // $(document).on('change', '.c_term', function (e) {
  //   let rule = [];
  //   var val = e.target.value;
  //   var c = e.target.closest('.conInfo');
  //   var sr = $(c).find('.c_rule');

  //   $(sr).find('option').remove().end().append('<option></option>')

  //   var set1 = [
  //     "Use by a commercial entity",
  //     "Geographical area",
  //     "Regulatory jurisdiction",
  //     "Research use",
  //     "Clinical research",
  //     "Disease specific use",
  //     "Clinical care",
  //     "Use as control",
  //     "Profit motivated use",
  //     "Return of results",
  //     "Return of incidental findings",
  //     "Re-Identification of individuals",
  //   ];
  //   var set2 =[
  //     "Time period of use",
  //     "Collaboration", 
  //     "Fees", 
  //     "Publication moratorium", 
  //     "Publication",
  //     "User authentication",
  //     "Ethics Approval"
  //   ];


  //   if (set1.includes(val)) {

  //     var r = ["Obligated", "Permitted",  "Forbidden"]
  //     rule = r;
  //   }

  //   if (set2.includes(val)) {

  //     var r = [ "Obligated","No Requirements"]
  //     rule = r;

  //   }


  // })

  $(document).ready(function () {

    $("#addcon").click(function () {

      let s = $('#conditions').children().length;
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
                  placeholder="Please enter qualifiers for the use condition (optional)"></textarea>
          </span>
      </div>
          </div>
      </div>
   </div>
      `);


      $(".c_term").select2({
        placeholder: "Please select use condition",
        theme: "bootstrap",
        width: "100%",
        tags: true,
        tokenSeparators: [",", ";"],
        maximumSelectionLength: 1,
        data: terms
      });
      $('.c_rscope').select2({
        placeholder: "Please select condition & rule scope",
        theme: "bootstrap",
        width: "100%",
        data: ["Whole of Asset", "Part of Asset"]
      });
      $(".c_rule").select2({
        placeholder: "Please select condition rule",
        theme: "bootstrap",
        width: "100%",
        data: rule
      });

      c++;
      autosize($('.c_detail'));
      autosize($('.r_detail'));

      if ($('#conditions').hasScrollBar()) {

        $('#conditions').get(0).scrollTop = $('#conditions').get(0).scrollHeight;

      }

    });


  });


  function returnIndex(cl) {
    let n = cl.split(' ');
    let i = parseInt(n[1]) - 1;
    return i;
  }

  $(document).on('click', '.removeCon', function () {

    let s = $('#conditions').children();
    let legend = $(this).closest('.congroup').find('.ltext');
    let legendTxt = legend.text();
    let currentIndex = returnIndex(legendTxt);
    var ls = $('.ltext');
    if (currentIndex != ls.length) {

      $.each(s, function (i, v) {

        if (i > currentIndex) {
          $(v).find('.ltext');
          let txt = $(v).find('.ltext');
          $(txt).text('');
          $(txt).text('Statement ' + i);
        }
      })
    }

    $(this).closest('.congroup').remove();

  })


  // $(document).on('click', '.addScon', function () {

  //       var id = $(this).attr('id');
  //       var n = id.substr(id.length - 1);

  //       $("#subconditions" + n).append(`
  //       <div class ="shadow-sm subcongroup mb-1 mt-1  id="scon${n}">
  //       <div class="closebtn row"><button type="button"  class="btn btn-small removeSubCon btn-danger"><i class="fas fa-times"></i></button></div>
  //       <div class="form-row  p-0">
  //       <div class="form-group col-md-6 col-sm-12 col-12">
  //           <span id="sc_term${n}">
  //               <label for="sc_term">Use Condition:</label>
  //               <select name="sc_term[]"  class="form-control sc_term" multiple>
  //                   <option></option>
  //                   <option>DUO</option>
  //                   <option>ICO</option>
  //               </select>

  //           </span>

  //       </div>
  //       <div class="form-group col-md-6 col-sm-12 col-12">
  //       <span id="sc_rule${n}">
  //           <label for="c_rule">Condition Rule:</label>
  //           <select name="sc_rule[]"  class="form-control sc_rule " multiple>
  //           <option></option>
  //           <option>FULLY PERMITTED</option>
  //           <option>PARTIALLY PERMITTED</option>
  //           <option>OBLIGATED</option>
  //           <option>FORBIDDEN</option>
  //           <option>CONDITION NOT APPLICABLE</option>
  //           <option>CONDITION APPLICABLE</option>
  //           </select>
  //       </span>
  //   </div>

  //   </div>

  //   <div class="form-row  p-0">
  //       <div class="form-group col-md-6 col-sm-12 col-12">
  //               <span id="sc_detail${n}">
  //                   <label for="sc_detail">Condition Detail:</label>
  //                   <select name="sc_detail[]"  class="form-control sc_detail " multiple>
  //                   <option></option>
  //                   <option>MONDO</option>
  //                   <option>UO</option>
  //                   </select>
  //               </span>
  //       </div>
  //       <div class="form-group col-md-6 col-sm-12 col-12">
  //           <label for="sc_dvalue">Detail Value:</label>
  //           <input type="text" class="form-control" name="sc_dvalue[]" id="c_dvalue" placeholder="Please enter condition detail value">
  //       </div>

  //   </div>
  //   </div>

  //       `);

  //       var terms = [

  //         //Who
  //         "Use by a commercial entity",
  //         //where
  //         "Geographical area",
  //         "Jurisdiction",
  //         //When
  //         "Time period of use",
  //         //Why
  //         "Research use",
  //         "Clinical use",
  //         "Disease specific use",
  //         "use as control",
  //         "Profit motivated use",
  //         //How
  //         "Collaboration", "Fees", "Return of non-incidental results", "Return of incidental findings", "Re-identification of individuals"

  //       ]


  //       $(".sc_term").select2({
  //         placeholder: "Please select or enter Use Condition.",
  //         tags: true,
  //         tokenSeparators: [",", ";"],
  //         theme: "bootstrap",
  //         width: "100%",
  //         data: terms

  //       });

  //       $(".sc_detail").select2({
  //         placeholder: "Please select or enter condition detail and press enter.",
  //         tags: true,
  //         tokenSeparators: [",", ";"],
  //         theme: "bootstrap",
  //         width: "100%",
  //       });
  //       $(".sc_rule").select2({
  //         placeholder: "Please select or enter condition rule and press enter.",
  //         tags: true,
  //         tokenSeparators: [",", ";"],
  //         theme: "bootstrap",
  //         width: "100%",
  //       });

  //       $(document).on("click", ".removeSubCon", function () {
  //         $(this).closest(".subcongroup").remove();
  //       });


  //     })


});