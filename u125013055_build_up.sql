-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2023 at 09:22 AM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u125013055_build_up`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `password`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `business_id` int(11) NOT NULL,
  `line_of_business` varchar(100) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ingredients_materials` text NOT NULL,
  `method` text NOT NULL,
  `costing` int(11) NOT NULL,
  `source` varchar(500) NOT NULL,
  `likes` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`business_id`, `line_of_business`, `business_name`, `image`, `ingredients_materials`, `method`, `costing`, `source`, `likes`, `date_added`) VALUES
(1, 'Food Business', 'Filipino Style Pork BBQ', '637c31af45d019.09872680.jpg', '&#8226; 2kg. pork shoulder sliced into thin pieces – 700 (8 servings, first use only)\r\nMarinade ingredients:\r\n&#8226; ¾ cup soy sauce -255 (1 gallon for future use)\r\n&#8226; ½ cup juice extracted from calamansi or lemon – 189 (1 gallon for future use)\r\n&#8226; ¾ cup banana ketchup – 289 (1 gallon for future use)\r\n&#8226; 4 tablespoons dark brown sugar – 93 (1kg for future use)\r\n&#8226; 2 tablespoons garlic powder – 145 (1kg for future use)\r\n&#8226; 1 teaspoon ground black pepper – 300 (1kg for future use)\r\n&#8226; 2 teaspoons salt – 50 (1kg for future use)\r\n&#8226; 1 ½ cups lemon or lime soda – 200 (1kg for future use)', '1. Arrange the pork slices in a large bowl.\r\n2. Add all the marinade ingredients. Mix well. Cover the bowl and marinate for at least 3 hours. Note: I strongly suggest marinating overnight for best results.\r\n3. Fasten the marinated pork together using bamboo skewers.\r\n4. Heat-up the grill. Start to grill your Filipino Style pork BBQ for 3 to 5 minutes per side until the meat is thoroughly cooked. Make sure to always baste the BBQ when flipping it over. Note: the basting sauce ingredients are the same as the marinade ingredients minus the lemon soda.\r\n5. Serve with spicy vinegar.\r\n', 2476, 'https://panlasangpinoy.com/filipino-style-pork-bbq/#recipe', 1, '11-22-2022'),
(2, 'Food Business', 'Burger', '637c36344fbc40.14014257.jpg', '&#8226; 1.5 pounds (0.68 kg) of ground beef (240pesos /pound)\r\n&#8226; Salt (37 pesos)\r\n&#8226; Buns(36buns, 65g, 199 pesos)\r\n&#8226; Cheese, optional (20s, 80 pesos)\r\n&#8226; Toppings, optional (tomatoes – 31pesos/kg) (lettuce - 100pesos/kg) ', 'A. MAKING PATTIES\r\n1. Buy good beef with a meat to fat ratio of 80/20. \r\n2. Make patties that are about 6 ounces (1.7 hg) \r\n3. Form the patties as gently as you can. \r\n4. Press a dimple into the middle of each patty.\r\n5. Put the patties in the refrigerator for 20 minutes. \r\n\r\nB. GETTING THE PATTIES IN THE SKILLET\r\n1. Heat a cast iron skillet over a high heat.\r\n2. Salt the patties right before cooking.\r\n3. Place the patties in the hot skillet.\r\n\r\nC. COOKING THE PATTIES\r\n1. Flip the patties 2-4 minutes\r\n2. Cook the patties more than 10 minutes\r\n3. Push broken pieces back together\r\n4. Add cheese in the last minute of cooking.\r\n5. Remove the patties and serve them\r\n6. Add toppings\r\n\r\nRare: 125-130 F Medium Rare: 130-140 F Medium: 140-150 F Medium Well: 150-155 F Well: 160-212 F\r\n', 687, 'https://www.wikihow.com/Cook-Hamburgers-on-the-Stove', 0, '11-22-2022'),
(3, 'Food Business', 'Cassava Cake cheesy and creamy version', '637c38b31e3620.78014077.jpg', '&#8226; 2 lbs. cassava grated – 69 \r\n&#8226; 2 cups coconut cream – 55 (400 ml for future use)\r\n&#8226; 12 ounces evaporated milk – 54 (370 ml)\r\n&#8226; 3 eggs – 109 (1 dozen for future use)\r\n&#8226; 3 tablespoons butter melted – 125 (500g for future use)\r\n&#8226; 1/2 cup quick-melt cheese shredded - 88\r\n&#8226; 14 ounces condensed milk – 130 (2 cans)\r\n&#8226; Topping ingredients:\r\n&#8226; 1 cup coconut cream\r\n&#8226; 7 ounces condensed milk\r\n&#8226; 1 cup quick-melt cheese shredded\r\n&#8226; 4 tablespoons butter melted', 'Preheat oven to 350F.\r\n1. Combine the wet ingredients in a mixing bowl starting by cracking the eggs. Beat until smooth. Pour the evaporated milk, condensed milk, butter, and coconut milk. Whisk everything together until the mixture smoothens.\r\n2. Add the grated cassava and ½ cup cheese in the bowl where the wet ingredients are at. Mix well.\r\n3. Transfer the mixture into a greased baking pan. Bake for 1 hour.\r\n4. Prepare the topping my mixing all the toping ingredients in a clean bowl. Mix everything together. Set aside.\r\n5. Pour the topping mixture over the baked cassava. Put the baking pan back in the oven. Continue baking for 350F until the topping thickens. Note: You will notice that it will burn a bit, that is normal.\r\n6. Remove the baking pan from the oven. Let the cassava cake cool down.\r\n7. Slice the cake into serving pieces. Serve for dessert.\r\n', 630, 'https://panlasangpinoy.com/cassava-cake-recipe-creamy-and-cheesy-version/#recipe', 1, '11-22-2022'),
(4, 'Food Business', 'How To Make Muffins: The Simplest, Easiest Method', '637c3e939c2156.29350077.png', 'For 12 muffins:\r\n• Paper muffin liners – Php 68.00 ( 100 pcs. For future use) \r\n• 2 1/2 cups all-purpose flour – Php 57.00 (1kg for future use)\r\n• 1/2 cup granulated sugar – Php 118.00 (1kg for future use) \r\n• 1 tablespoon baking powder – Php 105.00 (1kg for future use)\r\n• 1/4 teaspoon fine salt – Php 18.00 (1kg for future use)\r\n• 1 1/4 cups evaporated milk – Php 37.00 (470 ml) \r\n• 1/2 cup vegetable oil – Php 40.00 (250ml for future use)\r\n• 1 large egg – Php 8.00 ', '1. Prepare the pan and oven: Arrange a rack in the middle of the oven and heat to 375°F. Line a standard 12-well muffin pan with papers liners or coat the wells with cooking spray.\r\n2. Mix the dry ingredients: Whisk the flour, sugar, baking powder, and salt together in a large bowl; set aside.\r\n3. Mix the wet ingredients: Whisk the milk, oil, and egg if using together in a medium bowl until combined.\r\n4. Fold the wet ingredients into the dry: Pour the wet ingredients into the dry and mix with a wooden spoon or rubber spatula until just combined. Some lumps are fine.\r\n5. Fold in any mix-ins: If you&#039;re adding mix-ins to your muffins, chocolate chips, or nuts gently until distributed. Four or five folds is all it should take. (optional)\r\n6. Fill the pan and bake: Divide the batter amongst the prepared muffin wells, about 1/3 cup of batter per well. Bake until the muffins are golden brown and a toothpick inserted into the center of a muffin comes out clean, about 20 minutes.\r\n\r\nRECIPE NOTES\r\nStorage: Muffins will keep at in an airtight container at room temperature for up to 5 days. They can also be frozen, then thawed at room temperature.', 451, 'https://www.thekitchn.com/how-to-make-muffins-the-simplest-easiest-method-236640', 1, '11-22-2022'),
(5, 'Food Business', 'Idol Cheesedog Bread Roll and Bites', '637c418a892787.91889914.png', 'Idol Bites ingredients:\r\n&#8226; 12 CDO Idol Cheesedog (good for 8 people) – 200 (1kg for future use)\r\n\r\nDough:\r\n&#8226; 2 cups all-purpose flour - 58 (1kg for future use)\r\n&#8226; 1 ¼ cup evaporated milk – 54 (1 can for future use)\r\n&#8226; 1 egg – 109 (1 dozen for future use)\r\n&#8226; 2 teaspoons canola oil – 188 (1L for future use)\r\n&#8226; 2 teaspoons baking powder – 105 (1kg for future use)\r\n&#8226; 2 teaspoon salt – 50 (1kg for future use)\r\n\r\nEgg wash:\r\n&#8226; 1 egg\r\n&#8226; 1 tablespoon evaporated milk\r\n\r\nIdol Cheese Dog Bread Roll Ingredients:\r\n&#8226; 12 CDO Idol Cheesedog\r\n&#8226; 12 sliced tasty bread – 99 (1 pack for future use)\r\n&#8226; ¼ cup mayonnaise – 91 (220ml for future use)\r\n&#8226; 1 cup Panko breadcrumbs – 112 (1kg for future use)\r\n&#8226; 2 eggs beaten\r\n&#8226; 1 ½ cups cooking oil – 88 (1L for future use)\r\n', '1. Start making the idol bites by preparing the dough. Combine flour, evaporated milk, and salt in a bowl. Mix well and set aside. On another bowl, combine milk, canola oil, and egg. Mix well until all the ingredients are well blended. Combine the dry and wet ingredients. Knead the dough until it is smooth and elastic. Mold into a ball figure. Cover and let it rest for 15 minutes.\r\n2. Divide the dough into 2 parts to make it easier to flatten. Use a rolling pin to flatten the dough and then slice it into small triangles.\r\n3. Wrap 2 triangular dough near the two sides of each piece of CDO Idol Cheese Dog. Do this step until all cheese dogs are done.\r\n4. Make an egg wash by mixing the egg wash ingredients. Brush it over the wrapped dough.\r\n5. Bake for 12 to 15 minutes at 190C or air fry at 180C for 8 minutes. Slice in half and arrange on a serving plate. Serve.\r\n6. Prepare the Idol Cheese Dog Bread Roll. Flatten each slice of bread using a rolling pin. Spread mayonnaise on one side. 6. Wrap the bread around each CDO Idol Cheese Dog. Secure with a toothpick.\r\n7. Heat the oil in a small cooking pot.\r\n8. While the oil is heating up. Dip the wrapped cheese dog in beaten egg and then roll it over the Panko breadcrumbs until it gets completely coated. Deep fry until the breading turns golden brown. Slice into half and arrange on a serving plate. Share and enjoy!', 733, 'https://panlasangpinoy.com/idol-cheesedog-bites-and-bread-roll/#recipe', 1, '11-22-2022'),
(6, 'Food Business', 'Homemade Glazed Doughnuts', '637c427a9c6867.99910206.png', '&#8226; 1 cup evaporated milk – Php33.00 (470ml for future use)\r\n&#8226; 1 Tablespoon active dry yeast – Php48.00 (100g for future use)\r\n&#8226; 1/3 cup granulated sugar – Php118.00 (1kg for future use)\r\n&#8226; 2 large eggs – Php8.00/pcs\r\n&#8226; 6 Tablespoons unsalted butter, melted and slightly cooled – Php140.00 (225g for future use)\r\n&#8226; 1 teaspoon pure vanilla extract – Php39.00 (350ml for future use)\r\n&#8226; 1/4 teaspoon ground nutmeg – Php70.00 (50g for future use)\r\n&#8226; 1/2 teaspoon salt – Php50.00 (1kg for future use)\r\n&#8226; 4 cups all-purpose flour (spoon & leveled), plus more as needed – Php58.00 (1kg for future use)\r\n&#8226; 1 – 2 quarts vegetable oil - – Php40.00 (250ml for future use)\r\n\r\nGlaze\r\n&#8226; 2 cups confectioners’ sugar, sifted – Php120.00 (1kg for future use)\r\n&#8226; 1/3 cup heavy cream – Php75.00 (250ml for future use)\r\n&#8226; 1/2 teaspoon pure vanilla extract', '1. Prepare the dough: Whisk the warm milk, yeast, and sugar together in the bowl of your stand mixer fitted with a dough hook or paddle attachment. Cover and allow to sit for 5 minutes. The mixture should be a little frothy on top after 5 minutes. If not, start over with new yeast.\r\n2. Add the eggs, butter, vanilla, nutmeg, salt, and 2 cups (245g) flour. Beat on low speed for 1 minute. Scrape down the sides of the bowl with a rubber spatula as needed. Add remaining flour and beat on medium speed until the dough comes together and pulls away from the sides of the bowl, about 2 minutes. If needed, add more flour, 1 Tablespoon at a time, until the dough pulls away from the sides of the bowl. Don’t add too much flour, though. You want a slightly sticky dough. *If you do not own a mixer, you can mix this dough with a large wooden spoon or rubber spatula. It will take a bit of arm muscle\r\n3. Knead the dough: Keep the dough in the mixer and beat for an additional 2 minutes or knead by hand on a lightly floured surface for 2 minutes.\r\n4. Let Dough Rise: Lightly grease a large bowl with oil or nonstick spray. Place the dough in the bowl, turning it to coat all sides in the oil. Cover the bowl with aluminum foil, plastic wrap, or a clean kitchen towel. Allow the dough to rise in a relatively warm environment for 1.5-2 hours or until double in size.\r\n5. Shape Doughnuts: When the dough is ready, punch it down to release the air.Remove dough from the bowl and turn it out onto a lightly floured surface. If needed, punch down again to release any more air bubbles. Using a rolling pin, roll the dough out until it is 1/2 inch thick. Using a 3-3.5 inch doughnut cutter, cut into 12 doughnuts. If you can’t quite fit 12, re-roll the scraps and cut more.\r\n6. Line 1 or 2 baking sheets with parchment paper or silicone baking mats. Place doughnuts and doughnut holes on each. (Feel free to discard doughnut holes if desired.) Loosely cover and allow to rest as you heat the oil. They will rise a bit as they rest. Place a cooling rack over another baking sheet.\r\n7. Pour oil into a large heavy-duty pot set over medium heat. Heat oil to 375°F (191°C). Add 2-3 doughnuts at a time and cook for 1 minute on each side. Carefully remove with a metal spatula or metal slotted spoon. Wear kitchen gloves if oil is splashing. Place fried doughnuts onto prepared rack. Repeat with remaining doughnuts, then turn off heat.\r\n8. Make the glaze: Whisk all of the glaze ingredients together. Dip each warm doughnut (don’t wait for them to cool!) into the glaze, making sure to coat both sides. Place back onto prepared rack as excess glaze drips down. After about 20 minutes, the glaze will set + harden.\r\n9. Doughnuts are best enjoyed the same day. You can store in an airtight container at room temperature or in the refrigerator for 1-2 extra days.', 807, 'https://sallysbakingaddiction.com/how-to-make-homemade-glazed-doughnuts/', 1, '11-22-2022');

-- --------------------------------------------------------

--
-- Table structure for table `entrep`
--

CREATE TABLE `entrep` (
  `entrep_id` int(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `month` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `is_verified` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `entrep`
--

INSERT INTO `entrep` (`entrep_id`, `firstname`, `lastname`, `contact`, `email`, `password`, `code`, `plan`, `month`, `status`, `date`, `is_verified`, `uid`) VALUES
(1, 'Macky', 'De La Cuesta', 9383432003, 'mackydelacuesta@gmail.com', '12345678', 0, 'regular', 0, 'not verified', '22-11-2022 09:54:01am', 'true', ''),
(2, 'Alamario', 'Dela Cuesta', 9161017713, 'chukoychuga123@gmail.com', 'Chuga123!!', 0, 'regular', 0, 'verified', '22-11-2022 10:10:15am', 'true', ''),
(3, 'Von', 'Jeanne', 956375988, 'vonjeanne@gmail.com', 'Testing123', 0, 'regular', 0, 'not verified', '22-11-2022 10:12:05am', '', ''),
(4, 'Alex', 'Belino', 9156752345, 'alexbelino@gmail.com', '12345678', 0, 'regular', 0, 'not verified', '29-05-2023 06:12:31pm', 'false', 'BUILD_UP_2022_u73945070'),
(5, 'Lucky', 'Mendoza', 9262857323, 'lakime07@gmail.com', '12345678', 0, 'regular', 0, 'not verified', '29-05-2023 06:26:11pm', 'true', 'BUILD_UP_2022_u10969700'),
(6, 'Norden Julius', 'Dolor', 9357930884, 'nordenjuliusdolor@gmail.com', '123456789', 0, 'regular', 0, 'not verified', '29-05-2023 06:35:21pm', 'true', 'BUILD_UP_2022_u08740015'),
(7, 'Jenie Lyza', 'Frogosa', 9247653434, 'jenielyzafrogosa@gmail.com', '12345678', 0, 'regular', 0, 'verified', '29-05-2023 06:37:49pm', 'true', 'BUILD_UP_2022_u13432796'),
(8, 'Jeric', 'Espiritu', 9763254213, 'shottv18@gmail.com', '12345678', 0, 'regular', 0, 'not verified', '29-05-2023 07:02:12pm', 'true', 'BUILD_UP_2022_u01792897'),
(9, 'John', 'Villanueva', 9161017713, 'younghoopers16@gmail.com', '1w345678901', 0, 'regular', 0, 'not veriffied', '29-05-2023 08:46:04pm', 'true', 'BUILD_UP_2022_u87284575'),
(10, 'Core', 'Shop', 9363432004, 'coreshop@gmail.xom', 'coreshop', 0, 'regular', 0, 'not veriffied', '29-05-2023 09:02:35pm', 'false', 'BUILD_UP_2022_u02531756'),
(11, 'Core', 'Shop', 9917560590, 'coreshop15@gmail.com', 'Coreshop_1515', 0, 'regular', 0, 'not veriffied', '29-05-2023 09:12:15pm', 'true', 'BUILD_UP_2022_u13439886');

-- --------------------------------------------------------

--
-- Table structure for table `entrep_profile_pic`
--

CREATE TABLE `entrep_profile_pic` (
  `id` int(255) NOT NULL,
  `entrep_id` int(255) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `entrep_profile_pic`
--

INSERT INTO `entrep_profile_pic` (`id`, `entrep_id`, `filepath`, `status`) VALUES
(1, 1, 'Profile Pictures/default-profile.png', 0),
(2, 2, 'Profile Pictures/default-profile.png', 0),
(3, 3, 'Profile Pictures/default-profile.png', 0),
(4, 4, 'Profile Pictures/default-profile.png', 0),
(5, 5, 'Profile Pictures/default-profile.png', 0),
(6, 6, 'Profile Pictures/64749daf4ef064.82808736.jpeg', 1),
(7, 7, 'Profile Pictures/647483319ef600.04868739.jpeg', 1),
(8, 8, 'Profile Pictures/647490f2a26aa5.53816063.jpg', 1),
(9, 9, 'Profile Pictures/default-profile.png', 0),
(10, 10, 'Profile Pictures/default-profile.png', 0),
(11, 11, 'Profile Pictures/default-profile.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `liked_business`
--

CREATE TABLE `liked_business` (
  `id` int(11) NOT NULL,
  `recommender_user` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `liked_time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `liked_business`
--

INSERT INTO `liked_business` (`id`, `recommender_user`, `business_id`, `liked_time`) VALUES
(2, 7, 5, '05-29-2023 06:34:38pm'),
(3, 8, 6, '05-29-2023 06:35:39pm'),
(4, 8, 4, '05-29-2023 06:35:52pm'),
(5, 8, 1, '05-29-2023 06:36:01pm'),
(6, 8, 3, '05-29-2023 06:36:27pm');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `gcash_ss` varchar(100) NOT NULL,
  `gcash_reference` varchar(100) NOT NULL,
  `date_paid` varchar(100) NOT NULL,
  `time_paid` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `plan_started` varchar(100) NOT NULL,
  `plan_expiration` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommender_user`
--

CREATE TABLE `recommender_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recommender_user`
--

INSERT INTO `recommender_user` (`user_id`, `name`, `date`) VALUES
(1, 'Macky De La Cuesta', '11-22-2022 09:41:49am'),
(2, 'rafa', '11-22-2022 09:58:15am'),
(3, 'cute ko', '11-22-2022 10:08:17am'),
(4, 'Johnwell', '11-22-2022 10:50:09am'),
(5, 'robotics', '11-22-2022 01:21:31pm'),
(6, 'food', '11-22-2022 01:21:50pm'),
(7, 'Jenie Lyza', '05-29-2023 06:34:24pm'),
(8, 'Jenie Lyza', '05-29-2023 06:35:17pm'),
(9, 'Jenie Lyza', '05-29-2023 06:36:41pm'),
(10, 'jeric', '06-02-2023 11:52:37pm');

-- --------------------------------------------------------

--
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `reseller_id` int(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `month` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `is_verified` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reseller`
--

INSERT INTO `reseller` (`reseller_id`, `firstname`, `lastname`, `contact`, `email`, `password`, `code`, `plan`, `month`, `status`, `date`, `is_verified`, `uid`) VALUES
(1, 'lucky', 'Me', 9978438800, 'lakime07@gmail.com', '12345678', 0, 'regular', 0, '', '22-11-2022 09:58:52am', 'true', ''),
(2, 'Von', 'Jeanne', 988566631, 'vonjeanne@gmail.com', 'testing123', 0, 'regular', 0, '', '22-11-2022 10:15:32am', 'true', ''),
(3, 'Johnwell', 'Espiritu', 9507337842, 'johnwellespiritu21@gmail.com', '12345678', 0, 'regular', 0, '', '29-05-2023 05:43:56pm', 'true', ''),
(6, 'Jeric', 'Adame', 9563892316, 'johnwellespiritu25@gmail.com', '12345678', 0, 'regular', 0, 'not verified', '30-05-2023 12:07:13am', 'true', 'BUILD_UP_2022_u26589205');

-- --------------------------------------------------------

--
-- Table structure for table `reseller_profile_pic`
--

CREATE TABLE `reseller_profile_pic` (
  `id` int(255) NOT NULL,
  `reseller_id` int(255) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reseller_profile_pic`
--

INSERT INTO `reseller_profile_pic` (`id`, `reseller_id`, `filepath`, `status`) VALUES
(1, 1, 'Profile Pictures/default-profile.png', 0),
(2, 2, 'Profile Pictures/default-profile.png', 0),
(3, 3, 'Profile Pictures/64748ee10359a8.50696957.jpg', 1),
(4, 4, 'Profile Pictures/default-profile.png', 0),
(5, 5, 'Profile Pictures/default-profile.png', 0),
(6, 6, 'Profile Pictures/default-profile.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `saved_product`
--

CREATE TABLE `saved_product` (
  `saved_id` int(11) NOT NULL,
  `reseller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `saved_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `saved_product`
--

INSERT INTO `saved_product` (`saved_id`, `reseller_id`, `product_id`, `saved_date`) VALUES
(1, 2, 2, '2022-11-22 10:16:39am'),
(2, 2, 1, '2023-05-12 07:14:34pm');

-- --------------------------------------------------------

--
-- Table structure for table `saved_product_limit`
--

CREATE TABLE `saved_product_limit` (
  `saved_id` int(11) NOT NULL,
  `reseller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `saved_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `saved_product_limit`
--

INSERT INTO `saved_product_limit` (`saved_id`, `reseller_id`, `product_id`, `saved_date`) VALUES
(1, 2, 2, '2022-11-22 10:16:39am'),
(2, 2, 1, '2023-05-12 07:14:34pm');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_product`
--

CREATE TABLE `uploaded_product` (
  `product_id` int(255) NOT NULL,
  `entrep_id` int(255) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `productprice` char(11) NOT NULL,
  `productimage` varchar(255) NOT NULL,
  `productdescription` varchar(500) NOT NULL,
  `province` varchar(100) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `category` varchar(500) NOT NULL,
  `uploaddate` varchar(100) NOT NULL,
  `save` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `uploaded_product`
--

INSERT INTO `uploaded_product` (`product_id`, `entrep_id`, `productname`, `productprice`, `productimage`, `productdescription`, `province`, `filepath`, `category`, `uploaddate`, `save`) VALUES
(1, 2, 'NIKE Air Force 1 ', '1,000.00', '637fc23f6fd292.07057959.jpg', 'OEM\nBrand new stocks (Available in sizes 36-42)\nMinimum of 10 order.\n', 'Batangas', 'Uploaded Images/637fc23f6fd292.07057959.jpg', 'Clothing, Shoes and Jewelry', '2023-05-05 10:12:09am', 2),
(6, 5, 'Vodoo Vape', '2,000.00', '64747f211f69e8.02502300.jpg', '3rd Generation\r\nTanks and mods (refillable)\r\n', 'Batangas', 'Uploaded Images/64747f211f69e8.02502300.jpg', 'Electronics', '2023-05-10 06:32:01pm', 0),
(5, 5, 'Oversized Tee', '2,500.00', '64747e6e8d4336.73778260.jpg', 'Oversized Tee\r\n-10pcs per bundle\r\n-Comfyy\r\n-Trendy', 'Batangas', 'Uploaded Images/64747e6e8d4336.73778260.jpg', 'Clothing, Shoes and Jewelry', '2023-05-20 06:29:02pm', 0),
(7, 7, 'French Fries', '190.00', '647481d10a2ab1.67360702.jpeg', 'Delicious and convenient, our Frozen French Fries are a crispy golden delight! Expertly cut and quickly frozen, they maintain their natural goodness and offer a delightful texture. Easy to prepare and versatile, these fries are the perfect addition to any meal or snack. Grab a bag today and indulge in their irresistible taste!', 'Batangas', 'Uploaded Images/647481d10a2ab1.67360702.jpeg', 'Grocery & Gourmet Food', '2023-05-24 06:43:29pm', 0),
(8, 7, 'CANON EOS 2000D', '20,000.00', '647484ae437b51.92446730.jpg', 'Capture life\'s moments in stunning detail with our DSLR camera. Unparalleled image quality, fast autofocus, and interchangeable lenses for creative freedom. Perfect for photography and videography, with 4K resolution and precise focus tracking. Share instantly with built-in Wi-Fi and Bluetooth. Elevate your skills and unlock limitless creativity. Get the ultimate tool for unforgettable memories.\r\n\r\n10 pcs. Available\r\nWith box\r\n100% original', 'Batangas', 'Uploaded Images/647484ae437b51.92446730.jpg', 'Technology ', '2023-05-28 06:58:49pm', 0),
(9, 7, 'TECHNIK TAF42BN', '3,298.00', '64748673ba9b02.07210538.jpg', 'Introducing the revolutionary Air Fryer, the ultimate kitchen companion for healthier and tastier cooking! This cutting-edge appliance combines the convenience of air frying with advanced Artificial Intelligence Technology to deliver flawless results every time. Say goodbye to greasy and calorie-laden meals, as the Air Fryer uses minimal oil to achieve the perfect crispness while preserving the natural flavors of your favorite foods. With its intuitive interface, and smart cooking presets.\r\n\r\n20', 'Batangas', 'Uploaded Images/64748673ba9b02.07210538.jpg', 'Appliances', '2023-05-29 07:07:26pm', 0),
(10, 6, 'Redmi Note 10', '8,100.00', '64749d39b7eaa2.33909298.jpg', '-6/128 Gb\r\n-4k resolution\r\n-quad camera (48+8+2+2 mp)\r\n-front cam (13mp)\r\n-6.43\" screen\r\n-Super Amoled Display', 'Oriental Mindoro', 'Uploaded Images/64749d39b7eaa2.33909298.jpg', 'Cell Phones & Accessories', '2023-05-29 08:40:25pm', 0),
(11, 6, 'Phone case', '2,500.00', '64749d866e0b45.71520358.jpg', '-10 pcs per bundlwle\r\n-can select various units\r\n-Available customed design', 'Oriental Mindoro', 'Uploaded Images/64749d866e0b45.71520358.jpg', 'Cell Phones & Accessories', '2023-05-29 08:41:42pm', 0),
(12, 9, 'Beautify skin care', '3,500.00', '64749f065162e4.12241553.jpg', '-Any face compatible\r\n-with free soothers\r\n-soap, rejuv serum and night Cream with 46spf sun screen\r\n-10 package', 'Batangas', 'Uploaded Images/64749f065162e4.12241553.jpg', 'Beauty & Personal Care', '2023-05-29 08:48:06pm', 0),
(13, 9, 'Tumbler', '2,425.00', '64749f92955619.09286928.jpg', '-10 pcs per bundle\r\n-custome design available\r\n-250 ml\r\n-easy to carry', 'Batangas', 'Uploaded Images/64749f92955619.09286928.jpg', 'Others', '2023-05-29 08:50:26pm', 0),
(14, 9, 'airpods', '750.00', '6474a00e65ebd5.99294366.jpg', '-price per piece\r\n-can order on bundle\r\n-High Quality\r\n-charging cord included', 'Batangas', 'Uploaded Images/6474a00e65ebd5.99294366.jpg', 'Electronics', '2023-05-29 08:52:30pm', 0),
(15, 11, 'T-Shirt', '299.00', '6474a77435ffb7.95111634.jpg', 'Shirt Details:\r\n• TC COMBED (65% POLI, 35% COTTON)\r\n• Taped Neck\r\n• TUBULAR FABRIC COMPOSITION\r\n\r\nIf you are interested, just message our shop!!', 'Batanes', 'Uploaded Images/6474a77435ffb7.95111634.jpg', 'Clothing, Shoes and Jewelry', '2023-05-29 09:24:04pm', 0),
(16, 11, 'Running Shoes', '799.00', '6474a88c950697.60514717.jpg', 'We are looking for buyers and resellers!!\r\nJust message us!!', 'Batanes', 'Uploaded Images/6474a88c950697.60514717.jpg', 'Clothing, Shoes and Jewelry', '2023-05-29 09:28:44pm', 0),
(17, 11, 'Korean Cap', '59.00', '6474a9504bf6c9.58010340.jpg', 'Korean Cap for sale!\r\nWe are also looking for resellers, just message us !!', 'Batanes', 'Uploaded Images/6474a9504bf6c9.58010340.jpg', 'Clothing, Shoes and Jewelry', '2023-05-29 09:32:00pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_product_limit`
--

CREATE TABLE `uploaded_product_limit` (
  `product_id` int(11) NOT NULL,
  `entrep_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `uploaded_product_limit`
--

INSERT INTO `uploaded_product_limit` (`product_id`, `entrep_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 5),
(6, 5),
(7, 7),
(8, 7),
(9, 7),
(10, 6),
(11, 6),
(12, 9),
(13, 9),
(14, 9),
(15, 11),
(16, 11),
(17, 11);

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `proof` varchar(100) NOT NULL,
  `type_of_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` bigint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `viewTracker`
--

CREATE TABLE `viewTracker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `viewTracker`
--

INSERT INTO `viewTracker` (`id`, `user_id`, `product_id`, `category`, `date`) VALUES
(20, 3, 5, 'Clothing, Shoes and Jewelry', '2023-05-29 08:37:43pm'),
(21, 6, 5, 'Clothing, Shoes and Jewelry', '2023-05-30 12:19:45am'),
(22, 6, 13, 'Others', '2023-05-30 12:20:03am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `entrep`
--
ALTER TABLE `entrep`
  ADD PRIMARY KEY (`entrep_id`);

--
-- Indexes for table `entrep_profile_pic`
--
ALTER TABLE `entrep_profile_pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrep_id` (`entrep_id`);

--
-- Indexes for table `liked_business`
--
ALTER TABLE `liked_business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommender_user`
--
ALTER TABLE `recommender_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`reseller_id`);

--
-- Indexes for table `reseller_profile_pic`
--
ALTER TABLE `reseller_profile_pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reseller_id` (`reseller_id`);

--
-- Indexes for table `saved_product`
--
ALTER TABLE `saved_product`
  ADD PRIMARY KEY (`saved_id`),
  ADD KEY `reseller_id` (`reseller_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `saved_product_limit`
--
ALTER TABLE `saved_product_limit`
  ADD PRIMARY KEY (`saved_id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD KEY `reseller_id` (`reseller_id`);

--
-- Indexes for table `uploaded_product`
--
ALTER TABLE `uploaded_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `uploaded_product_limit`
--
ALTER TABLE `uploaded_product_limit`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewTracker`
--
ALTER TABLE `viewTracker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `entrep`
--
ALTER TABLE `entrep`
  MODIFY `entrep_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `entrep_profile_pic`
--
ALTER TABLE `entrep_profile_pic`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `liked_business`
--
ALTER TABLE `liked_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `premium`
--
ALTER TABLE `premium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recommender_user`
--
ALTER TABLE `recommender_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `reseller_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reseller_profile_pic`
--
ALTER TABLE `reseller_profile_pic`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saved_product`
--
ALTER TABLE `saved_product`
  MODIFY `saved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saved_product_limit`
--
ALTER TABLE `saved_product_limit`
  MODIFY `saved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uploaded_product`
--
ALTER TABLE `uploaded_product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `uploaded_product_limit`
--
ALTER TABLE `uploaded_product_limit`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `viewTracker`
--
ALTER TABLE `viewTracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
