$(document).ready(function(){
 
    $("#addUser").click(function(e){
        e.preventDefault();
 
        $.post(
            '../controler/addUser_action.php', 
            {   
                nom : $('#nom').val(),
                prenom : $('#prenom').val(),
                type : $('#type').val(),
                login : $('#login').val(),  // Nous récupérons la valeur de nos input que l'on fait passer à cnx_action.php
                mdp : $('#mdp').val()
            },
 
            function(data){
                console.log(data);
                if(data == 'exist'){
                    window.location.href = '../view/error.php'
                }
                else if(data == 'success'){
                    window.location.href = '../view/success.php'
                }
                else { 
                    $("#ajaxRes").html("<p> Les identifiants sont incorrects. <br>Veuillez entrer un login contenant uniquement des lettres. <br> Veuillez entrer un mot de passe compris entre 6-30 caractères et contenant au moins 1 lettre et 1 chiffre.  </p>");
                }

            },
            'text'
         );
    });
});