USE breezedemo;

DROP PROCEDURE IF EXISTS SP_CreateAllergeen;

DELIMITER $$

CREATE PROCEDURE SP_CreateAllergeen(
    IN p_Naam VARCHAR(100),
    IN p_Omschrijving VARCHAR(255)
)
BEGIN
    INSERT INTO Allergeen (Naam, Omschrijving, IsActief)
    VALUES (p_Naam, p_Omschrijving, TRUE);
END$$

DELIMITER ;
