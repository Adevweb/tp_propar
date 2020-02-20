
$(document).ready(function(){
 
    $("#sendLogin").click(function(e){
        e.preventDefault();
 
        $.post(
            '../controler/cnx_action.php', 
            {
                login : $('#login').val(),  // Nous récupérons la valeur de nos input que l'on fait passer à cnx_action.php
                mdp : $('#mdp').val()
            },
 
            function(data){
                console.log(data);
                if(data == 'ExpertOK'){
                    window.location.href = '../view/homeAdmin.php'
                }
                else if(data == 'UserOK'){
                    window.location.href = '../view/homeUser.php'
                }
                else { 
                    $("#ajaxRes").html("<p> Les identifiants sont incorrect. </p>");
                }

            },
            'text'
         );
    });
});
