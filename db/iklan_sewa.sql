SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `iklan_sewa`;
CREATE TABLE `iklan_sewa` (
  `id` int NOT NULL,
  `iklan_id` int NOT NULL,
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `jl` varchar(255) NOT NULL,
  `jenis` tinyint NOT NULL,
  `dimensi` tinyint NOT NULL,
  `ukuran` tinyint NOT NULL,
  `lightning` tinyint NOT NULL,
  `sisi` tinyint NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `durasi` tinyint NOT NULL,
  `harga` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `iklan_sewa`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `iklan_sewa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
