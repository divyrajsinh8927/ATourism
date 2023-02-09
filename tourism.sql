-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 08:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `BookingFor` varchar(200) NOT NULL,
  `Hotel_id` int(11) NOT NULL,
  `BookingDate` date NOT NULL,
  `ArrivalDate` date NOT NULL,
  `LeavingDate` date NOT NULL,
  `Totaldays` int(11) NOT NULL,
  `TotalRooms` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Status` int(11) DEFAULT NULL,
  `BookingIsCancel` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Id`, `User_id`, `BookingFor`, `Hotel_id`, `BookingDate`, `ArrivalDate`, `LeavingDate`, `Totaldays`, `TotalRooms`, `TotalPrice`, `Status`, `BookingIsCancel`) VALUES
(18, 7, 'darshan', 1, '2022-08-01', '2022-08-02', '2022-08-04', 3, 2, 18750, 1, 0),
(19, 7, 'darshan', 5, '2022-08-20', '2022-08-22', '2022-08-24', 3, 1, 6747, 1, 0),
(20, 7, 'darshan', 12, '2022-08-26', '2022-09-01', '2022-09-03', 3, 1, 14847, 0, 0),
(21, 7, 'darshit', 1, '2022-09-03', '2022-09-13', '2022-09-15', 3, 3, 28125, 0, 0),
(22, 7, 'chirag', 2, '2022-09-08', '2022-09-13', '2022-09-14', 2, 2, 8400, NULL, 0),
(24, 7, 'parin', 1, '2022-09-09', '2022-09-12', '2022-09-13', 2, 1, 6250, NULL, 0),
(25, 7, 'vaibhav', 1, '2022-09-09', '2022-09-10', '2022-09-10', 1, 25, 78125, NULL, 1),
(26, 7, 'meraz', 1, '2022-09-13', '2022-09-16', '2022-09-23', 8, 2, 50000, NULL, 1),
(27, 7, 'nishit', 1, '2022-09-15', '2022-09-16', '2022-09-17', 2, 2, 12500, NULL, 0),
(28, 7, 'jayesh', 16, '2022-09-15', '2022-09-16', '2022-09-17', 2, 2, 7524, NULL, 0),
(29, 7, 'vijay', 12, '2022-08-01', '2022-12-13', '2022-09-14', 2, 3, 2000, NULL, 1),
(31, 7, 'Divyrajsinh', 11, '0000-00-00', '0000-00-00', '0000-00-00', 2, 2, 8400, NULL, 0),
(32, 7, 'DIGU', 2, '0000-00-00', '0000-00-00', '0000-00-00', 2, 2, 8400, NULL, 0),
(33, 7, 'Divyrajsinh', 11, '0000-00-00', '0000-00-00', '2023-01-29', 2, 2, 8400, NULL, 0),
(34, 7, 'me', 3, '0000-00-00', '2023-01-30', '0000-00-00', 2, 1, 5998, NULL, 0),
(35, 7, 'll', 3, '2023-01-30', '2023-01-30', '2023-01-31', 2, 2, 11996, NULL, 0),
(36, 7, 'hhhh', 3, '2023-02-06', '2023-02-07', '2023-02-28', 22, 3, 197934, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `Id` int(11) NOT NULL,
  `CityName` varchar(100) NOT NULL,
  `State_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`Id`, `CityName`, `State_id`) VALUES
(1, 'Jamnagar', 1),
(2, 'Kutch', 1),
(3, 'patan', 1),
(4, 'Ahmedabad', 1),
(5, 'Dwarka', 1),
(6, 'Somnath', 1),
(7, 'Junagadh', 1),
(8, 'Gandhinagar', 1),
(9, 'Jaipur', 2),
(10, 'Udaipur', 2),
(11, 'Jaisalmer', 2),
(12, 'Jodhpur', 2),
(13, 'Agra', 3),
(14, 'Varansi', 3),
(15, 'Mathura', 3),
(16, 'Ayodya', 3),
(19, 'Lucknow', 3),
(20, 'Allahbad', 3),
(21, 'New Delhi', 5),
(23, 'SriNagar', 6),
(24, 'Jammu', 6),
(25, 'Anantnag', 6),
(26, 'Vasco Da Gama', 7),
(27, 'Margao', 7),
(28, 'Panagi', 7),
(29, 'Mapusa', 7),
(30, 'Pnada', 7),
(31, 'Kochi', 8),
(32, 'Thiruvanthapuram', 8),
(33, 'Kannur', 8),
(34, 'Kottayam', 8),
(35, 'Guwahati', 9),
(36, 'Tezpur', 9),
(37, 'Bongaigaon', 9),
(38, 'Shimla', 10),
(39, 'Dharamsala', 10),
(40, 'Parwanoo', 10),
(41, 'Manali', 10),
(42, 'Paris', 11),
(43, 'Cannes', 12),
(44, 'Provence', 14),
(45, 'Lxor', 15),
(46, 'Hurhada', 16),
(47, 'Giza', 17),
(48, 'Pyramid Of Djiser', 18),
(49, 'Berlin', 19),
(50, 'Sonneberg', 20),
(51, 'Marpingen', 21),
(52, 'Bexbach', 21),
(53, 'Vatican', 43),
(54, 'SanMarino', 24),
(55, 'Casole', 24),
(56, 'Sant Marti', 25),
(57, 'La Sagrada Familia', 25),
(58, 'Almeria', 26),
(59, 'Madrid', 27),
(60, 'Pontevedra', 28),
(61, 'Bhisho', 29),
(62, 'Port Elizabeth', 29),
(63, 'East London', 29),
(64, 'Durban', 30),
(65, 'Mahikeng', 31),
(66, 'Vryburg', 31),
(67, 'Klerksdorp', 31),
(68, 'Cape Town', 32),
(69, 'Stellenbosch', 32),
(70, 'Birendranagra', 33),
(71, 'Chandannath', 33),
(72, 'Dipayal Silgadhi', 34),
(73, 'Attariya', 34),
(74, 'Tulsipur', 35),
(75, 'Butval', 35),
(76, 'Kathmandu', 36),
(77, 'Gaurishankar Conservation Area', 36),
(78, 'Janakpur', 37),
(79, 'Birgunj', 37),
(80, 'Makalu Barun National Park', 38),
(81, 'Greenwitch', 39),
(82, 'Urban', 40),
(83, 'Dores', 40),
(84, 'Inshes', 40),
(85, 'Liverpool', 41),
(86, 'Blackpool', 41),
(87, 'Hale', 41),
(88, 'Eaton Socon', 42),
(89, 'Ely', 42),
(90, 'Rudraprayag', 44),
(91, 'Dubai', 45);

-- --------------------------------------------------------

--
-- Table structure for table `client_reiviws`
--

CREATE TABLE `client_reiviws` (
  `Id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Reviews` varchar(1000) NOT NULL,
  `Stars` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_reiviws`
--

INSERT INTO `client_reiviws` (`Id`, `User_id`, `Reviews`, `Stars`) VALUES
(1, 7, 'Very good for the most part. Fortunately we had the phone number of the driver who collected us on arrival and he was able to help us.', 5),
(4, 26, 'Very good for the most part. Fortunately we had the phone number of the driver who collected us on arrival and he was able to help us.', 4),
(5, 27, 'Great package and good follow up.\r\nCritical travel info does get lost with all of the other marketing info so I deleted it and then had to get it sent again as it wasn\'t just marketing.\r\nVery happy and hope there are more all included deals available.', 4),
(6, 7, 'Nice', 5);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `Id` int(11) NOT NULL,
  `CountryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`Id`, `CountryName`) VALUES
(1, 'India'),
(2, 'France'),
(3, 'Egypt'),
(4, 'Germany'),
(5, 'Italy'),
(6, 'Russia'),
(7, 'Spain'),
(8, 'South Africa'),
(9, 'Nepal'),
(10, 'UK'),
(11, 'UAE');

-- --------------------------------------------------------

--
-- Table structure for table `hotelmedia`
--

CREATE TABLE `hotelmedia` (
  `Id` int(11) NOT NULL,
  `HotelImages` varchar(100) NOT NULL,
  `Hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelmedia`
--

INSERT INTO `hotelmedia` (`Id`, `HotelImages`, `Hotel_id`) VALUES
(1, 'hotelfortunepalace1.jpg', 1),
(2, 'HotelHighwayHari.jpg', 2),
(3, 'HotelFoliage.jpg', 3),
(4, 'AnayaBeaconHotel.jpg', 4),
(5, 'TheFernRoyalFarmResort.jpg', 5),
(6, 'RamadabyWyndhamGandhidhamShinay.jpg', 6),
(7, 'tulsi-residency.jpg', 7),
(8, 'TheGrandRaveta.jpg', 8),
(9, 'HotelDolphinResidency.jpg', 9),
(10, 'HotelTheGrandPiano.jpg', 10),
(11, 'NovotelAhmedabad.jpg', 11),
(12, 'TheFortuneLandmark.jpg', 12),
(13, 'HawthornSuitesbyWyndham.jpg', 13),
(14, 'THEGRANDASTORIASOMANTH.jpg', 16),
(19, 'about-img.jpg', 25),
(20, '6.jpg', 25),
(21, '79.jpg', 25),
(22, 'hotelfortunepalace2.jpg', 1),
(23, 'hotelfortunepalace3.jpg', 1),
(26, 'HotelHighwayHari2.jpg', 2),
(27, 'HotelHighwayHari3.jpg', 2),
(28, 'HotelFoliage2.jpg', 3),
(29, 'HotelFoliage3.jpg', 3),
(30, 'AnayaBeaconHotel2.jpg', 4),
(31, 'AnayaBeaconHotel3.jpg', 4),
(32, 'TheFernRoyalFarmResort2.jpg', 5),
(33, 'TheFernRoyalFarmResort3.jpg', 5),
(34, 'RamadabyWyndhamGandhidhamShinay3.jpg', 6),
(35, 'RamadabyWyndhamGandhidhamShinay2.jpg', 6),
(36, 'tulsi-residency2.jpg', 7),
(37, 'tulsi-residency3.jpg', 7),
(38, 'TheGrandRaveta2.jpg', 8),
(39, 'TheGrandRaveta3.jpg', 8),
(40, 'HotelDolphinResidency2.jpg', 9),
(41, 'HotelDolphinResidency3.jpg', 9),
(42, 'HotelTheGrandPiano2.jpg', 10),
(43, 'HotelTheGrandPiano3.jpg', 10),
(44, 'NovotelAhmedabad2.jpg', 11),
(45, 'NovotelAhmedabad3.jpg', 11),
(46, 'TheFortuneLandmark2.jpg', 12),
(47, 'TheFortuneLandmark3.jpg', 12),
(48, 'HawthornSuitesbyWyndham2.jpg', 13),
(49, 'HawthornSuitesbyWyndham3.jpg', 13),
(50, 'THEGRANDASTORIASOMANTH2.jpg', 16),
(51, 'THEGRANDASTORIASOMANTH3.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `Id` int(11) NOT NULL,
  `HotelName` varchar(100) NOT NULL,
  `PerDayPrice` int(11) NOT NULL,
  `City_id` int(11) NOT NULL,
  `HotelDetail` varchar(10000) NOT NULL,
  `User_id` int(11) NOT NULL,
  `HotelIsDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`Id`, `HotelName`, `PerDayPrice`, `City_id`, `HotelDetail`, `User_id`, `HotelIsDelete`) VALUES
(1, 'Hotel Fortune Palace', 3125, 1, 'Set in Jamnagar, 5 km from Khijadiya Bird Sanctuary, Hotel Fortune Palace offers accommodation with a restaurant, free private parking, a fitness centre and a shared lounge.', 12, 0),
(2, 'Hotel Highway Hari', 2100, 1, 'Situated in Jamnagar, 4.1 km from Khijadiya Bird Sanctuary, Hotel Highway Hari features accommodation with a restaurant, free private parking, a garden and a terrace.', 13, 0),
(3, 'Hotel Foliage', 2999, 1, 'Situated in Jamnagar, 3 km from Khijadiya Bird Sanctuary, Hotel Foliage features air-conditioned accommodation and a shared lounge. Everything. Rooms are neat and clean. Staff are polite and courteous.', 14, 0),
(4, 'Anaya Beacon Hotel', 3248, 1, 'Located in Jamnagar, Anaya Beacon Hotel is 5 km from Khijadiya Bird Sanctuary. This 3-star hotel offers free WiFi. The property has a restaurant. All rooms in the hotel are fitted with a kettle. Very clean and tidy hotel. Restaurant on 2nd floor had good variety of south Indian dishes. Very courteous staff both at the reception and restaurant made us feel welcome. Soorej at the reception has given us written directions to visit places. Loved our stay Bathroom in the room is of excellent quality and shower base is super with comfortable shower.\n\n', 15, 0),
(5, 'The Fern Royal Farm Resort', 2249, 2, 'The Fern Royal Farm Resort, Anjar is located in Anjār. Featuring a 24-hour front desk, this property also provides guests with a restaurant. At the hotel, each room is fitted with a desk. We checked in at 1 midnight and yet the staff was able to help us book the room.', 16, 0),
(6, 'Ramada by Wyndham Gandhidham Shinay ', 3675, 2, 'Ramada by Wyndham Gandhidham Shinay has a restaurant, outdoor swimming pool, a fitness centre and shared lounge in Gandhidham. all was above expectations. staff food were too coriol. including spa.', 17, 0),
(7, 'Hotel Tulsi Residency', 963, 2, 'Set in Bhuj, 7 km from Shree Swaminarayan Temple, Hotel Tulsi Residency offers accommodation with a restaurant, free private parking and a shared lounge. The staff was very helpful and ready to make you comfortable at all times.', 18, 0),
(8, 'The Grand Raveta', 1720, 3, 'Situated in Pātan, 6 km from Rani Ki Vav, The Grand Raveta features accommodation with a restaurant, free private parking, a garden and a terrace. The accommodation offers a 24-hour front desk, airport transfers, room service and free WiFi throughout the property.\r\n\r\nAt the hotel, rooms are equipped with a desk, a flat-screen TV, a private bathroom, bed linen and towels. All rooms at The Grand Raveta have air conditioning and a wardrobe.\r\n\r\nThe accommodation offers a buffet or vegetarian breakfast.', 19, 0),
(9, 'Hotel Dolphin Residency', 1240, 3, 'Situated in Pātan, 3.9 km from Rani Ki Vav, Hotel Dolphin Residency provides accommodation with a terrace and free private parking. The accommodation features a 24-hour front desk and room service for guests.\r\n\r\nAll rooms at the guest house are fitted with a seating area. The private bathroom is fitted with a shower, slippers and free toiletries. The rooms will provide guests with air conditioning, a safety deposit box and a flat-screen TV.\r\n\r\nHotel Dolphin Residency offers an Asian or vegetarian breakfast', 20, 0),
(10, 'Hotel The Grand Piano', 1665, 3, 'Featuring a terrace, Hotel The Grand Piano is located in Pātan in the Gujarat region, 3.5 km from Rani Ki Vav. Among the facilities of this property are a restaurant, a 24-hour front desk and room service, along with free WiFi. Free private parking is available and the hotel also provides car hire for guests who want to explore the surrounding area.\r\n\r\nAll units are equipped with air conditioning, a flat-screen TV with cable channels, a kettle, a shower, slippers and a desk. At the hotel every room is equipped with a wardrobe and a private bathroom.\r\n\r\nGuests at Hotel The Grand Piano can enjoy a continental breakfast.', 21, 0),
(11, 'Novotel Ahmedabad', 4699, 4, 'Novotel Ahmedabad – a 5 star contemporary business hotel located in the central business district of Ahmedabad on S G Highway with easy access to Gandhinagar, Sanand, Changodar industrial area and 15... \r\n\r\nFront office team is very helpful and nice Mr. Pankaj and Ankit was very helpful during my stay', 22, 0),
(12, 'The Fortune Landmark', 4949, 4, 'Only 1 km from downtown Ahmedabad, the Fortune Landmark Hotel offers air-conditioned rooms and 3 dining options. The hotel features a fitness centre. very good property and very good food', 23, 0),
(13, 'Hawthorn Suites by Wyndham', 5040, 5, 'Get the celebrity treatment with world-class service at Hawthorn Suites by Wyndham Dwarka\r\nSituated in Dwarka, 7 km from Dwarkadhish Temple, Hawthorn Suites by Wyndham Dwarka features accommodation with a restaurant, free private parking, a fitness centre and a garden. Boasting a concierge service, this property also provides guests with an outdoor pool. The accommodation provides a 24-hour front desk, room service and currency exchange for guests.\r\n\r\nAt the hotel, rooms come with a wardrobe. Complete with a private bathroom fitted with a shower and slippers, the rooms at Hawthorn Suites by Wyndham Dwarka have a TV and air conditioning, and some rooms include a seating area.\r\n\r\nThe accommodation offers a continental or buffet breakfast.\r\n\r\nHawthorn Suites by Wyndham Dwarka offers a children\'s playground. The area is popular for cycling, and car hire is available at the hotel.', 24, 0),
(16, 'THE GRAND ASTORIA SOMANTH', 1881, 6, 'Set in Somnath, 11 km from Somnath Temple, THE GRAND ASTORIA SOMANTH offers accommodation with a restaurant, free private parking, a shared lounge and a garden. This 3-star hotel offers a shared kitchen and room service. The property features a hot spring bath, evening entertainment and a 24-hour front desk.\r\n\r\nAt the hotel all rooms come with air conditioning, a desk, a flat-screen TV, a private bathroom, bed linen, towels and a patio with a garden view. THE GRAND ASTORIA SOMANTH provides certain units with sea views, and every room includes a balcony. The units at the accommodation come with a seating area.\r\n\r\nA buffet breakfast is available every morning at THE GRAND ASTORIA SOMANTH.\r\n\r\nThe hotel offers a children\'s playground. The area is popular for cycling, and bike hire and car hire are available at THE GRAND ASTORIA SOMANTH.\r\n\r\nThe nearest airport is Diu Airport, 92 km from the accommodation.', 25, 0),
(25, 'dfsdf', 5555, 69, 'trtertr', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `placemedia`
--

CREATE TABLE `placemedia` (
  `Id` int(11) NOT NULL,
  `PlaceImages` varchar(100) NOT NULL,
  `Place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placemedia`
--

INSERT INTO `placemedia` (`Id`, `PlaceImages`, `Place_id`) VALUES
(1, 'Tajmahal1.jpg', 2),
(2, 'bhujiyo-kotho1.jpg', 3),
(3, 'burj-khalifa1.jpg', 4),
(4, 'kedarnath1.jpg', 13),
(5, 'dholavira.jpg', 14),
(6, 'SwaminarayanTemple.jpg', 15),
(7, 'Rani_ki_vav_01.jpg', 16),
(8, 'Tajmahal3.jpg', 2),
(15, '5.jpg', 26),
(16, 'dholavira.jpg', 26),
(17, 'about-img.jpg', 26),
(18, 'AnayaBeaconHotel.jpg', 27),
(19, 'dholavira.jpg', 27),
(20, '6.jpg', 27),
(21, 'Tajmahal2.jpg', 2),
(22, 'bhujiyo-kotho2.jpg', 3),
(23, 'bhujiyo-kotho3.jpg', 3),
(24, 'burj-khalifa2.jpg', 4),
(25, 'burj-khalifa3.jpg', 4),
(26, 'kedarnath2.jpg', 13),
(27, 'kedarnath3.jpg', 13),
(28, 'dholavira2.jpg', 14),
(29, 'dholavira3.jpg', 14),
(30, 'SwaminarayanTemple2.jpg', 15),
(31, 'SwaminarayanTemple3.jpg', 15),
(32, 'Rani_ki_vav_02.jpg', 16),
(33, 'Rani_ki_vav_03.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `Id` int(11) NOT NULL,
  `PlaceName` varchar(100) NOT NULL,
  `City_id` int(11) NOT NULL,
  `Discription` mediumtext NOT NULL,
  `PlaceIsDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`Id`, `PlaceName`, `City_id`, `Discription`, `PlaceIsDelete`) VALUES
(2, 'Taj Mahal', 13, 'The Taj Mahal is located on the right bank of the Yamuna River in a vast Mughal garden that encompasses nearly 17 hectares, in the Agra District in Uttar Pradesh. It was built by Mughal Emperor Shah Jahan in memory of his wife Mumtaz Mahal with construction starting in 1632 AD and completed in 1648 AD, with the mosque, the guest house and the main gateway on the south, the outer courtyard and its cloisters were added subsequently and completed in 1653 AD.', 0),
(3, 'Bhujiyo Kotho', 1, 'About the location: This impressive yet crumbling tower in Jamnagar overlooks the south side of Ranmal Lake. It is also known as the Bhujiyo Bastion. Restoration work is underway; once completed, visitors will be able to view the city from the top of the tower.\r\n\r\nBrief History: It is believed that the king of Jamnagar and Bhuj were brothers who had set up their kingdoms about 300km apart. They even designed the cities in the same fashion. Bhujiyo Kotho was presumably the entrance to a secret passage from Jamnagar to Bhuj. While no one ratified this by taking the part, the story was intriguing.\r\n\r\nBest time to visit: The best time to visit is between November and February.', 0),
(4, 'Burj Khalifa', 91, 'The Burj Khalifa (/ˈbɜːrdʒ kəˈliːfə/; Arabic: برج خليفة, Arabic pronunciation: [bʊrd͡ʒ xaˈliːfa], Khalifa Tower), known as the Burj Dubai prior to its inauguration in 2010, is a skyscraper in Dubai, United Arab Emirates. With a total height of 829.8 m (2,722 ft, or just over half a mile) and a roof height (excluding antenna, but including a 223 m spire[2]) of 828 m (2,717 ft), the Burj Khalifa has been the tallest structure and building in the world since its topping out in 2009, supplanting Taipei 101, the previous holder of that status.\r\n\r\nHistory of height increases\r\n\r\nBurj Khalifa compared with some other well-known tall structures\r\nThere are unconfirmed reports of several planned height increases since its inception. Originally proposed as a virtual clone of the 560 m (1,837 ft) Grollo Tower proposal for Melbourne, Australia\'s Docklands waterfront development, the tower was redesigned by Skidmore, Owings and Merrill.[32] Marshall Strabala, a Skidmore, Owings and Merrill architect who worked on the project until 2006, said in late 2008 that Burj Khalifa was designed to be 808 m (2,651 ft) tall.\r\n\r\nThe architect who designed it, Adrian Smith, felt that the uppermost section of the building did not culminate elegantly with the rest of the structure, so he sought and received approval to increase its height.[citation needed] It was stated that this change did not add any floors, which fit with Smith\'s attempts to make the crown more slender. The building opened on 4 January 2010.', 0),
(13, 'Kedarnath', 90, 'Kedarnath is located at a distance of 223 km from Rishikesh in Uttarakhand and close to the source of the Mandakini River at the height of 3,583 m (11,755 ft) above sea level. The township is built on a barren stretch of land on the shores of Mandakini river. The surrounding scenery of the Himalayas and green pastures makes it a very attractive place for pilgrimage and trekking. Behind the town and the Kedarnath Temple, stands the majestic Kedarnath peak at 6,940 m (22,769 ft), the Kedar Dome at 6,831 m (22,411 ft) and other peaks of the range.\r\n\r\nHistory :\r\n\r\nKedarnath has been a pilgrimage centre since ancient times.The temple\'s construction is credited to the Pandava brothers mentioned in the Mahabharata. However, the Mahabharata does not mention any place called Kedarnath. One of the earliest references to Kedarnath occurs in the Skanda Purana (c. 7th-8th century), which names Kedara (Kedarnath) as the place where Lord Shiva released the holy waters of Ganga from his matted hair, resulting in the formation of the Ganges River', 0),
(14, 'Dholavira', 2, 'Dholavira (Gujarati: ધોળાવીરા) is an archaeological site at Khadirbet in Bhachau Taluka of Kutch District, in the state of Gujarat in western India, which has taken its name from a modern-day village 1 kilometre (0.62 mi) south of it. This village is 165 km (103 mi) from Radhanpur. Also known locally as Kotada timba, the site contains ruins of a city of the ancient Indus Valley civilization Earthquakes have repeatedly affected Dholavira, including a particularly severe one around 2600 BC.\r\n\r\nThe Harappans spoke an unknown language and their script has not yet been deciphered. It is believed to have had about 400 basic signs, with many variations. The signs may have stood both for words and for syllables. The direction of the writing was generally from right-to-left.[35] Most of the inscriptions are found on seals (mostly made out of stone) and sealings (pieces of clay on which the seal was pressed down to leave its impression). Some inscriptions are also found on copper tablets, bronze implements, and small objects made of terracotta, stone and faience. The seals may have been used in trade and also for official administrative work. A lot of inscribed material was found at Mohenjo-daro and other Indus Valley Civilisation sites.', 0),
(15, 'Baps Shri Swaminarayan Mandir', 1, 'At a distance of 6 km from Jamnagar Railway Station, BAPS Swaminarayan Mandir is a Hindu Temple located on Dwarka Road in the outskirts of Jamnagar city. Situated opposite to the airport, it is one of the popular Swaminarayan Temples in Gujarat and among the best places to visit in Jamnagar as part of Jamnagar Tour.\r\n\r\nDedicated to Lord Swaminarayan, the Swaminarayan Temple in Jamnagar is a very beautiful temple with an air of silence and spirituality at its best. The temple is a remarkable structure of architectural brilliance. The temple also has two separate shrines dedicated to Lord Shiva-Parvati and Lord Rama-Sita. It has a small museum at the bottom of the main temple. It also has a vast well maintained garden and a cafeteria that serves delicious veg snacks.\r\n\r\nThe temple compound is so calm and serene and the sculptures, carvings on the wall and details are a treat to the eyes. It looks ethereal in the night due to its lighting. While you climb up the stairs that lead to the main structure, a wave of divinity seems to emanate from the temple compound. Also, the temple hosts a number of festivals and fairs along with daily prayers.\r\n\r\nTimings: 7.30 AM - 12 PM & 4 PM - 8.30 PM', 0),
(16, 'Rani Ki Vav ', 3, 'Rani Ki Vav is a stepwell situated in the town of Patan in Gujarat state of India. It is located on the banks of Saraswati river. Its construction is attributed to Udayamati, daughter of Khengara of Saurashtra, queen and spouse of the 11th-century Chaulukya king Bhima I. Silted over, it was rediscovered in 1940s and restored in 1980s by the Archaeological Survey of India. It has been listed as one of the UNESCO\'s World Heritage Sites since 2014.\r\n\r\nThe finest and one of the largest examples of its kind and designed as an inverted temple highlighting the sanctity of water, the stepwell is divided into seven levels of stairs with sculptural panels; more than 500 principal sculptures and over a thousand minor ones combine religious, mythological and secular imagery.', 0),
(26, 'rfgerg', 69, 'rertetert', 0),
(27, 'sdfs', 33, 'sdfsdfsd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `Id` int(11) NOT NULL,
  `StateName` varchar(100) NOT NULL,
  `Country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`Id`, `StateName`, `Country_id`) VALUES
(1, 'Gujarat', 1),
(2, 'Rajasthan', 1),
(3, 'UP(Uttar Pradesh)', 1),
(4, 'Ladakh', 1),
(5, 'Delhi', 1),
(6, 'Jammu & Kashmir', 1),
(7, 'Goa', 1),
(8, 'Kerala', 1),
(9, 'Assam', 1),
(10, 'Himachal Pradesh', 1),
(11, 'Paris', 2),
(12, 'Cannes', 2),
(13, 'Lyon', 2),
(14, 'Provence', 2),
(15, 'Lxor', 3),
(16, 'Hurhada', 3),
(17, 'Giza', 3),
(18, 'Pyramid Of Djoser', 3),
(19, 'Berlin', 4),
(20, 'Thuringia', 4),
(21, 'Saarland', 4),
(22, 'North RhineWestphalia', 4),
(24, 'San Marino', 5),
(25, 'Barcelon', 7),
(26, 'Almeria', 7),
(27, 'Madrid', 7),
(28, 'Pontevedra', 7),
(29, 'Easten Cape', 8),
(30, 'KwaZulu-Natal', 8),
(31, 'North West', 8),
(32, 'Western Cape', 8),
(33, 'Karnali', 9),
(34, 'Shchim', 9),
(35, 'Lumbini', 9),
(36, 'Bagmati', 9),
(37, 'Madhesh', 9),
(38, 'Province-1', 9),
(39, 'London', 10),
(40, 'Inverness', 10),
(41, 'Northwest England', 10),
(42, 'Cambridge', 10),
(43, 'Rome', 5),
(44, 'UttaraKhand', 1),
(45, 'Dubai', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `MobileNumber` varchar(15) NOT NULL,
  `UserType` varchar(1) NOT NULL DEFAULT 'U',
  `Email` varchar(100) NOT NULL,
  `PasswordHash` varchar(100) NOT NULL,
  `FirebaseToken` varchar(255) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT 1,
  `UserIsDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `MobileNumber`, `UserType`, `Email`, `PasswordHash`, `FirebaseToken`, `Status`, `UserIsDelete`) VALUES
(6, 'Divyrajsinh', '1234567890', 'A', 'divyrajsinh@gmail.com', '$2y$10$B7WUT579oyJbnHyCrvHS9.altJFmv7ldSZ5hhRzfmM9baV0OhoUVi', NULL, 1, 0),
(7, 'Darshan', '123467890', 'U', 'abc@gmail.com', '$2y$10$xFmm.iG5EtjPdMHmP.k4T.mJXV9jn2y3A4JxIPz1lSC.LY7Q1FK/W', NULL, 1, 0),
(12, 'Hotel Fortune Palace', '1234567891', 'H', 'HotelFortunePalace@gmail.com', '$2y$10$ep47QVwqr1ONgQtbutrs0OIhMJdx.QVr2rnjILlZaX6Vf7l8xC6d2', NULL, 1, 0),
(13, 'Hotel Highway Hari', '9595959595', 'H', 'HotelHighwayHari@gmail.com', '$2y$10$MzJoTT9Q5D7lq36Mgr4.4uZZ8lJBbIH9xsYcpwK9RNcZLoFuO.Gjq', NULL, 1, 0),
(14, 'Hotel Foliage', '9090909090', 'H', 'HotelFoliage@gmail.com', '$2y$10$eMRbuzh458MYv7BhnB4A6u5vTyI.4QwJa29Svm5ea1QHmsvTCgwNa', NULL, 1, 0),
(15, 'Anaya Beacon Hotel', '9191919191', 'H', 'AnayaBeaconHotel@gmail.com', '$2y$10$YAe480kPZjt44UkoiKemfuoaOtdtswdLfjBCmixPI7a11w1ZIyQTm', NULL, 1, 0),
(16, 'The Fern Royal Farm Resort', '9292929292', 'H', 'TheFernRoyalFarmResort@gmail.com', '$2y$10$g9TpKch0sr4DF3.75LIB0eHYzjtH7pf04m6ceXh5a6pT9wp2LwzoK', NULL, 1, 0),
(17, 'Ramada by Wyndham Gandhidham Shinay ', '9393939393', 'H', 'RamadabyWyndhamGandhidhamShinay@gmail.com', '$2y$10$QmTNuKQjpDNf3LT.iounLu8PA0zOxAQqVCd4IJ.KXci8sXHo3YgSK', NULL, 1, 0),
(18, 'Hotel Tulsi Residency', '9494949494', 'H', 'HotelTulsiResidency@gmail.com', '$2y$10$.0LvGgY4PYwb3pq2Ezyvpe3GJqhbxIJ/bcjM17QcjeCNNUgNjCfTe', NULL, 1, 0),
(19, 'The Grand Raveta\r\n', '9595959595', 'H', 'TheGrandRaveta@gmail.com', '$2y$10$lVjEZaCgHjqKHgF.NOmbJOoWbqUPHVBQWH..CkU1c6fvxbcWt6rVG', NULL, 1, 0),
(20, 'Hotel Dolphin Residency\r\n', '9696969696', 'H', 'HotelDolphinResidency@gmail.com', '$2y$10$rTl.7mwowAwL6TzbZRymnuyF3D4O8l6BlhmkCTD4sZpukfYQ7fpsu', NULL, 1, 0),
(21, 'Hotel The Grand Piano\r\n', '9797979797', 'H', 'HotelTheGrandPiano@gmail.com', '$2y$10$cno0O6Rg6MfwFrYw0hvCFePFLTJVI8QjGUBYrQhQYZ/VovKekoBri', NULL, 1, 0),
(22, 'Novotel Ahmedabad\r\n', '9898989898', 'H', 'NovotelAhmedabad@gmail.com', '$2y$10$J5xJ45X/w/w9VW324AqtnO0WyaHVouqeNi12QrRTe/a1LczhW1MTi', NULL, 1, 0),
(23, 'The Fortune Landmark\r\n', '9999999999', 'H', 'TheFortuneLandmark@gmail.com', '$2y$10$BKmcJNTbr7O5jgwnvmki4OxbwL6ubarPUMSVNll06dS7UZM2ZY4aa', NULL, 1, 0),
(24, 'Hawthorn Suites by Wyndham', '2121212121', 'H', 'HawthornSuitesbyWyndham@gmail.com', '$2y$10$QPeO2muiIkSK.he/dfF8j.WxUo95L3mqKrfWNFecdM3o.ZCSChu6q', NULL, 1, 0),
(25, 'THE GRAND ASTORIA SOMANTH', '9292929292', 'H', 'THEGRANDASTORIASOMANTH@gmail.com', '$2y$10$l9BvQIlRcmgAh31NFlLiC.GAPuZT7zwyp47iZWTvtB7e0A66b5wl2', NULL, 1, 0),
(26, 'nishit', '1234567891', 'U', 'nishit@gmail.com', '$2y$10$LrII32RrO.0peyKwGrLJqOJHTSH.I.KFgzRv5I23eyY2DxCc6R9oi', NULL, 1, 0),
(27, 'Alfu', '9876543210', 'U', 'alfu@gmail.com', '$2y$10$2PgFzRmzq7HSSPj1l8gVIuc52cUobL5izuDbUJX/Ku4VaYIRQYJwC', NULL, 1, 0),
(35, 'hi', '2154646', 'U', 'hi@gmail.com', '$2y$10$nwpa9B9n8ZIL9PI6R9m65.nXavzsTvSHLG7s62MkTtzWfa4frW2yO', NULL, 1, 0),
(42, 't4', '1234567890', 'U', 't4@gmail.com', '$2y$10$B61pSLH3tcKNwoI4m5em9e2y3ZvfmBgSmHDRXBzlAoqYZ8OHauJfy', NULL, 1, 0),
(43, 'Jetho', '123456789', 'U', 'jetho@gmail.com', '$2y$10$f2CJ8hKsWa0t85HtC9f/ueUx/XQkn0/2Kq9xKSNik8Iha80d7nSK2', NULL, 1, 0),
(44, 'lll', '8999999', 'U', 'lll@gmail.com', '$2y$10$pnui.g/5ErtbGT7QdWwtreEdBZ57BhzFJOIWclIAz49Jq1.ZID8ye', NULL, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fkuser` (`User_id`),
  ADD KEY `fkhotel` (`Hotel_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fkstate` (`State_id`);

--
-- Indexes for table `client_reiviws`
--
ALTER TABLE `client_reiviws`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fkreviewuser` (`User_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `hotelmedia`
--
ALTER TABLE `hotelmedia`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fkhotelmedias` (`Hotel_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fkhotelcity` (`City_id`),
  ADD KEY `fkhoteluser` (`User_id`);

--
-- Indexes for table `placemedia`
--
ALTER TABLE `placemedia`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fkhotelimage` (`Place_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fkplacecity` (`City_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fkcountry` (`Country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `client_reiviws`
--
ALTER TABLE `client_reiviws`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotelmedia`
--
ALTER TABLE `hotelmedia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `placemedia`
--
ALTER TABLE `placemedia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fkhotel` FOREIGN KEY (`Hotel_id`) REFERENCES `hotels` (`Id`),
  ADD CONSTRAINT `fkuser` FOREIGN KEY (`User_id`) REFERENCES `users` (`Id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fkstate` FOREIGN KEY (`State_id`) REFERENCES `states` (`Id`);

--
-- Constraints for table `client_reiviws`
--
ALTER TABLE `client_reiviws`
  ADD CONSTRAINT `fkreviewuser` FOREIGN KEY (`User_id`) REFERENCES `users` (`Id`);

--
-- Constraints for table `hotelmedia`
--
ALTER TABLE `hotelmedia`
  ADD CONSTRAINT `fkhotelmedias` FOREIGN KEY (`Hotel_id`) REFERENCES `hotels` (`Id`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `fkhotelcity` FOREIGN KEY (`City_id`) REFERENCES `city` (`Id`),
  ADD CONSTRAINT `fkhoteluser` FOREIGN KEY (`User_id`) REFERENCES `users` (`Id`);

--
-- Constraints for table `placemedia`
--
ALTER TABLE `placemedia`
  ADD CONSTRAINT `fkhotelimage` FOREIGN KEY (`Place_id`) REFERENCES `places` (`Id`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `fkplacecity` FOREIGN KEY (`City_id`) REFERENCES `city` (`Id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `fkcountry` FOREIGN KEY (`Country_id`) REFERENCES `country` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
