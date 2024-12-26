document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("dropdownUserbtn").addEventListener("click", function () {
        document.getElementById("dropdownUser").classList.toggle("hidden");
    });
    
    document.addEventListener("click", function (e) {
        if (!document.getElementById('dropdownUserbtn').contains(e.target)) {
            document.getElementById('dropdownUser').classList.add('hidden');
        }

        document.querySelectorAll('.action-menu').forEach((item) => {
            if(!item.contains(e.target)){
                item.querySelector('.dropdown').classList.add('hidden');
            }
        });
        
    });
    
    document.getElementById("btnaddnewmembertoggle").addEventListener("click", function () {
        document.getElementById("addnewmembersection").classList.toggle("inactive");
    });
});

window.addEventListener("resize", function(){
    minimizeNewMemberForm();
});

function minimizeNewMemberForm() {
    if( window.innerWidth < 1024 ){
        document.getElementById("addnewmembersection").classList.add("inactive");
    }
    else{
        if(document.getElementById("addnewmembersection").classList.contains("inactive")){
            document.getElementById("addnewmembersection").classList.remove("inactive");
        }
    }
}

function TransactionDetails(){
    if(document.getElementById("totalcontrib")){
        var totalcontrib = document
        .getElementById("totalcontrib")
        .getAttribute("data-value");
    }
    if(document.getElementById("totalloan")){
        var totalloan = document
        .getElementById("totalloan")
        .getAttribute("data-value");
    }
    if(document.getElementById("totalcreditpay")){
        var totalcreditpay = document
            .getElementById("totalcreditpay")
            .getAttribute("data-value");
    }
    var loanbal = parseFloat(totalloan) - parseFloat(totalcreditpay);
    var totalfund = document.getElementById("totalfund")?.value ?? 0;
    var totalinterest = document.getElementById("totalinterest")?.value ?? 0;

    var p_interest = (parseFloat(totalcontrib) / parseFloat(totalfund)) * 100;
    var intallo = (p_interest * totalinterest) / 100;
    var netfund = totalcontrib - loanbal + intallo;

    document.getElementById("totalcontributions").innerHTML =
        new Intl.NumberFormat("en-US", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        }).format(totalcontrib);

    document.getElementById("prointerest").innerHTML =
        new Intl.NumberFormat("en-US", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        }).format(p_interest) + "%";

    document.getElementById("intallocation").innerHTML = new Intl.NumberFormat(
        "en-US",
        {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        }
    ).format(intallo);

    document.getElementById("loanbal").innerHTML = new Intl.NumberFormat(
        "en-US",
        {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        }
    ).format(loanbal);

    document.getElementById("netfund").innerHTML = new Intl.NumberFormat(
        "en-US",
        {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        }
    ).format(netfund);
}

function displaySelectedProfile(e) {
    if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();

        reader.onload = function (event) {
            // Set the source of the image to the selected file
            document.getElementById("profile_selector").src =
                event.target.result;
        };

        // Read the selected file as a data URL
        reader.readAsDataURL(e.target.files[0]);
    }
}

function showEditform() {
    const editmember = document.getElementById("editmemberinfo");
    editmember.classList.toggle("show");
}
function showNewContrib() {
    const newcontrib = document.getElementById("newcontrib");
    newcontrib.classList.toggle("show");
}
function showNewLoan() {
    const newloan = document.getElementById("newloan");
    newloan.classList.toggle("show");
}
function showCreditPay() {
    const loanbal = document.getElementById("loanbal").innerHTML;
    const creditpaymax = parseFloat(loanbal.replace(/,/g, ''));
    if(creditpaymax > 0){
        document.getElementById("creditpay_amount").setAttribute("max", creditpaymax);
        const creditpay = document.getElementById("creditpay");
        creditpay.classList.toggle("show");
    }
    else{
        showMessage("You don't have loan balance.");
    }
}

function ClearEditForm() {
    showEditform();
    const inputEditMember = document.querySelectorAll(
        "#editmemberinfo input[type=text], #editmemberinfo input[type=email]"
    );
    inputEditMember.forEach((element) => {
        element.value = element.getAttribute("default-data");
    });

    const textareaAddress = document.querySelector("#editmemberinfo textarea");
    textareaAddress.value = textareaAddress.getAttribute("default-data");

    const radioGender = document.getElementById("defaultgender");
    switch (radioGender.value) {
        case "Male":
            document.getElementById("gendermale").checked = true;
            break;
        case "Female":
            document.getElementById("genderfemale").checked = true;
            break;
        case "Something Else":
            document.getElementById("gendersomethingelse").checked = true;
            break;
    }

    document.getElementById("profile").value = "";
    const profile_selector = document.getElementById("profile_selector");
    profile_selector.src = profile_selector.getAttribute("default-data");
}

function setPassword(){
    var password = document.getElementById('password');
    var contact = document.getElementById('contact');
    var lname = document.getElementById('lastname');

    password.value = lname.value.toLowerCase().replace(/\s/g, '') + contact.value.slice(-4);

}

function ComputeLoan() {
    var loanamount = document.getElementById("loan_amount");
    var loaninterest = document.getElementById("loan_interest");
    var loannet = document.getElementById("loan_net");

    loaninterest.value = parseFloat(loanamount.value * 0.05);
    loannet.value = loanamount.value - loaninterest.value;
}

function showReceipt(img){
    if (img) {
        document.getElementById("receiptimg").src = img;
    }
    document.getElementById("viewreceipt").classList.toggle("show");
}
function closeReceipt(){
    document.getElementById("viewreceipt").classList.toggle("show");
    document.getElementById("receiptimg").src = "";
}

function showMessage(message){
    if (message) {
        document.getElementById("message_p").innerHTML = message;
    }
    document.getElementById("viewmessage").classList.toggle("show");
}
function closeMessage(){
    document.getElementById("viewmessage").classList.toggle("show");
    document.getElementById("message_p").innerHTML = "";
}
