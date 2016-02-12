

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zaasedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `zaasetb`
--

CREATE TABLE IF NOT EXISTS `zaasetb` (
  `category` varchar(25) NOT NULL,
  `amount` int(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`,`amount`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `zaasetb`
--

INSERT INTO `zaasetb` (`category`, `amount`, `id`) VALUES
('', 0, 42),
('ahah', 2849, 38),
('jean', 3255, 36),
('jeans', 46, 39),
('mangue', 950, 41),
('shgvg', 816, 37),
('yannick', 708, 40);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
