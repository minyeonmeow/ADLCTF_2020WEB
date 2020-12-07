SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";

CREATE TABLE `messageboard` (
  `id` int(11) NOT NULL auto_increment,
  `time` timestamp NOT NULL default current_timestamp,
  `session_id` text NOT NULL,
  `message` text NOT NULL,
  `is_read` boolean default false,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
