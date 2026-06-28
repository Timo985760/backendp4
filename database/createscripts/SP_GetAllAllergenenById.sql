USE breezedemo;

DROP PROCEDURE IF EXISTS SP_GetAllAllergenenById;

DELIMITER $$

CREATE PROCEDURE SP_GetAllAllergenenById(
    IN p_Id INT
)
BEGIN
    SELECT Id,
           Naam,
           Omschrijving
    FROM Allergeen
    WHERE Id = p_Id;
END$$

DELIMITER ;
