$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

function formSelect() {
    if ($('#myonoffswitch').is(":checked")) {
        $('#bankRegister').hide();
        $('#donorRegister').show();
    } else {
        $('#bankRegister').show();
        $('#donorRegister').hide();
    }
}

function init() {
    $('#bankRegister').hide();
    $('#donorRegister').show();
}

function formaction() {
    document.getElementById('login_button').disabled = false;
	if (document.getElementsByName("optradio")[0].checked) {
		document.getElementById("login").action = "donorprofile.php";
	} else {
		document.getElementById("login").action = "bankprofile.php";
	}
}
