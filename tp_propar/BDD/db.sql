#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: UTILISATEUR
#------------------------------------------------------------

CREATE TABLE UTILISATEUR(
        id_user Int  Auto_increment  NOT NULL ,
        nom     Varchar (50) NOT NULL ,
        prenom  Varchar (50) NOT NULL ,
        type    Varchar (50) NOT NULL ,
        login   Varchar (50) NOT NULL ,
        mdp     Varchar (50) NOT NULL
	,CONSTRAINT UTILISATEUR_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CLIENT
#------------------------------------------------------------

CREATE TABLE CLIENT(
        id_client Int  Auto_increment  NOT NULL ,
        nom       Varchar (50) NOT NULL ,
        prenom    Varchar (50) NOT NULL ,
        id_user   Int NOT NULL
	,CONSTRAINT CLIENT_PK PRIMARY KEY (id_client)

	,CONSTRAINT CLIENT_UTILISATEUR_FK FOREIGN KEY (id_user) REFERENCES UTILISATEUR(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: OPERATION
#------------------------------------------------------------

CREATE TABLE OPERATION(
        id_ope              Int  Auto_increment  NOT NULL ,
        description         Varchar (50) NOT NULL ,
        type                Varchar (50) NOT NULL ,
        statut              Varchar (50) NOT NULL ,
        cout                Int NOT NULL ,
        date_comm           Date NOT NULL ,
        id_user             Int NOT NULL ,
        id_user_UTILISATEUR Int NOT NULL ,
        id_client           Int NOT NULL
	,CONSTRAINT OPERATION_PK PRIMARY KEY (id_ope)

	,CONSTRAINT OPERATION_UTILISATEUR_FK FOREIGN KEY (id_user) REFERENCES UTILISATEUR(id_user)
	,CONSTRAINT OPERATION_UTILISATEUR0_FK FOREIGN KEY (id_user_UTILISATEUR) REFERENCES UTILISATEUR(id_user)
	,CONSTRAINT OPERATION_CLIENT1_FK FOREIGN KEY (id_client) REFERENCES CLIENT(id_client)
)ENGINE=InnoDB;

