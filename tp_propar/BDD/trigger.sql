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
        id_user_FAIT, /* Verif BDD le nom */
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