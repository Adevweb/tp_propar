/* Procédure stockées pour le CA */

DELIMITER //
    CREATE PROCEDURE see_CA()
    BEGIN
        SELECT SUM(cout) FROM end_ope WHERE statut = 'Terminer';
    END //
DELIMITER ;