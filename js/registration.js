$(document).ready(function(){


                    /***************
                     *** show pass ***
                     ***************/
    $('body').on('click', '.password-checkbox', function(){
        if ($(this).is(':checked')){
            $('#password').attr('type', 'text');
        } else {
            $('#password').attr('type', 'password');
        }
    }); 


                    /***************
                     *** Sign up ***
                     ***************/
                    
    $( "#sign-up-button" ).click( (e) => {
        const name = $( "#name" ).val();
        const login = $( "#login" ).val();
        const password = $( "#password" ).val();
        const alertdiv = $( "p#validation" );
        if (name.length < 3) {
            alertdiv.html("Имя должно быть не менее 3 символов").prop("hidden", false);
            return false;
        } if (login.length < 3) {
            alertdiv.html("Логин должен быть не менее 3 символов").prop("hidden", false);
            return false;
        } if (password.length < 3) {
            alertdiv.html("Пароль должен быть не менее 3 символов").prop("hidden", false);
            return false;
        } else {
            
        
            $.ajax({
                url: '/modules/registration/sign-up.php',
                method: 'POST',
                data: {name, login, password},
                success: (data) => {
                    if (data === "add") {
                        $(location).attr('href', '/views/registration/sign-in.php')
                    } else {
                        const div = $( "p#validation" );
                        div.html(data).prop("hidden", false);
                    }
                }           
            })
        }

    })

                    /***************
                     *** Sign in ***
                     ***************/
                    
        $( "#sign-in-button" ).click( (e) => {
            const login = $( "#login" ).val();
            const password = $( "#password" ).val();
    
            $.ajax({
                url: '/modules/registration/sign-in.php',
                method: 'POST',
                data: {login, password},
                dataType: 'text',
                success: (data) => {
                    if (data == "success") {

                        console.log(data);
                        $(location).attr('href', '/index.php')
                    } else {
                        const div = $( "p#validation" );
                        div.html(data).prop("hidden", false);
                    }
                }                
            })
        })

})