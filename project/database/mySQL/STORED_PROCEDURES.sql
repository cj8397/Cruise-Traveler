-- Country Sumamries

DROP PROCEDURE IF EXISTS event_country_summary;
DELIMITER //
CREATE PROCEDURE event_country_summary(IN id INT)
	BEGIN
        SELECT ud.country AS 'country', COUNT(ud.country) as 'count'
		FROM user_events ue, user_details ud
		WHERE ue.event_id = id AND ue.user_id =  ud.user_id -- gets you all details in sailing
		GROUP BY ud.country;

	END //
DELIMITER ;

CALL event_country_summary(91);

DROP PROCEDURE IF EXISTS sailing_country_summary;
DELIMITER //
CREATE PROCEDURE sailing_country_summary(IN id INT)
	BEGIN
        SELECT ud.country AS 'country', COUNT(ud.country) as 'count'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		GROUP BY ud.country;

	END //
DELIMITER ;

CALL sailing_country_summary(91);


-- LANGUAGE SUMMARIES

DROP PROCEDURE IF EXISTS sailing_language_summary;
DELIMITER //
CREATE PROCEDURE sailing_language_summary(IN id INT)
	BEGIN
        SELECT ud.lang AS 'language', COUNT(ud.lang) as 'count'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		GROUP BY ud.lang;
	END //
DELIMITER ;

CALL sailing_language_summary(1);



DROP PROCEDURE IF EXISTS event_language_summary;
DELIMITER //
CREATE PROCEDURE event_language_summary(IN id INT)
	BEGIN
        SELECT ud.lang AS 'language', COUNT(ud.lang) as 'count'
		FROM user_events ue, user_details ud
		WHERE ue.event_id = id AND ue.user_id =  ud.user_id -- gets you all details in sailing
		GROUP BY ud.lang;
	END //
DELIMITER ;

CALL event_language_summary(91);


-- CALL event_language_summary(91);
-- CALL event_country_summary(91);
-- CALL event_stats_summary(91);

-- CALL sailing_language_summary(1);
-- CALL sailing_country_summary(1);
-- CALL sailing_stats_summary(1);

-- CITY SUMMARY

DROP PROCEDURE IF EXISTS event_city_summary;
DELIMITER //
CREATE PROCEDURE event_city_summary(IN id INT)
	BEGIN
        SELECT ud.city AS 'city', COUNT(ud.city) as 'count'
		FROM user_events ue, user_details ud
		WHERE ue.event_id = id AND ue.user_id =  ud.user_id -- gets you all details in sailing
		GROUP BY ud.city;
	END //
DELIMITER ;

CALL event_city_summary(1);

DROP PROCEDURE IF EXISTS sailing_city_summary;
DELIMITER //
CREATE PROCEDURE sailing_city_summary(IN id INT)
	BEGIN
        SELECT ud.city AS 'city', COUNT(ud.city) as 'count'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		GROUP BY ud.city;
	END //
DELIMITER ;

CALL sailing_city_summary(1);

-- STATS SUMMARY
c
DELIMITER $$
CREATE DEFINER=`cruise_user`@`localhost` PROCEDURE `event_stats_summary`(IN id INT)
BEGIN
		SET @male = (SELECT COUNT(ud.sex) as 'male'
		FROM user_events us, user_details ud
		WHERE us.event_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.sex = 1);

        SET @family = (SELECT COUNT(ud.family) as 'families'
		FROM user_events us, user_details ud
		WHERE us.event_id = id AND us.user_id = ud.user_id -- gets you all details in sailing
		AND ud.family = 1);


        SET @youth =(SELECT COUNT(ud.age) as 'youth'
		FROM user_events us, user_details ud
		WHERE us.event_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age < 18);

		SET @young = (SELECT COUNT(ud.age) as 'young'
		FROM user_events us, user_details ud
		WHERE us.event_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 18 AND ud.age < 25);

		SET @adult = (SELECT COUNT(ud.age) as 'adult'
		FROM user_events us, user_details ud
		WHERE us.event_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 25 AND ud.age < 35);

		SET @middleaged = (SELECT COUNT(ud.age) as 'middleaged'
		FROM user_events us, user_details ud
		WHERE us.event_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 35 AND ud.age < 45);

        SET @youngelders = (SELECT COUNT(ud.age) as 'youngelders'
		FROM user_events us, user_details ud
		WHERE us.event_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 45 AND ud.age < 55);

        SET @elders = (SELECT COUNT(ud.age) as 'seniors'
		FROM user_events us, user_details ud
		WHERE us.event_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 70);

        SET @seniors = (SELECT COUNT(ud.age) as 'elders'
		FROM user_events us, user_details ud
		WHERE us.event_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 55 AND ud.age < 70);

        -- DROP TEMPORARY TABLE IF EXISTS stats;
        CREATE TEMPORARY TABLE
		stats( male INT, family INT,
        youth INT, young INT, adult INT, middleaged INT, youngelders INT, elders INT, seniors INT);
        INSERT INTO stats SELECT @male, @family, @youth, @young, @adult, @middleaged, @youngelders, @elders, @seniors;
        SELECT * FROM stats;
        DROP TEMPORARY TABLE stats;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`cruise_user`@`localhost` PROCEDURE `sailing_stats_summary`(IN id INT)
BEGIN

		SET @male = (SELECT COUNT(ud.sex) as 'male'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.sex = 1);

        SET @family = (SELECT COUNT(ud.family) as 'families'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.family = 1);


        SET @youth =(SELECT COUNT(ud.age) as 'youth'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age < 18);

		SET @young = (SELECT COUNT(ud.age) as 'young'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 18 AND ud.age < 25);

		SET @adult = (SELECT COUNT(ud.age) as 'adult'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 25 AND ud.age < 35);

		SET @middleaged = (SELECT COUNT(ud.age) as 'middleaged'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 35 AND ud.age < 45);

        SET @youngelders = (SELECT COUNT(ud.age) as 'youngelders'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 45 AND ud.age < 55);

        SET @elders = (SELECT COUNT(ud.age) as 'seniors'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 70);

        SET @seniors = (SELECT COUNT(ud.age) as 'elders'
		FROM user_sailings us, user_details ud
		WHERE us.sailing_id = id AND us.user_id =  ud.user_id -- gets you all details in sailing
		AND ud.age >= 55 AND ud.age < 70);

        -- DROP TEMPORARY TABLE IF EXISTS stats;
        CREATE TEMPORARY TABLE
		stats( male INT, family INT,
        youth INT, young INT, adult INT, middleaged INT, youngelders INT, elders INT, seniors INT);
        INSERT INTO stats SELECT @male, @family, @youth, @young, @adult, @middleaged, @youngelders, @elders, @seniors;
        SELECT * FROM stats;
        DROP TEMPORARY TABLE stats;
	END$$
DELIMITER ;
