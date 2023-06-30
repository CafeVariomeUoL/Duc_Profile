$(function(){
var c =[
    {
        "id": "eng",
        "text": "English"
    },
    {
        "id":"fre",
        "text":"French"
    },
    {
        "id":"spa",
        "text":"Spanish"
    },
    {
        "id":"ita",
        "text":"Italian"
    },
    {
        "id":"nld",
        "text":"Dutch"
    },
    {
        "id":"jpn",
        "text":"Japanese"
    },
    {
        "id":"zho",
        "text":"Chinese"
    },
    {
        "id":"urd",
        "text":"Urdu"
    },
    {
        "id":"ara",
        "text":"Arabic"
    },
    {
        "id":"deu",
        "text":"German"
    }
]
  $("#a_lang").select2({
    placeholder: "Please select language",
    tags: true,
    tokenSeparators: [",", ";"],
    theme: "bootstrap",
    width: '100%',
    data: c

    });
$("#p_refs").select2({
    placeholder: "Please enter reference and press enter",
    tags: true,
    tokenSeparators: [",", ";"],
    theme: "bootstrap",
    width: '100%'

    });

    $("#r_dlevel").select2({
        placeholder: "Please select resource data level",
        tags: false,
        tokenSeparators: [",", ";"],
        theme: "bootstrap",
        width: '100%'
    
    });

    $("#r_disp").select2({
        placeholder: "Please select or add resource disposotion and press enter",
        tags: true,
        tokenSeparators: [",", ";"],
        theme: "bootstrap",
        width: '100%'
    
    });
    // r_pmode
    $("#r_pmode").select2({
        placeholder: "Please select resource permission mode.",
        tags: true,
        tokenSeparators: [",", ";"],
        theme: "bootstrap",
        width: '100%'
    
    });
    


    $("#r_contact").select2({
        placeholder: "Please enter contact email and press enter.",
        tags: true,
        tokenSeparators: [",", ";"],
        theme: "bootstrap",
        width: '100%'
    
    });


  
});
