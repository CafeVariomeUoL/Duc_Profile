$(function () {
    var c = 1;
    $(document).ready(function () {
        $("#addAsset").click(function () {
            let s = $('#resources').children().length;
            $("#resources").append(`
               <div class=" resgroup" id="res${c}">
                    <div class="form-row mt-3">
                         <div class="col-12">
                         <legend class="col-6 col-md-2 ltext" visible="true">Asset ${s + 1}</legend>
                         <div class="couter removeRes float-right"> <div class="cinner"><label>Remove</label></div></div>
                         </div>
                    </div>
                    <div class="ainfo">
                    <div class="form-row mt-3 p-0">
                        <div class="form-group col-md-6 col-sm-12 col-12">
                            <label for="r_name">Asset Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                            <input type="text" name="r_name" required id="r_name" placeholder="Please enter asset name." class="form-control">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-12">
                            <label for="r_des">Asset Description:</label>
                            <input type="text" name="r_des" id="r_des" placeholder="Please enter asset description." class="form-control">
                        </div>
                    </div>
                    <div class="form-row 1 p-0">
                            <span class="form-group col-md-6 col-6 col-6" id="p_reflist">
                                <label for="p_refs">Asset References:</label>
                                <select name="p_refs[]" id="p_refs" class="form-control p_refs" multiple="multiple">
                                </select>
                            </span>
                            <span class="form-group col-md-6 col-6 col-6" id="p_reflist">
                                <label for="p_refs">Asset Uri:</label>
                                <input type="url" name="a_uri"  id="a_uri" placeholder="https://www.example.com" class="form-control">
                            </span>
                    </div>
                    </div>
               </div>
            `);

            $(".p_refs").select2({
                placeholder: "Please enter reference and press enter",
                tags: true,
                tokenSeparators: [",", ";"],
                theme: "bootstrap",
                width: '100%'
            
            });

            c++;
        })

        
        function returnIndex(cl){
            let n = cl.split(' ');
            let i = parseInt(n[1])-1;
            return i;
          }
        
          $(document).on('click', '.removeRes', function () { 
        
            let s = $('#resources').children();
            let legend = $(this).closest('.resgroup').find('.ltext');
            let legendTxt = legend.text();
            let currentIndex = returnIndex(legendTxt);
            var ls =  $('.ltext');
            if(currentIndex != ls.length){
        
              $.each(s,function(i,v){
        
                if(i > currentIndex){
                  $(v).find('.ltext');
                   let txt = $(v).find('.ltext');
                   $(txt).text('');
                   $(txt).text('Asset '+ i);
                }
              })
            }
        
            $(this).closest('.resgroup').remove();
        
          })
    })
})