/*global console, alert, promt,*/
var userName        = document.forms["form"]["name"],
    email           = document.forms["form"]["email"],
    pass            = document.forms["form"]["password"],
    passConfirm     = document.forms["form"]["password_confirm"],
    mobile          = document.forms["form"]["mobile"],
    address         = document.forms["form"]["address"],
    textErea        = document.forms["form"]["text-area"],
    nameError       = document.getElementById("nameerror"),
    emailError      = document.getElementById("email_error"),
    passError       = document.getElementById("password_error"),
    mobileError     = document.getElementById("mobile_error"),
    addressError    = document.getElementById("address_error");


// Hide Placeholder , validate on Input focus or Input blur

 userName.onfocus = function () {
    "use strict";
    this.setAttribute("data-place", this.getAttribute("placeholder"));
    this.setAttribute('placeholder', "");
    this.style.border = "1px solid #78a4e6";
    this.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    this.style.borderRadius = "5px";
    nameError.innerHTML = "";
}
 userName.onblur = function () {
    "use strict";
    this.setAttribute("placeholder", this.getAttribute("data-place"));
    this.setAttribute('data-place', "");
     this.style.borderRadius = "10px";
     if (userName.value === "") {
    userName.style.border = "1px solid red";
    userName.style.boxShadow = "1px 1px 6px -1px #c76565";
    nameError.textContent = "enter your user Name !!!";
     } else{
    userName.style.border = "1px solid #78a4e6";
    userName.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    nameError.innerHTML = "";
    }

}
email.onfocus = function () {
    "use strict";
    this.setAttribute("data-place", this.getAttribute("placeholder"));
    this.setAttribute('placeholder', "");
    this.style.border = "1px solid #78a4e6";
    this.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    this.style.borderRadius = "5px";
    emailError.innerHTML = "";
}
email.onblur = function () {
    "use strict";
    this.setAttribute("placeholder", this.getAttribute("data-place"));
    this.setAttribute('data-place', "");
    this.style.borderRadius = "10px";

    if (email.value == "") {
    email.style.border = "1px solid red";
    email.style.boxShadow = "1px 1px 6px -1px #c76565";
    emailError.textContent = "enter your Email !!!";
     } else{
    email.style.border = "1px solid #78a4e6";
    email.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    emailError.innerHTML = "";
     }

}
pass.onfocus = function () {
    "use strict";
    this.setAttribute("data-place", this.getAttribute("placeholder"));
    this.setAttribute('placeholder', "");
    this.style.border = "1px solid #78a4e6";
    this.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    this.style.borderRadius = "5px";
    passError.innerHTML = ""
}
pass.onblur = function () {
    "use strict";
    this.setAttribute("placeholder", this.getAttribute("data-place"));
    this.setAttribute('data-place', "");
    this.style.borderRadius = "10px";

    if (pass.value == "") {
    pass.style.border = "1px solid red";
    pass.style.boxShadow = "1px 1px 6px -1px #c76565";
    passError.textContent = "enter your Password !!!";
     } else{
    pass.style.border = "1px solid #78a4e6";
    pass.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    passError.innerHTML = "";
     }

}
passConfirm.onfocus = function () {
    "use strict";
    this.setAttribute("data-place", this.getAttribute("placeholder"));
    this.setAttribute('placeholder', "");
    this.style.border = "1px solid #78a4e6";
    this.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    this.style.borderRadius = "5px";
    
}
passConfirm.onblur = function () {
    "use strict";
    this.setAttribute("placeholder", this.getAttribute("data-place"));
    this.setAttribute('data-place', "");
    this.style.borderRadius = "10px";

    if (passConfirm.value == "") {
    passConfirm.style.border = "1px solid red";
    passConfirm.style.boxShadow = "1px 1px 6px -1px #c76565";
    passError.textContent = "enter your Pass confirm !!!";
     } else{
    passConfirm.style.border = "1px solid #78a4e6";
    passConfirm.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    passError.innerHTML = "";
     }


}
mobile.onfocus = function () {
    "use strict";
    this.setAttribute("data-place", this.getAttribute("placeholder"));
    this.setAttribute('placeholder', "");
    this.style.border = "1px solid #78a4e6";
    this.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    this.style.borderRadius = "5px";
    mobileError.innerHTML = ""
}
mobile.onblur = function () {
    "use strict";
    this.setAttribute("placeholder", this.getAttribute("data-place"));
    this.setAttribute('data-place', "");
    this.style.borderRadius = "10px";

    if (mobile.value == "") {
    mobile.style.border = "1px solid red";
    mobile.style.boxShadow = "1px 1px 6px -1px #c76565";
    mobileError.textContent = "enter your Mobile Number !!!";
     } else{
    mobile.style.border = "1px solid #78a4e6";
    mobile.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    mobileError.innerHTML = "";
     }
}
address.onfocus = function () {
    "use strict";
    this.setAttribute("data-place", this.getAttribute("placeholder"));
    this.setAttribute('placeholder', "");
    this.style.border = "1px solid #78a4e6";
    this.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    this.style.borderRadius = "5px";
    addressError.innerHTML = ""
}
 address.onblur = function () {
    "use strict";
    this.setAttribute("placeholder", this.getAttribute("data-place"));
    this.setAttribute('data-place', "");
    this.style.borderRadius = "10px";

    if (address.value == "") {
    address.style.border = "1px solid red";
    address.style.boxShadow = "1px 1px 6px -1px #c76565";
    addressError.textContent = "enter your Address !!!";
     } else{
    address.style.border = "1px solid #78a4e6";
    address.style.boxShadow = "1px 1px 6px -1px #3f6be9";
    addressError.innerHTML = "";
     }

}



