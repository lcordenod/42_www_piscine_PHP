-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2019 at 02:21 PM
-- Server version: 5.6.43
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rush00`
--
CREATE DATABASE IF NOT EXISTS `rush00` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rush00`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `parent_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `parent_id`) VALUES
(1, 'Beauty', 0),
(2, 'Hair', 0),
(3, 'Scent', 0),
(4, 'Gifts', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_login` varchar(1000) NOT NULL,
  `customer_passwd` text NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0',
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_login`, `customer_passwd`, `is_admin`, `temp`) VALUES
('Martin', 'fd9d94340dbd72c11b37ebb0d2a19b4d05e00fd78e4e2ce8923b9ea3a54e900df181cfb112a8a73228d1f3551680e2ad9701a4fcfb248fa7fa77b95180628bb2', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_login` varchar(1000) NOT NULL,
  `product_ids` text NOT NULL,
  `product_prices` text NOT NULL,
  `product_quantities` text NOT NULL,
  `total` int(11) NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_login`, `product_ids`, `product_prices`, `product_quantities`, `total`, `temp`) VALUES
(1554052148, 'Martin', '17 , 23 , ', '25, 68, ', '1 , 2 , ', 161, 1),
(1554052825, 'Julia', '34 , 2 , ', '30, 60, ', '1 , 2 , ', 120, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_cat_sec` int(11) NOT NULL,
  `product_img` text NOT NULL,
  `product_var` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_price`, `product_stock`, `product_cat`, `product_cat_sec`, `product_img`, `product_var`) VALUES
(1, 'HAND WASH (Large)', 'This Argan Oil Enhanced hand cleanser gently removes grime, banishes dirt and leaves skin beautifully scented and refreshed.', 30, 50, 1, 4, 'https://user-images.githubusercontent.com/45239771/55276734-5819db00-52f7-11e9-865f-c61cc880645f.jpg', 'Large'),
(2, 'HAND WASH (Large)', 'This Argan Oil Enhanced hand cleanser gently removes grime, banishes dirt and leaves skin beautifully scented and refreshed.', 30, 50, 1, 4, 'https://user-images.githubusercontent.com/45239771/55276734-5819db00-52f7-11e9-865f-c61cc880645f.jpg', 'Large'),
(3, 'EYE CREAM', 'A potent, cream blend of anti-oxidants for all skin types.This concentrated and intricate anti-oxidant blend is designed to deliver rich nourishment to the delicate skin surrounding the eyes.', 90, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276379-6d8d0600-52f3-11e9-951f-e14c020d5641.jpg', ''),
(4, 'FACE CLEANER', 'This high quality formula offers exceptional cleansing without stripping skin. Ideal for those prone to dryness or sensitivity. ', 36, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276397-a6c57600-52f3-11e9-91c9-9ac13cecb945.jpg', ''),
(5, 'FACE CREAM', 'This extensively researched formulation omits many known aggravators of sensitive skin, including conventional artificial preservatives.', 54, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276440-0cb1fd80-52f4-11e9-9251-c939128df446.jpg', ''),
(6, 'BALANCING TONER', 'A gentle, everyday toner suited to all skin types, including sensitive.\r\nThis gentle skin-balancing blend, named for its inclusion of Rosemary and Ylang Ylang extract, offers light hydration and anti-oxidant protection. ', 57, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276423-dbd1c880-52f3-11e9-866a-cd1029f298ac.jpg', ''),
(7, 'BATH FOAM', 'This Bath Foam soothes skin in foam that leaves skin supple, nourished and scented.', 72, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276725-57814480-52f7-11e9-9e33-631697e39aa6.jpg', ''),
(8, 'ULTRARICH BODY BUTTER', 'A beautifully scented, super-hydrating balm for the driest skin, containing a potent mix of nourishing ingredients.', 36, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276726-57814480-52f7-11e9-9fee-2c7dd0b2ae7a.jpg', ''),
(9, 'BODY LOTION (Large)', 'This refreshingly scented balm is boosted with skin-nourishing argan nut oil extracts. Intense hydrating properties make it the ideal product to alleviate seasonal dryness or to relieve skin regularly subjected to air-conditioned environments. ', 53, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276727-57814480-52f7-11e9-8acb-ee73a4093d97.jpg', 'Large'),
(10, 'BODY LOTION (Medium)', 'This refreshingly scented balm is boosted with skin-nourishing argan nut oil extracts. Intense hydrating properties make it the ideal product to alleviate seasonal dryness or to relieve skin regularly subjected to air-conditioned environments.', 35, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276728-57814480-52f7-11e9-8177-fd9822b4929c.jpg', 'Medium'),
(11, 'BODY LOTION (Small)', 'This refreshingly scented balm is boosted with skin-nourishing argan nut oil extracts. Intense hydrating properties make it the ideal product to alleviate seasonal dryness or to relieve skin regularly subjected to air-conditioned environments.', 20, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276729-57814480-52f7-11e9-9710-a41c2f8b5bba.jpg', 'Small'),
(12, 'BODY OIL', 'This sophisticated botanical massage oil &ndash; suited to all over body hydration &ndash; is naturally soothing and leaves skin beautifully nourished.', 37, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276730-57814480-52f7-11e9-9b1b-c3bcd32e0d09.jpg', ''),
(13, 'BODY WASH (Large)', 'A low-foaming body cleanser containing the highest calibre of botanical extracts. This beautifully fragrant formula is mild yet effective in cleansing skin, containing skin-softening botanical extracts and Rose Petal oil to delight the senses.', 48, 50, 1, 4, 'https://user-images.githubusercontent.com/45239771/55276731-57814480-52f7-11e9-8f37-b585e4dfef40.jpg', 'Large'),
(14, 'BODY WASH (Small)', 'A low-foaming body cleanser containing the highest calibre of botanical extracts. This beautifully fragrant formula is mild yet effective in cleansing skin, containing skin-softening botanical extracts and Rose Petal oil to delight the senses.', 30, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276732-57814480-52f7-11e9-9975-af3d5f884162.jpg', 'Small'),
(15, 'HAND CREAM', 'A creamy balm specially formulated to penetrate the skin quickly to protect, nourish and moisturise hands. ', 30, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276733-5819db00-52f7-11e9-90d5-b2922a489951.jpg', ''),
(16, 'HAND WASH (Small)', 'This Argan Oil Enhanced hand cleanser gently removes grime, banishes dirt and leaves skin beautifully scented and refreshed.', 20, 50, 1, 0, 'https://user-images.githubusercontent.com/45239771/55276735-5819db00-52f7-11e9-9f42-d09b2895acc2.jpg', 'Small'),
(17, 'GIFT CARD', 'A plush gift set offers a selection of the best Sprekenhus products to replenish and moisturize hands and body.', 25, 50, 4, 0, 'https://user-images.githubusercontent.com/45239771/55276913-4ab22000-52fa-11e9-8f22-edb31ca6457f.jpg', '100'),
(18, 'GIFT CARD', 'A plush gift set offers a selection of the best Sprekenhus products to replenish and moisturize hands and body.', 50, 50, 4, 0, 'https://user-images.githubusercontent.com/45239771/55276913-4ab22000-52fa-11e9-8f22-edb31ca6457f.jpg', '50'),
(19, 'GIFT CARD', 'A plush gift set offers a selection of the best Sprekenhus products to replenish and moisturize hands and body.', 100, 50, 4, 0, 'https://user-images.githubusercontent.com/45239771/55276913-4ab22000-52fa-11e9-8f22-edb31ca6457f.jpg', '25'),
(20, 'MARBLE PEDESTAL COLLECTORS EDITION', 'With its cool touch and natural elegance, our white marble pedestal is an ideal presentation piece for our 236 ML. and 500 ML. amber bottles.', 168, 50, 4, 0, 'https://user-images.githubusercontent.com/45239771/55276914-4b4ab680-52fa-11e9-8a4e-453d89472c6a.jpg', ''),
(21, 'APOTHECARY WALL DISPLAY ONE', 'Minimalistic wall display made to hold the Apothecary Hand Wash and Hand Lotion. Note: Screws are not included.', 60, 50, 4, 0, 'https://user-images.githubusercontent.com/45239771/55276915-4b4ab680-52fa-11e9-9551-b0e05445fc9e.jpg', 'One'),
(22, 'APOTHECARY WALL DISPLAY TWO', 'Minimalistic wall display made to hold the Apothecary Hand Wash and Hand Lotion. Note: Screws are not included.', 82, 50, 4, 0, 'https://user-images.githubusercontent.com/45239771/55276916-4b4ab680-52fa-11e9-9e05-3f7c42172e6c.jpg', 'Two'),
(23, 'TORTOISESHELL ACETATE RAKE COMB', 'Sprekenhus´ comb has been hand-shaped from high-quality acetate. Polished by hand to a soft lustre, this tortoiseshell piece features specially positioned wide-set teeth and notches to avoid damaging your hair.', 68, 50, 2, 0, 'https://user-images.githubusercontent.com/45239771/55277012-af21af00-52fb-11e9-9016-78c1b73a8862.png', ''),
(24, 'HYDRATING CONDITIONER (Large)', 'This frequent-use formula will soften, add shine and hydrate hair without weighing it down. Hair will be left hydrated, disentangled and smoothed.', 54, 50, 2, 0, 'https://user-images.githubusercontent.com/45239771/55277013-af21af00-52fb-11e9-9389-0dd880e07fa5.jpg', 'Large'),
(25, 'HYDRATING CONDITIONER (Small)', 'This frequent-use formula will soften, add shine and hydrate hair without weighing it down. Hair will be left hydrated, disentangled and smoothed.', 35, 50, 2, 0, 'https://user-images.githubusercontent.com/45239771/55277014-afba4580-52fb-11e9-8de5-b899d7d8a862.jpg', 'Small'),
(26, 'DETANGLER', 'A leave-in treatment, this hydrating styling cream is everything you need to condition and repair your hair.', 46, 50, 2, 0, 'https://user-images.githubusercontent.com/45239771/55277015-afba4580-52fb-11e9-84fe-c3f22a97f718.jpg', ''),
(27, 'HYDRATING MASK', 'This intensive treatment is full of great anti-oxidants and applied to damp hair to seal in moisture, resulting in a natural, silky finish and that Alexander Sprekenhus shine without leaving a residue.', 48, 50, 2, 0, 'https://user-images.githubusercontent.com/45239771/55277016-afba4580-52fb-11e9-9326-08957b7844a8.jpg', ''),
(28, 'HAIR PASTE', 'For the big nights out and the walks in the park, we’ve got exactly what you need.', 36, 50, 2, 0, 'https://user-images.githubusercontent.com/45239771/55277017-afba4580-52fb-11e9-9fef-2b777912180f.jpg', ''),
(29, 'HYDRATING SHAMPOO (Large)', 'This impressive shampoo guards against breakage and provides careful cleansing for the scalp and hair, leaving it shiny, soft and freshened. Gentle botanicals encourage the growth of strong, healthy hair.', 53, 50, 2, 0, 'https://user-images.githubusercontent.com/45239771/55277018-afba4580-52fb-11e9-976e-d0d0c0d62b67.jpg', 'Large'),
(30, 'HYDRATING SHAMPOO (Medium)', 'A mild, frequent-use formula for all hair types.\r\n\r\nThis impressive shampoo guards against breakage and provides careful cleansing for the scalp and hair, leaving it shiny, soft and freshened. Gentle botanicals encourage the growth of strong, healthy hair.', 30, 50, 2, 0, 'https://user-images.githubusercontent.com/45239771/55277019-afba4580-52fb-11e9-8176-e4c492499be2.jpg', 'Medium'),
(31, 'HYDRATING SHAMPOO (Small)', 'A mild, frequent-use formula for all hair types.\r\n\r\nThis impressive shampoo guards against breakage and provides careful cleansing for the scalp and hair, leaving it shiny, soft and freshened. Gentle botanicals encourage the growth of strong, healthy hair.', 15, 50, 2, 0, 'https://user-images.githubusercontent.com/45239771/55277020-afba4580-52fb-11e9-8aa8-6ffa88be1ed2.jpg', 'Small'),
(32, 'THE ORIGINAL HAIR STYLING ELIXIR', 'The Hair Styling Elixir is an Argan Oil Treatment for all hair types.\r\n\r\nThis Alexander Sprekenhus formula softens the hair and helps you to accheive those beautiful, healthy locks.', 45, 50, 2, 0, 'https://user-images.githubusercontent.com/45239771/55277021-b052dc00-52fb-11e9-9017-48c9f7f59951.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`temp`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`temp`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
