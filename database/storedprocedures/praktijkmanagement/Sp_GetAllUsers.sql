USE breezedemo;

DROP PROCEDURE IF EXISTS sp_GetAllUsers;

DELIMITER $$

CREATE PROCEDURE sp_GetAllUsers(
    IN p_Id INT
)
BEGIN
    SELECT 
        USRS.id,
        USRS.name,
        USRS.email,
        USRS.rolename
    FROM users AS USRS
    WHERE USRS.id != p_Id;
END$$

DELIMITER ;
