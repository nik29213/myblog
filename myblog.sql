-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2019 at 12:34 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--
create database myblog;
-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'php'),
(2, 'html and css');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `title`, `content`, `author`, `tags`, `date`) VALUES
(1, 1, 'what is php?', 'PHP stands for Hypertext Preprocessor (no, the acronym doesn\'t follow the name). It\'s an open source, server-side, scripting language used for the development of web applications. By scripting language, we mean a program that is script-based (lines of code) written for the automation of tasks.\r\n\r\nWhat does open source mean? Think of a car manufacturer making the secret to its design models and technology innovations available to anyone interested. These design and technology details can be redistributed, modified, and adopted without the fear of any legal repercussions. The world today might have developed an amazing supercar!\r\n\r\nWeb pages can be designed using HTML. With HTML, code execution is done on the user\'s browser (client-side). On the other hand, with PHP server-side scripting language, it\'s executed on the server before it gets to the web browser of the user.\r\n\r\nPHP can be embedded in HTML, and it\'s well suited for web development and the creation of dynamic web pages for web applications, e-commerce applications, and database applications. It\'s considered a friendly language with abilities to easily connect with MySQL, Oracle, and other databases', 'auth1', 'php,definition,describe,server side scripting language', '2019-03-10 11:04:37'),
(2, 1, 'uses of php', 'PHP scripts can be used on most of the well-known operating systems like Linux, Unix, Solaris, Microsoft Windows, MAC OS and many others. It also supports most web servers including Apache and IIS. Using PHP affords web developers the freedom to choose their operating system and web server.\r\n\r\nIn PHP, server-side scripting is the main area of operation. Server-side scripting with PHP involves:\r\n<br />\r\nPHP Parser: a program that converts source and human readable code into a format easier for the computer to understand\r\nWeb server: a program that executes files that form web pages from user requests\r\nWeb browser: an application used to display content on the World Wide Web\r\nIn this instance, with the use of just a PHP parser, the PHP script can be executed without a server program or browser. This use of the PHP script is normally employed for simple text processing tasks, like task schedulers.\r\n\r\nPHP can also be used for creating client-side applications, like desktop applications. Desktop applications are usually characterized by a graphic user interface. With knowledge in using the advanced features of PHP, such as PHP-GTK, these client-side applications can be developed', 'auth2', 'use,php,scripting', '2019-03-10 11:08:31'),
(3, 1, 'title 3', 'content3', 'author 3', 'php,sample', '2019-03-16 16:39:48'),
(4, 1, 'title 4', 'But the truth is that your clients, existing and potential, are spending a substantial amount of time online – watching, learning, engaging, purchasing, and working. And as a result, just as there’s been a shift from traditional brick-and-mortar selling to ecommerce, there’s been a shift in traditional marketing methods to digital marketing\r\nActionable social media tips: Twitter stats', 'author 4', 'php,sample,bootstrap,web,html,css', '2019-03-16 16:42:35'),
(5, 1, 'social media', 'Social media can be an excellent resource to increase brand awareness, reach new clients, and build valuable relationships with existing clients or other experts in your industry.\r\n\r\nI’ve listed 11 actionable social media tips vyou can implement today, and have broken them down by the four Cs of social media: clout, community and conversations, content, and conversions. In addition, we’ll explore some valuable insight and advice from Shopify Partners who are embracing social.', 'author 4', 'php,sample,bootstrap,web,html,css', '2019-03-16 16:43:34'),
(6, 1, 'ttle 5', 'o check your profile images on your social accounts. Are any of them fuzzy?\r\n\r\nIf you’re a web designer or developer, and you don’t have crisp, properly sized images on your social accounts, what do you think potential clients are going to assume about the quality of your work? Think of your social media profiles as a first impression.\r\n\r\nYou’ll also want to ensure you’re using consistent branding assets across channels, because consistency means reliability in the eyes of a potential client', 'auth5', 'php,html,bootstrap,web', '2019-03-16 16:46:20'),
(7, 1, 'logo', 'Make sure your logo is formatted the same, use the same color schemes, and if you can, try to use the optimum photo size when posting to each platform. If your feed contains a bunch of photos that are different sizes and qualities, it may look a little disorganized and chaotic – and you don’t want to imply that about your company.\r\n\r\nA great example of a web agency that does this well is Pointer Creative. Whether they’re posting a job opening, a holiday picture, or a blog post, a lot of their recurring content uses consistent branding and design.', 'auth5', 'php,html,bootstrap,web', '2019-03-16 16:48:35'),
(8, 1, 'design images', 'When it comes to their consistent branding and design on social, communications specialist Laura Brisson from Pointer Creative says that consistency reinforces brand identity.\r\n\r\n“We’re professionals, but using a fun and approachable voice and showing our personality gives us the opportunity to interact on a more personal level with our audience,” Laura explains. “Second, it demonstrates to potential customers what they can expect from us when we work together. Being consistent in your own work and content goes a long way to building trust with customers.”', 'auth5', 'php,html,bootstrap,web', '2019-03-16 16:49:29'),
(9, 1, 'seo', 'Your character count here is limited, so you’ll want to be careful with the words you choose. Take some time to do a bit of SEO research, with a tool like SEMrush, and see if you can implement any high-search-volume words into your description that, of course, are relevant to your business. Never sacrifice relevancy for search volume.\r\n\r\nTheme developers Out of The Sandbox have a solid Twitter bio. They let us know what industry they’re in, mention they work specifically on Shopify theme development, and that they’re an award-winning company devoted to quality – characteristics that are likely to attract clients.', 'auth5', 'php,html,bootstrap,web', '2019-03-16 16:50:54'),
(10, 1, 'display review', 'Imagine you’re downtown looking for a place to eat lunch, and you’re trying to decide between two restaurants. You notice that one restaurant looks busy and has quite a few people sitting outside, and the other restaurant looks empty. Which are you more likely to choose?\r\n\r\nMany would assume that the busy restaurant must have great food and the other restaurant probably doesn’t. Although this might not actually be the reality, social proof has immense influence over consumer decisions.\r\n\r\nHaving good client reviews on your Facebook page is an excellent form of social proof. When it comes down to a potential client choosing between your business and another, you’ll want to have stellar reviews that offer more detail than a simple x-star rating, in order to convince them that you’re the best choice.', 'auth6', 'php,html,bootstrap,web', '2019-03-16 16:51:58'),
(11, 1, 'display review', 'Jonathan adds that at this point in the project timeline, customers are in a state of gratitude and are more likely to take the five minutes needed to write a review, in order to reciprocate that feeling.\r\n\r\nHe uses the following outreach (which he adjusts to fit the context of the specific project in question).\r\n\r\nHey [store owner name],\r\n\r\nThanks for choosing to work with us for your [task (or tasks)]. Would you kindly take a minute to write a short testimonial for our Expert’s profile/Facebook? It will help build our reputation as Shopify Experts, and help us reach more merchants', 'auth7', 'php,html,bootstrap,web', '2019-03-16 16:52:49'),
(12, 1, 'online listening', 'Listen in on conversations. Use social media as a way to keep up with what your competition is doing and become more in tune with your clients.\r\n\r\nOne great way of doing this is creating Twitter lists or following relevant hashtags. You can create lists of competitors, accounts you draw inspiration from, or your most valued clients to see what they’re up to and what they’re currently interested in.\r\n\r\nKeeping tabs on important people and topics in your industry can spark new business ideas or highlight areas of improvement. You can use social media listening tools like Sprout Social, Keyhole, and Buzzlogix, to help you keep track of when keywords you’ve identified are mentioned online.', 'auth', 'php,html,bootstrap,web', '2019-03-16 16:54:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
