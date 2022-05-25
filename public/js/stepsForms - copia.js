var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var _token = $("#csrf-token").val();
var result = false;

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    /*     if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    } */
    if (n == x.length - 1) {
        $("#nextBtn").remove();
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n);
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x,
        y,
        i,
        valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        var resultValid;
        if (currentTab === 0) {
            resultValid = sendingCodeNumber();
        } else if (currentTab === 1) {
            resultValid = checkCode();
        } else if (currentTab === 2) {
            resultValid = checkPassword();
        } else {
            alert("Finish");
        }
        if (resultValid) {
            document.getElementsByClassName("step")[currentTab].className +=
                " finish";
        } else {
            valid = false;
            return valid;
        }
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i,
        x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}

function sendingCodeNumber() {
    var login = $("#login").val();
    $.ajax({
        async: false,
        type: "POST",
        dataType: "json",
        url: "/password/email",
        data: { login, _token },
        success: function(data) {
            if (data.status === 400) {
                result = false;
            } else {
                result = true;
            }
        }
    });
    return result;
}

function checkCode() {
    var codeNumber = $("#codeNumber").val();
    $.ajax({
        async: false,
        type: "POST",
        dataType: "json",
        url: "/password/code",
        data: { codeNumber, _token },
        success: function(data) {
            if (data.status === 400) {
                result = false;
            } else if (data.status === 404) {
                alert("codigo caducado ");
                location.reload();
            } else {
                result = true;
            }
        }
    });
    return result;
}

function checkPassword() {
    // Mayus Min And Number and lenght > 8 <10        Abc31Ser

    var password = $("#myPassword").val();
    var passwordConfirm = $("#myPasswordConfirm").val();
    var codeNumber = $("#codeNumber").val();

    if (passwordConfirm === password) {
        $.ajax({
            async: false,
            type: "POST",
            dataType: "json",
            url: "/password/updatepassword",
            data: { codeNumber, _token, password, passwordConfirm },
            success: function(data) {
                if (data.status === 404) {
                    alert("Email was not found");
                    result = false;
                } else if (data.status === 400) {
                    alert("Easy Password");
                    result = false;
                } else {
                    result = true;
                }
            }
        });
    }
    return result;
}
