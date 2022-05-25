$(document).ready(function () {



/*     $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-submenu .show').removeClass('show');
        });


        return false;
    });
  */

    $('.dropdown button.dropdown-toggle').on('click', function (e) {
        if (!$(this).next().hasClass('show')) {
            
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');

        $(this).next('.dropdown-menu').children().on('click',function(){
            $subMenu.removeClass('show');
        })

        return false;
    });


/* FUNCTIONES MENU RECIPIES */




/*     const buttonSearch = document.getElementById('button-search');
    const blurSearch = document.getElementById('blur-search');
function toggleMenu(){
    const menu = document.getElementById('menu')
    menu.classList.toggle('active');
    const tabs = document.querySelectorAll("#menu .search-open li");
    const tabsLinks = document.querySelectorAll("#menu .container-links .links li");

    tabs.forEach(item => {
        item.addEventListener('click', () => {
            tabs.forEach(tab => {
                tab.classList.remove('active');
            })
            let submenus = document.querySelectorAll("#menu .container-links ul")
                .forEach(submenu => {
                    submenu.classList.remove('active');
                })

            item.classList.add('active')
            let submenu = document.getElementById(`${item.id}-menu`);
            submenu.classList.add('active')

        })
    }) */

/*         tabsLinks.forEach(link => {
        link.addEventListener('click', () => {
            console.log(link);
            menu.classList.toggle('active');
        });
    }); */

/* } */


/* if(buttonSearch){
    buttonSearch.addEventListener('click', () => {
        toggleMenu();
    })
    blurSearch.addEventListener('click', () => {
        toggleMenu();
    })
    
} */

/* console.log(tabs); */















    /* funciones para bandera */




















    function mostrarPassword(inputPass) {
        var cambio = document.getElementById(inputPass);

        if (cambio.type == "password") {
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }

    $(document).ready(function () {
        //CheckBox mostrar contraseña
        $('#ShowPassword').click(function () {
            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });
    });


    function loginVisit() {
        var email = $('#email').val();
        var password = $('#idPasswordDos').val();

        var url = window.location.origin;
        var token = $('meta[name="csrf-token"]').attr('content');


        if (email != "") {
            document.getElementById('emailErrorLogin').hidden = true;
            document.getElementById('errorCredencialsLogin').hidden = true;
            document.getElementById('errorActiveLogin').hidden = true;
        }
        if (password != "") {
            document.getElementById('passErrorLogin').hidden = true;
        }
        if (email == "") {
            document.getElementById('emailErrorLogin').hidden = false;
        } else if (!(validateEmail(email))) {
            document.getElementById('emailErrorLogin').hidden = false;
        } else if (password == "") {
            document.getElementById('passErrorLogin').hidden = false;
        }
        if ((email != "") && (password != "")) {
            $.ajax({

                type: 'POST',
                url: url + '/login',
                dataType: 'json',
                data: {
                    email: email,
                    password: password,
                    _token: token,
                },
                success: function (data) {
                    if (data == "200") {
                        $("#exampleModal .close").click();
                        location.reload();
                    }
                    if (data == "600") {
                        document.getElementById('errorCredencialsLogin').hidden = false;
                    }
                    if (data == "601") {
                        document.getElementById('errorActiveLogin').hidden = false;
                    }
                    if (data == "602") {
                        document.getElementById('notAccess').hidden = false;
                    }
                }
            });
        }



        /* $("#exampleModal .close").click(); */

    }


    function validateEmail(email) {
        let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }


    function registerVisit() {
        var email = $('#emailRegister').val();
        var password = $('#idPassword').val();
        var repassword = $('#idRePassword').val();

        var url = window.location.origin;
        var token = $('meta[name="csrf-token"]').attr('content');

        if (email != "") {
            document.getElementById('emailErrorRegister').hidden = true;
            /*         document.getElementById('errorCredencialsRegister').hidden = true; */
            document.getElementById('errorActiveRegister').hidden = true;
        }
        if (password != "") {
            document.getElementById('passErrorRegister').hidden = true;
        }
        if (email == "") {
            document.getElementById('emailErrorRegister').hidden = false;
        } else if (!(validateEmail(email))) {
            document.getElementById('emailErrorRegister').hidden = false;
        } else if (password == "") {
            document.getElementById('passErrorRegister').hidden = false;
        } else if (repassword == "") {
            document.getElementById('rePassErrorRegister').hidden = false;
        } else if (password != repassword) {
            document.getElementById('rePassErrorCoincidentRegister').hidden = false;
        }
        if ((email != "") && (password != "") && (repassword != "")) {
            $.ajax({
                type: 'POST',
                url: url + '/register',
                dataType: 'json',
                data: {
                    email: email,
                    password: password,
                    /*                 password: repassword, */
                    _token: token,
                },
                success: function (data) {
                    if (data == "200") {
                        $("#exampleModal .close").click();
                        location.reload();
                    }
                    if (data == "600") {
                        document.getElementById('errorCredencialsRegister').hidden = false;

                    }
                    if (data == "601") {
                        document.getElementById('errorActiveRegister').hidden = false;
                    }
                    if (data == "602") {
                        document.getElementById('errorExistEmailRegister').hidden = false;
                    }
                }
            });
        }

    }



})





/*
buttonSearch.addEventListener('blur', () => {
    menu.classList.toggle('active')
})*/





