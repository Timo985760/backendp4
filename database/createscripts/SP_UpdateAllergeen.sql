USE breezedemo;

DROP PROCEDURE IF EXISTS SP_UpdateAllergeen;

DELIMITER $$

CREATE PROCEDURE SP_UpdateAllergeen(
    IN p_Id INT,
    IN p_Naam VARCHAR(100),
    IN p_Omschrijving VARCHAR(255)
)
BEGIN
    UPDATE Allergeen
    SET Naam = p_Naam,
        Omschrijving = p_Omschrijving
    WHERE Id = p_Id;
END$$

DELIMITER ;
