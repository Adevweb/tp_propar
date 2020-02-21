/* TRIGGER POUR ALIMENTER LA TABLE end_ope PAR LES OPERATIONS SUPPRIMES DE LA TALBE operation */
DELIMITER //
	CREATE TRIGGER end_of_ope
    BEFORE DELETE ON operation
    FOR EACH ROW
	BEGIN
    INSERT INTO end_ope (
        id_ope,
        description,
        type,
        statut,
        cout,
        date_comm,
        id_user,
        id_user_FAIT,
        id_client,
        end_date
        )
     VALUES (
         OLD.id_ope,
         OLD.description,
         OLD.type,
         OLD.statut,
         OLD.cout,
         OLD.date_comm,
         OLD.id_user,
         OLD.id_user_FAIT,
         OLD.id_client,
         DATE(NOW())
         );
      END; //
DELIMITER ;

/* TRIGGER POUR METTRE LES INSERT EN MAJ SUR TAB USER */

DELIMITER //
	CREATE TRIGGER maj_user
    BEFORE INSERT ON utilisateur
    FOR EACH ROW
	BEGIN
    SET NEW.nom = UPPER(NEW.nom);
    SET NEW.type = UPPER(NEW.type); 
    SET NEW.prenom = UPPER(NEW.prenom);
    END; //
DELIMITER ;

/* TRIGGER POUR METTRE LES INSERT EN MAJ SUR TAB CLIENT */

DELIMITER //
	CREATE TRIGGER maj_client
    BEFORE INSERT ON client
    FOR EACH ROW
	BEGIN
    SET NEW.nom = UPPER(NEW.nom);
    SET NEW.prenom = UPPER(NEW.prenom);
    END; //
DELIMITER ;

/* Procédure stockées pour le CA */

DELIMITER //
    CREATE PROCEDURE see_CA()
    BEGIN
        SELECT SUM(cout) FROM end_ope WHERE statut = 'Terminer';
    END //
DELIMITER ;