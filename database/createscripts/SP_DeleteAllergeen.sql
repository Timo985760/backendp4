USE breezedemo;

DROP PROCEDURE IF EXISTS SP_DeleteAllergeen;

DELIMITER $$

CREATE PROCEDURE SP_DeleteAllergeen(
    IN p_Id INT
)
BEGIN
    DELETE FROM Allergeen
    WHERE Id = p_Id;
END$$

DELIMITER ;
