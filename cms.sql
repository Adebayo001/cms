-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 12:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(5) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'bootstrap'),
(3, 'php'),
(4, 'python');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_content`, `comment_status`, `comment_email`, `comment_date`) VALUES
(2, 3, 'adebayo', 'wow, what a nice content.', 'Unapproved', 'adex@gmail.com', '2022-06-23'),
(4, 4, 'Abike', 'It is really nice content. Keep it up', 'Unapproved', 'adex@gmail.com', '2022-06-23'),
(5, 3, 'Muminat', 'Hey, Hello, how are you doing? Hope you are well.', 'Unapproved', 'muminat@gmail.com', '2022-06-23'),
(6, 3, 'Ruqqoyah', 'Hey dear, I love you', 'Approved', 'ruka123@gmail.com', '2022-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(2, 1, 'Javascript', 'Adebayo', '2022-07-18', 'javascript.png', 'This is a great course to take. I am enjoying it.\"', 'web', '4', 'Published', 3),
(3, 1, 'PHP Course Content', 'Edwin', '2022-06-18', 'image_1.jpg', 'The course is so good and going on well', 'web, html, php', '5', 'Published', 1),
(4, 1, 'Lorem Ipsum', 'Edwin', '2022-06-27', 'image_5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pharetra id felis in commodo. Sed sed justo auctor, aliquam neque vitae, faucibus massa. Sed bibendum mi ac tincidunt viverra. Aenean ex quam, porttitor eget gravida sit amet, scelerisque a mauris. Vestibulum fermentum ligula non metus laoreet porttitor. Nunc ac neque et justo molestie tempus. Curabitur lorem ligula, tristique elementum velit et, iaculis fermentum leo. Nam non ex tellus. Suspendisse gravida, ligula eu consectetur varius, felis lacus ullamcorper turpis, sit amet condimentum ligula quam ut quam. Mauris consectetur est sapien, at ultricies nunc semper in. Nullam tempus aliquam sem, nec lobortis ligula tristique congue. In vel mollis velit. Cras ullamcorper ultrices libero hendrerit congue. Donec suscipit, diam pretium volutpat lobortis, neque libero finibus mi, eu fermentum felis nibh eu felis.\"\"\"', 'sample post, lorem', '4', 'Published', 0),
(6, 1, 'Lorem Ipsum', 'Edwin', '2022-08-03', 'image_5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pharetra id felis in commodo. Sed sed justo auctor, aliquam neque vitae, faucibus massa. Sed bibendum mi ac tincidunt viverra. Aenean ex quam, porttitor eget gravida sit amet, scelerisque a mauris. Vestibulum fermentum ligula non metus laoreet porttitor. Nunc ac neque et justo molestie tempus. Curabitur lorem ligula, tristique elementum velit et, iaculis fermentum leo. Nam non ex tellus. Suspendisse gravida, ligula eu consectetur varius, felis lacus ullamcorper turpis, sit amet condimentum ligula quam ut quam. Mauris consectetur est sapien, at ultricies nunc semper in. Nullam tempus aliquam sem, nec lobortis ligula tristique congue. In vel mollis velit. Cras ullamcorper ultrices libero hendrerit congue. Donec suscipit, diam pretium volutpat lobortis, neque libero finibus mi, eu fermentum felis nibh eu felis.\"\"\"', 'sample post, lorem', '0', 'Draft', 0),
(7, 1, 'PHP Course Content', 'Edwin', '2022-08-03', 'image_1.jpg', 'The course is so good and going on well', 'web, html, php', '0', 'Draft', 0),
(8, 1, 'Javascript', 'Adebayo', '2022-08-03', 'javascript.png', 'This is a great course to take. I am enjoying it.\"', 'web', '0', 'Draft', 1),
(9, 1, 'Javascript', 'Adebayo', '2022-08-03', 'javascript.png', 'This is a great course to take. I am enjoying it.\"', 'web', '0', 'Published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$babaweyreyniboboyensha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'Adex', '$2y$10$922zWDCRZXkskIqMw36yD.2i9taUCXnhILegBx.S8/jC3N9ghXp5K', 'Adebayo', 'Oladimeji', 'adex@gmail.com', '', 'admin', '$2y$10$babaweyreyniboboyensha'),
(2, 'Ajibike', '$2y$10$SGQZdFvCpvgqaps7ptOlLOqjIhnyaQ3wdJVWoLNlmylGGl.0.X.u.', 'Abike', 'Ajike', 'ajibike@gmail.com', '', 'subscriber', ''),
(9, 'alabi', '$2y$10$XDF1232kYmOYW1fF6JPwo.El5SRQORb1xdLfbLI.INh.0MJeS/D5i', 'Alabi', 'Adeeyo', 'alabi@gmail.com', '', 'admin', '$2y$10$babaweyreyniboboyensha');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;