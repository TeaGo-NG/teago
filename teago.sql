-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2021 at 03:09 PM
-- Server version: 8.0.20
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teago`
--

-- --------------------------------------------------------

--
-- Table structure for table `streamer_album`
--

CREATE TABLE `streamer_album` (
  `id` int NOT NULL,
  `name` varchar(225) NOT NULL,
  `artist` varchar(225) NOT NULL,
  `click` int NOT NULL,
  `date` varchar(225) NOT NULL,
  `describtion` longtext NOT NULL,
  `cover` varchar(225) NOT NULL,
  `genre` varchar(225) NOT NULL,
  `poster_id` int NOT NULL,
  `cover_medium` longtext NOT NULL,
  `cover_mini` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `streamer_album`
--

INSERT INTO `streamer_album` (`id`, `name`, `artist`, `click`, `date`, `describtion`, `cover`, `genre`, `poster_id`, `cover_medium`, `cover_mini`) VALUES
(1, 'Hallelujah', 'Glory Trace', 0, '1634108612', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime optio sed provident libero quibusdam earum cupiditate sapiente, laborum, consequuntur et magnam molestias qui, ratione placeat! Obcaecati pariatur saepe vel asperiores.', 'upload/photos/2021/10/zg1Y7KhKYKFdVJDM3GEy_13_image.jpg', '1', 1, 'upload/photos/2021/10/240UcHauvnu7zMDGIW3xo38_13_image.jpg', 'upload/photos/2021/10/50sbtzFhFRKo3ETQwkSVZk_13_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `streamer_content`
--

CREATE TABLE `streamer_content` (
  `id` int NOT NULL,
  `title` varchar(225) NOT NULL,
  `artistname` varchar(500) NOT NULL,
  `music` varchar(500) NOT NULL,
  `postedby` int NOT NULL,
  `albumid` int NOT NULL,
  `cover` varchar(225) NOT NULL,
  `download` int NOT NULL,
  `date` varchar(225) NOT NULL,
  `describtion` longtext NOT NULL,
  `genre` varchar(225) NOT NULL,
  `tag` text NOT NULL,
  `cover_medium` longtext NOT NULL,
  `cover_mini` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `streamer_content`
--

INSERT INTO `streamer_content` (`id`, `title`, `artistname`, `music`, `postedby`, `albumid`, `cover`, `download`, `date`, `describtion`, `genre`, `tag`, `cover_medium`, `cover_mini`) VALUES
(1, 'Sugar mummy', 'Joeboy', 'upload/sounds/2021/10/7kTggDZ2Xy1RAhrlPv5K_13_1ae140ee8e921a898c7471dbb555bc7f_soundFile.mp3', 1, 1, 'upload/photos/2021/10/zg1Y7KhKYKFdVJDM3GEy_13_image.jpg', 0, '1634108613', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime optio sed provident libero quibusdam earum cupiditate sapiente, laborum, consequuntur et magnam molestias qui, ratione placeat! Obcaecati pariatur saepe vel asperiores.', '1', 'Sugar mummy', '[object HTMLInputElement]', 'upload/photos/2021/10/50sbtzFhFRKo3ETQwkSVZk_13_image.jpg'),
(2, 'Number one', 'Joeboy', 'upload/sounds/2021/10/AGxcqUUdJ2DSsmyR3xUQ_13_7c24d227e9ad0ce70a1b876e42ef1546_soundFile.mp3', 1, 1, 'upload/photos/2021/10/zg1Y7KhKYKFdVJDM3GEy_13_image.jpg', 0, '1634108613', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime optio sed provident libero quibusdam earum cupiditate sapiente, laborum, consequuntur et magnam molestias qui, ratione placeat! Obcaecati pariatur saepe vel asperiores.', '1', 'joeboy', '[object HTMLInputElement]', 'upload/photos/2021/10/50sbtzFhFRKo3ETQwkSVZk_13_image.jpg'),
(3, 'Btter days', 'Joeboy', 'upload/sounds/2021/10/vZ9hkUaIxsF3rafZ7qmH_13_9de240abc0395e88a0fe1bbd0d590ab4_soundFile.mp3', 1, 1, 'upload/photos/2021/10/zg1Y7KhKYKFdVJDM3GEy_13_image.jpg', 0, '1634108613', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime optio sed provident libero quibusdam earum cupiditate sapiente, laborum, consequuntur et magnam molestias qui, ratione placeat! Obcaecati pariatur saepe vel asperiores.', '2', 'Better', '[object HTMLInputElement]', 'upload/photos/2021/10/50sbtzFhFRKo3ETQwkSVZk_13_image.jpg'),
(4, 'Door', 'fireboy', 'upload/sounds/2021/10/9tKvTqTX1RMv8Lphn7b7_13_2acfcef6a0ac4d9b6120906702783516_soundFile.mp3', 1, 1, 'upload/photos/2021/10/zg1Y7KhKYKFdVJDM3GEy_13_image.jpg', 0, '1634108614', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime optio sed provident libero quibusdam earum cupiditate sapiente, laborum, consequuntur et magnam molestias qui, ratione placeat! Obcaecati pariatur saepe vel asperiores.', '1', 'fireboy', '[object HTMLInputElement]', 'upload/photos/2021/10/50sbtzFhFRKo3ETQwkSVZk_13_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_appssessions`
--

CREATE TABLE `t_appssessions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `session_id` varchar(120) NOT NULL DEFAULT '',
  `platform` varchar(32) NOT NULL DEFAULT '',
  `platform_details` text,
  `time` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_appssessions`
--

INSERT INTO `t_appssessions` (`id`, `user_id`, `session_id`, `platform`, `platform_details`, `time`) VALUES
(7, 12, '1a36bc937e60ea894f5355798533c18af2baed96a936c9929175464da4f886b9166a4aab5254448717ab7b5bb7ca18f6d5f33dfbcbaee1a2', 'web', '{\"userAgent\":\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36\",\"name\":\"Google Chrome\",\"version\":\"84.0.4147.125\",\"platform\":\"windows\",\"pattern\":\"#(?<browser>Version|Chrome|other)[/ ]+(?<version>[0-9.|a-zA-Z.]*)#\",\"ip_address\":\"::1\"}', 1626982815),
(18, 33, '5696ef7f0c454064c60d6f2f93963925148531af8760120b43e831b62977bf8f145a58f3480528124a3fd911279cd8bc597fa13222ef83be', 'web', '{\"userAgent\":\"Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0\",\"name\":\"Mozilla Firefox\",\"version\":\"68.0\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Firefox|other)[/ ]+(?<version>[0-9.|a-zA-Z.]*)#\",\"ip_address\":\"127.0.0.1\"}', 1634131264),
(19, 30, '1b6a946deb07b4af317cdc4d8f5becba5860d053e13ee4ac58011a9b7d2b493101318d8985396783496bd33584d955e3913f1a3e82bb2f2d', 'web', '{\"userAgent\":\"Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0\",\"name\":\"Mozilla Firefox\",\"version\":\"68.0\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Firefox|other)[/ ]+(?<version>[0-9.|a-zA-Z.]*)#\",\"ip_address\":\"127.0.0.1\"}', 1634131326),
(20, 30, 'f3da35fbccd4cfe78f3b9dd36a9d5dbc7456607feaddd3ed058fd9728246714ace1b53d959329727a1b63b36ba67b15d2f47da55cdb8018d', 'web', '{\"userAgent\":\"Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0\",\"name\":\"Mozilla Firefox\",\"version\":\"68.0\",\"platform\":\"linux\",\"pattern\":\"#(?<browser>Version|Firefox|other)[/ ]+(?<version>[0-9.|a-zA-Z.]*)#\",\"ip_address\":\"127.0.0.1\"}', 1634200915);

-- --------------------------------------------------------

--
-- Table structure for table `t_bad_login`
--

CREATE TABLE `t_bad_login` (
  `id` int NOT NULL,
  `ip` varchar(100) NOT NULL DEFAULT '',
  `time` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_posts`
--

CREATE TABLE `t_posts` (
  `id` int NOT NULL,
  `post_id` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `recipient_id` int NOT NULL DEFAULT '0',
  `postText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `page_id` int NOT NULL DEFAULT '0',
  `group_id` int NOT NULL DEFAULT '0',
  `event_id` int NOT NULL DEFAULT '0',
  `page_event_id` int NOT NULL DEFAULT '0',
  `postLink` varchar(1000) NOT NULL DEFAULT '',
  `postLinkTitle` text,
  `postLinkImage` varchar(100) NOT NULL DEFAULT '',
  `postLinkContent` varchar(1000) NOT NULL DEFAULT '',
  `postVimeo` varchar(100) NOT NULL DEFAULT '',
  `postDailymotion` varchar(100) NOT NULL DEFAULT '',
  `postFacebook` varchar(100) NOT NULL DEFAULT '',
  `postFile` varchar(255) NOT NULL DEFAULT '',
  `postFileName` varchar(200) NOT NULL DEFAULT '',
  `postFileThumb` varchar(3000) NOT NULL DEFAULT '',
  `postYoutube` varchar(255) NOT NULL DEFAULT '',
  `postVine` varchar(32) NOT NULL DEFAULT '',
  `postSoundCloud` varchar(255) NOT NULL DEFAULT '',
  `postPlaytube` varchar(500) NOT NULL DEFAULT '',
  `postDeepsound` varchar(500) NOT NULL DEFAULT '',
  `postMap` varchar(255) NOT NULL DEFAULT '',
  `postShare` int NOT NULL DEFAULT '0',
  `postPrivacy` enum('0','1','2','3','4') NOT NULL DEFAULT '1',
  `postType` varchar(30) NOT NULL DEFAULT '',
  `postFeeling` varchar(255) NOT NULL DEFAULT '',
  `postListening` varchar(255) NOT NULL DEFAULT '',
  `postTraveling` varchar(255) NOT NULL DEFAULT '',
  `postWatching` varchar(255) NOT NULL DEFAULT '',
  `postPlaying` varchar(255) NOT NULL DEFAULT '',
  `postPhoto` varchar(3000) NOT NULL DEFAULT '',
  `time` int NOT NULL DEFAULT '0',
  `registered` varchar(32) NOT NULL DEFAULT '0/0000',
  `album_name` varchar(52) NOT NULL DEFAULT '',
  `multi_image` enum('0','1') NOT NULL DEFAULT '0',
  `multi_image_post` int NOT NULL DEFAULT '0',
  `boosted` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL DEFAULT '0',
  `poll_id` int NOT NULL DEFAULT '0',
  `blog_id` int NOT NULL DEFAULT '0',
  `forum_id` int NOT NULL DEFAULT '0',
  `thread_id` int NOT NULL DEFAULT '0',
  `videoViews` int NOT NULL DEFAULT '0',
  `postRecord` varchar(3000) NOT NULL DEFAULT '',
  `postSticker` text,
  `shared_from` int NOT NULL DEFAULT '0',
  `post_url` text,
  `parent_id` int NOT NULL DEFAULT '0',
  `cache` int NOT NULL DEFAULT '0',
  `comments_status` int NOT NULL DEFAULT '1',
  `blur` int NOT NULL DEFAULT '0',
  `color_id` int NOT NULL DEFAULT '0',
  `job_id` int NOT NULL DEFAULT '0',
  `offer_id` int NOT NULL DEFAULT '0',
  `fund_raise_id` int NOT NULL DEFAULT '0',
  `fund_id` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `stream_name` varchar(100) NOT NULL DEFAULT '',
  `live_time` int NOT NULL DEFAULT '0',
  `live_ended` int NOT NULL DEFAULT '0',
  `agora_resource_id` text,
  `agora_sid` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `user_id` int NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(70) NOT NULL DEFAULT '',
  `first_name` varchar(60) NOT NULL DEFAULT '',
  `last_name` varchar(32) NOT NULL DEFAULT '',
  `avatar` varchar(100) NOT NULL DEFAULT 'upload/photos/d-avatar.jpg',
  `cover` varchar(100) NOT NULL DEFAULT 'upload/photos/d-cover.jpg',
  `background_image` varchar(100) NOT NULL DEFAULT '',
  `background_image_status` enum('0','1') NOT NULL DEFAULT '0',
  `relationship_id` int NOT NULL DEFAULT '0',
  `address` varchar(100) NOT NULL DEFAULT '',
  `working` varchar(32) NOT NULL DEFAULT '',
  `working_link` varchar(32) NOT NULL DEFAULT '',
  `about` text,
  `school` varchar(32) NOT NULL DEFAULT '',
  `gender` varchar(32) NOT NULL DEFAULT 'male',
  `birthday` varchar(50) NOT NULL DEFAULT '0000-00-00',
  `country_id` int NOT NULL DEFAULT '0',
  `website` varchar(50) NOT NULL DEFAULT '',
  `facebook` varchar(50) NOT NULL DEFAULT '',
  `google` varchar(50) NOT NULL DEFAULT '',
  `twitter` varchar(50) NOT NULL DEFAULT '',
  `linkedin` varchar(32) NOT NULL DEFAULT '',
  `youtube` varchar(100) NOT NULL DEFAULT '',
  `vk` varchar(32) NOT NULL DEFAULT '',
  `instagram` varchar(32) NOT NULL DEFAULT '',
  `language` varchar(31) NOT NULL DEFAULT 'english',
  `email_code` varchar(32) NOT NULL DEFAULT '',
  `src` varchar(32) NOT NULL DEFAULT 'Undefined',
  `ip_address` varchar(32) DEFAULT '',
  `follow_privacy` enum('1','0') NOT NULL DEFAULT '0',
  `friend_privacy` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `post_privacy` varchar(255) NOT NULL DEFAULT 'ifollow',
  `message_privacy` enum('1','0','2') NOT NULL DEFAULT '0',
  `confirm_followers` enum('1','0') NOT NULL DEFAULT '0',
  `show_activities_privacy` enum('0','1') NOT NULL DEFAULT '1',
  `birth_privacy` enum('0','1','2') NOT NULL DEFAULT '0',
  `visit_privacy` enum('0','1') NOT NULL DEFAULT '0',
  `verified` enum('1','0') NOT NULL DEFAULT '0',
  `lastseen` int NOT NULL DEFAULT '0',
  `showlastseen` enum('1','0') NOT NULL DEFAULT '1',
  `emailNotification` enum('1','0') NOT NULL DEFAULT '1',
  `e_liked` enum('0','1') NOT NULL DEFAULT '1',
  `e_shared` enum('0','1') NOT NULL DEFAULT '1',
  `e_followed` enum('0','1') NOT NULL DEFAULT '1',
  `e_commented` enum('0','1') NOT NULL DEFAULT '1',
  `e_visited` enum('0','1') NOT NULL DEFAULT '1',
  `e_liked_page` enum('0','1') NOT NULL DEFAULT '1',
  `e_mentioned` enum('0','1') NOT NULL DEFAULT '1',
  `e_joined_group` enum('0','1') NOT NULL DEFAULT '1',
  `e_accepted` enum('0','1') NOT NULL DEFAULT '1',
  `e_profile_wall_post` enum('0','1') NOT NULL DEFAULT '1',
  `e_sentme_msg` enum('0','1') NOT NULL DEFAULT '0',
  `e_last_notif` varchar(50) NOT NULL DEFAULT '0',
  `notification_settings` varchar(400) NOT NULL DEFAULT '{"e_liked":1,"e_shared":1,"e_wondered":0,"e_commented":1,"e_followed":1,"e_accepted":1,"e_mentioned":1,"e_joined_group":1,"e_liked_page":1,"e_visited":1,"e_profile_wall_post":1,"e_memory":1}',
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `active` enum('0','1','2') NOT NULL DEFAULT '0',
  `type` varchar(11) NOT NULL DEFAULT 'user',
  `registered` varchar(32) NOT NULL DEFAULT '0/0000',
  `start_up` enum('0','1') NOT NULL DEFAULT '0',
  `start_up_info` enum('0','1') NOT NULL DEFAULT '0',
  `startup_follow` enum('0','1') NOT NULL DEFAULT '0',
  `startup_image` enum('0','1') NOT NULL DEFAULT '0',
  `last_email_sent` int NOT NULL DEFAULT '0',
  `phone_number` varchar(32) NOT NULL DEFAULT '',
  `sms_code` int NOT NULL DEFAULT '0',
  `joined` int NOT NULL DEFAULT '0',
  `timezone` varchar(50) NOT NULL DEFAULT '',
  `balance` varchar(100) NOT NULL DEFAULT '0',
  `paypal_email` varchar(100) NOT NULL DEFAULT '',
  `notifications_sound` enum('0','1') NOT NULL DEFAULT '0',
  `order_posts_by` enum('0','1') NOT NULL DEFAULT '1',
  `social_login` enum('0','1') NOT NULL DEFAULT '0',
  `android_m_device_id` varchar(50) NOT NULL DEFAULT '',
  `ios_m_device_id` varchar(50) NOT NULL DEFAULT '',
  `android_n_device_id` varchar(50) NOT NULL DEFAULT '',
  `ios_n_device_id` varchar(50) NOT NULL DEFAULT '',
  `web_device_id` varchar(100) NOT NULL DEFAULT '',
  `wallet` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0.00',
  `lat` varchar(200) NOT NULL DEFAULT '0',
  `lng` varchar(200) NOT NULL DEFAULT '0',
  `last_location_update` varchar(30) NOT NULL DEFAULT '0',
  `share_my_location` int NOT NULL DEFAULT '1',
  `last_data_update` int NOT NULL DEFAULT '0',
  `details` varchar(300) NOT NULL DEFAULT '{"post_count":0,"album_count":0,"following_count":0,"followers_count":0,"groups_count":0,"likes_count":0}',
  `sidebar_data` text,
  `last_avatar_mod` int NOT NULL DEFAULT '0',
  `last_cover_mod` int NOT NULL DEFAULT '0',
  `points` float UNSIGNED NOT NULL DEFAULT '0',
  `daily_points` int NOT NULL DEFAULT '0',
  `point_day_expire` varchar(50) NOT NULL DEFAULT '',
  `last_follow_id` int NOT NULL DEFAULT '0',
  `share_my_data` int NOT NULL DEFAULT '1',
  `last_login_data` text,
  `two_factor` int NOT NULL DEFAULT '0',
  `new_email` varchar(255) NOT NULL DEFAULT '',
  `two_factor_verified` int NOT NULL DEFAULT '0',
  `new_phone` varchar(32) NOT NULL DEFAULT '',
  `info_file` varchar(300) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `state` varchar(50) NOT NULL DEFAULT '',
  `zip` varchar(11) NOT NULL DEFAULT '',
  `school_completed` int NOT NULL DEFAULT '0',
  `weather_unit` varchar(11) NOT NULL DEFAULT 'us'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`user_id`, `username`, `email`, `password`, `first_name`, `last_name`, `avatar`, `cover`, `background_image`, `background_image_status`, `relationship_id`, `address`, `working`, `working_link`, `about`, `school`, `gender`, `birthday`, `country_id`, `website`, `facebook`, `google`, `twitter`, `linkedin`, `youtube`, `vk`, `instagram`, `language`, `email_code`, `src`, `ip_address`, `follow_privacy`, `friend_privacy`, `post_privacy`, `message_privacy`, `confirm_followers`, `show_activities_privacy`, `birth_privacy`, `visit_privacy`, `verified`, `lastseen`, `showlastseen`, `emailNotification`, `e_liked`, `e_shared`, `e_followed`, `e_commented`, `e_visited`, `e_liked_page`, `e_mentioned`, `e_joined_group`, `e_accepted`, `e_profile_wall_post`, `e_sentme_msg`, `e_last_notif`, `notification_settings`, `status`, `active`, `type`, `registered`, `start_up`, `start_up_info`, `startup_follow`, `startup_image`, `last_email_sent`, `phone_number`, `sms_code`, `joined`, `timezone`, `balance`, `paypal_email`, `notifications_sound`, `order_posts_by`, `social_login`, `android_m_device_id`, `ios_m_device_id`, `android_n_device_id`, `ios_n_device_id`, `web_device_id`, `wallet`, `lat`, `lng`, `last_location_update`, `share_my_location`, `last_data_update`, `details`, `sidebar_data`, `last_avatar_mod`, `last_cover_mod`, `points`, `daily_points`, `point_day_expire`, `last_follow_id`, `share_my_data`, `last_login_data`, `two_factor`, `new_email`, `two_factor_verified`, `new_phone`, `info_file`, `city`, `state`, `zip`, `school_completed`, `weather_unit`) VALUES
(30, 'akintomide.ayodele4406', 'akintomide@gmail.com', '$2y$10$UtgXHlU1aphy0Oo9zgZECOQIHhDU1ai24/rgXdNpsGuotHtolrt3i', '', '', 'upload/photos/d-avatar.jpg', 'upload/photos/d-cover.jpg', '', '0', 0, '', '', '', NULL, '', 'male', '0000-00-00', 0, '', '', '', '', '', '', '', '', 'english', '1f2e81adb7018fe109bb873d3e1db191', 'site', '127.0.0.1', '0', '0', 'ifollow', '0', '0', '1', '0', '0', '0', 1627003707, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '{\"e_liked\":1,\"e_shared\":1,\"e_wondered\":0,\"e_commented\":1,\"e_followed\":1,\"e_accepted\":1,\"e_mentioned\":1,\"e_joined_group\":1,\"e_liked_page\":1,\"e_visited\":1,\"e_profile_wall_post\":1,\"e_memory\":1}', '0', '1', 'user', '7/2021', '0', '0', '0', '0', 0, '', 0, 1627003707, '', '0', '', '0', '0', '0', '', '', '', '', '', '0.00', '0', '0', '0', 1, 0, '{\"post_count\":0,\"album_count\":0,\"following_count\":0,\"followers_count\":0,\"groups_count\":0,\"likes_count\":0}', NULL, 0, 0, 0, 0, '', 0, 1, NULL, 0, '', 0, '', '', '', '', '', 0, 'us'),
(31, 'akintomide.atodele6917', 'akintoide@gmail.com', '$2y$10$9WSTH/B2K79RhyNjBq/5s.8aKt6kE0uMTjUj//fojg3FRdp0FjgXy', '', '', 'upload/photos/d-avatar.jpg', 'upload/photos/d-cover.jpg', '', '0', 0, '', '', '', NULL, '', 'male', '0000-00-00', 0, '', '', '', '', '', '', '', '', 'english', '80373344cfe1a74860d57f91e16ab3bf', 'site', '127.0.0.1', '0', '0', 'ifollow', '0', '0', '1', '0', '0', '0', 1627003893, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '{\"e_liked\":1,\"e_shared\":1,\"e_wondered\":0,\"e_commented\":1,\"e_followed\":1,\"e_accepted\":1,\"e_mentioned\":1,\"e_joined_group\":1,\"e_liked_page\":1,\"e_visited\":1,\"e_profile_wall_post\":1,\"e_memory\":1}', '0', '1', 'user', '7/2021', '0', '0', '0', '0', 0, '', 0, 1627003893, '', '0', '', '0', '0', '0', '', '', '', '', '', '0.00', '0', '0', '0', 1, 0, '{\"post_count\":0,\"album_count\":0,\"following_count\":0,\"followers_count\":0,\"groups_count\":0,\"likes_count\":0}', NULL, 0, 0, 0, 0, '', 0, 1, NULL, 0, '', 0, '', '', '', '', '', 0, 'us'),
(32, 'ayodele.akintomi1891', 'wizzy@gmail.com', '$2y$10$.J/Bpeg9MCeaXlDAQhaGBuSQHB86LFw.Rnzaua1qWMxt8cgxgBlvm', '', '', 'upload/photos/d-avatar.jpg', 'upload/photos/d-cover.jpg', '', '0', 0, '', '', '', NULL, '', 'male', '0000-00-00', 0, '', '', '', '', '', '', '', '', 'english', '29b0847d427255247f5cdbbd795c8792', 'site', '127.0.0.1', '0', '0', 'ifollow', '0', '0', '1', '0', '0', '0', 1627004173, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '{\"e_liked\":1,\"e_shared\":1,\"e_wondered\":0,\"e_commented\":1,\"e_followed\":1,\"e_accepted\":1,\"e_mentioned\":1,\"e_joined_group\":1,\"e_liked_page\":1,\"e_visited\":1,\"e_profile_wall_post\":1,\"e_memory\":1}', '0', '1', 'user', '7/2021', '0', '0', '0', '0', 0, '', 0, 1627004173, '', '0', '', '0', '0', '0', '', '', '', '', '', '0.00', '0', '0', '0', 1, 0, '{\"post_count\":0,\"album_count\":0,\"following_count\":0,\"followers_count\":0,\"groups_count\":0,\"likes_count\":0}', NULL, 0, 0, 0, 0, '', 0, 1, NULL, 0, '', 0, '', '', '', '', '', 0, 'us'),
(33, 'hhhh.4609', 'akintde@gmail.com', '$2y$10$eTPPqT1zxnFV.3F4kJ6ShuzazjyU6k33UfYEKB/wik0jj5SzpXL4e', 'hhhh', 'hhhh', 'upload/photos/d-avatar.jpg', 'upload/photos/d-cover.jpg', '', '0', 0, '', '', '', NULL, '', 'male', '0000-00-00', 0, '', '', '', '', '', '', '', '', 'english', '259097e16ba1d56e980dd3778cb47b2f', 'site', '127.0.0.1', '0', '0', 'ifollow', '0', '0', '1', '0', '0', '0', 1634131262, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '{\"e_liked\":1,\"e_shared\":1,\"e_wondered\":0,\"e_commented\":1,\"e_followed\":1,\"e_accepted\":1,\"e_mentioned\":1,\"e_joined_group\":1,\"e_liked_page\":1,\"e_visited\":1,\"e_profile_wall_post\":1,\"e_memory\":1}', '0', '1', 'user', '10/2021', '0', '0', '0', '0', 0, '', 0, 1634131262, '', '0', '', '0', '0', '0', '', '', '', '', '', '0.00', '0', '0', '0', 1, 0, '{\"post_count\":0,\"album_count\":0,\"following_count\":0,\"followers_count\":0,\"groups_count\":0,\"likes_count\":0}', NULL, 0, 0, 0, 0, '', 0, 1, NULL, 0, '', 0, '', '', '', '', '', 0, 'us');

-- --------------------------------------------------------

--
-- Table structure for table `t_users_filed`
--

CREATE TABLE `t_users_filed` (
  `id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_users_filed`
--

INSERT INTO `t_users_filed` (`id`, `user_id`) VALUES
(30, 30),
(31, 31),
(32, 32),
(33, 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `streamer_album`
--
ALTER TABLE `streamer_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streamer_content`
--
ALTER TABLE `streamer_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_appssessions`
--
ALTER TABLE `t_appssessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session_id` (`session_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `platform` (`platform`);

--
-- Indexes for table `t_bad_login`
--
ALTER TABLE `t_bad_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip` (`ip`);

--
-- Indexes for table `t_posts`
--
ALTER TABLE `t_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `recipient_id` (`recipient_id`),
  ADD KEY `postFile` (`postFile`),
  ADD KEY `postShare` (`postShare`),
  ADD KEY `postType` (`postType`),
  ADD KEY `postYoutube` (`postYoutube`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `registered` (`registered`),
  ADD KEY `time` (`time`),
  ADD KEY `boosted` (`boosted`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `poll_id` (`poll_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `videoViews` (`videoViews`),
  ADD KEY `shared_from` (`shared_from`),
  ADD KEY `order1` (`user_id`,`id`),
  ADD KEY `order2` (`page_id`,`id`),
  ADD KEY `order3` (`group_id`,`id`),
  ADD KEY `order4` (`recipient_id`,`id`),
  ADD KEY `order5` (`event_id`,`id`),
  ADD KEY `order6` (`parent_id`,`id`),
  ADD KEY `multi_image` (`multi_image`),
  ADD KEY `album_name` (`album_name`),
  ADD KEY `postFacebook` (`postFacebook`),
  ADD KEY `postVimeo` (`postVimeo`),
  ADD KEY `postDailymotion` (`postDailymotion`),
  ADD KEY `postSoundCloud` (`postSoundCloud`),
  ADD KEY `postYoutube_2` (`postYoutube`),
  ADD KEY `fund_raise_id` (`fund_raise_id`),
  ADD KEY `fund_id` (`fund_id`),
  ADD KEY `offer_id` (`offer_id`),
  ADD KEY `live_time` (`live_time`),
  ADD KEY `live_ended` (`live_ended`),
  ADD KEY `active` (`active`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `page_event_id` (`page_event_id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `thread_id` (`thread_id`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `active` (`active`),
  ADD KEY `src` (`src`),
  ADD KEY `gender` (`gender`),
  ADD KEY `avatar` (`avatar`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `registered` (`registered`),
  ADD KEY `joined` (`joined`),
  ADD KEY `phone_number` (`phone_number`) USING BTREE,
  ADD KEY `wallet` (`wallet`),
  ADD KEY `friend_privacy` (`friend_privacy`),
  ADD KEY `lat` (`lat`),
  ADD KEY `lng` (`lng`),
  ADD KEY `order1` (`username`,`user_id`),
  ADD KEY `order2` (`email`,`user_id`),
  ADD KEY `order3` (`lastseen`,`user_id`),
  ADD KEY `order4` (`active`,`user_id`),
  ADD KEY `last_data_update` (`last_data_update`),
  ADD KEY `points` (`points`);

--
-- Indexes for table `t_users_filed`
--
ALTER TABLE `t_users_filed`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `streamer_album`
--
ALTER TABLE `streamer_album`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `streamer_content`
--
ALTER TABLE `streamer_content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_appssessions`
--
ALTER TABLE `t_appssessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_bad_login`
--
ALTER TABLE `t_bad_login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_posts`
--
ALTER TABLE `t_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `t_users_filed`
--
ALTER TABLE `t_users_filed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
