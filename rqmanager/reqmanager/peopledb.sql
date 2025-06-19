
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `people` (
  `people_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mid_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `people` (`people_id`, `first_name`, `last_name`, `mid_name`) VALUES
(33, 'dsa', 'dsa', 'dsa'),
(34, 'cs', 'csz', 'SDZZZZZZZZZZZZZ');


ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`);


ALTER TABLE `people`
  MODIFY `people_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;
