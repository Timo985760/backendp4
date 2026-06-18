USE breezedemo;

DROP PROCEDURE IF EXISTS Sp_GetUserById;

DELIMITER $$

CREATE PROCEDURE Sp_GetUserById(
    IN p_Id INT
)
BEGIN
    SELECT
        USRS.id,
        USRS.name,
        USRS.email,
        USRS.rolename
    FROM users AS USRS
    WHERE USRS.id = p_Id;
END$$

DELIMITER ;
