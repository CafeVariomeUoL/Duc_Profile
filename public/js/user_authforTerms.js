var CheckPassCode = async () => {

    let promise = await new Promise(async (resolve, reject) => {
        let passcode = 0;
        let pass = localStorage.getItem('passcode');
        if (pass) {
            passcode = parseInt(pass);
            resolve(passcode);
        } else {
            const { value: passcode } = await Swal.fire({
                title: "Enter 4 digit passcode",
                html: '<input type="password" id="password" class="swal2-input" placeholder="Password">',
                preConfirm: async () => {
                    return new Promise((resolve) => {
                        const password = Swal.getPopup().querySelector('#password').value;
                        if (!password) {
                            Swal.showValidationMessage(`Please enter passcode`)
                        }
                        else {
                            console.log(password)
                            resolve(parseInt(password))
                        }
                    })
                }
            })
            resolve(passcode);
        }
    });
    return promise;
}
var validUser = async (email, pass) => {
    return new Promise(async (resolve) => {
       var req= await $.ajax({
            url: base_url + "/GetTerms/CheckPassCode",
            type: "GET",
            dataType: "json",
            data: { email: email, passcode: pass },
            success:(r)=>{
                return r;
            },
            error:(r) =>{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter correct passcode',
                })

            }
        })
       
        // console.log(req["validUser"])
        resolve(req["validUser"]);

    })

}
