-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 fév. 2023 à 08:01
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shopee`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_name` varchar(200) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_presentation` text DEFAULT NULL,
  `blog_content` text DEFAULT NULL,
  `blog_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_name`, `blog_image`, `blog_presentation`, `blog_content`, `blog_register`) VALUES
(1, 'Les nouveaux smartphone', './assets/blog/blog1.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis beatae ullam inventore rerum. Possimus nobis non officiis incidunt ullam ducimus!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis beatae ullam inventore rerum. Possimus nobis non officiis incidunt ullam ducimus!', '2022-12-22 14:37:59'),
(2, 'Ce smartphone va tout changer', './assets/blog/blog2.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis beatae ullam inventore rerum. Possimus nobis non officiis incidunt ullam ducimus!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis beatae ullam inventore rerum. Possimus nobis non officiis incidunt ullam ducimus!', '2022-12-22 14:37:59'),
(3, 'Comment crée sont propres smatphone', './assets/blog/blog3.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis beatae ullam inventore rerum. Possimus nobis non officiis incidunt ullam ducimus!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis beatae ullam inventore rerum. Possimus nobis non officiis incidunt ullam ducimus!', '2022-12-22 14:37:59');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(19, 1, 12),
(21, 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung Galaxy 10', 152.00, './assets/products/1.png', '2020-03-28 11:08:57'),
(2, 'Redmi', 'Redmi Note 8', 122.00, './assets/products/2.png', '2020-03-28 11:08:57'),
(3, 'Redmi', 'Redmi Note 6', 122.00, './assets/products/3.png', '2020-03-28 11:08:57'),
(4, 'Redmi', 'Redmi Note 9', 122.00, './assets/products/4.png', '2020-03-28 11:08:57'),
(5, 'Redmi', 'Redmi Note 4', 122.00, './assets/products/5.png', '2020-03-28 11:08:57'),
(6, 'Redmi', 'Redmi Note 8', 122.00, './assets/products/6.png', '2020-03-28 11:08:57'),
(7, 'Redmi', 'Redmi Note 9', 122.00, './assets/products/8.png', '2020-03-28 11:08:57'),
(8, 'Redmi', 'Redmi Note', 122.00, './assets/products/10.png', '2020-03-28 11:08:57'),
(9, 'Samsung', 'Samsung Galaxy S6', 152.00, './assets/products/11.png', '2020-03-28 11:08:57'),
(10, 'Samsung', 'Samsung Galaxy S7', 152.00, './assets/products/12.png', '2020-03-28 11:08:57'),
(11, 'Apple', 'Apple iPhone 5', 152.00, './assets/products/13.png', '2020-03-28 11:08:57'),
(12, 'Apple', 'Apple iPhone 6', 152.00, './assets/products/14.png', '2020-03-28 11:08:57'),
(13, 'Apple', 'Apple iPhone 7', 152.00, './assets/products/15.png', '2020-03-28 11:08:57');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `user_mail` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_role` varchar(250) NOT NULL,
  `user_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `last_name`, `first_name`, `user_mail`, `user_pass`, `user_role`, `user_date`) VALUES
(12, 'Amalia', 'Lebideau', 'amailialbd@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$L2l6VUFSQVNmVDZPQkFpRA$NKWLU4OBsxU6BPANIs8vo/LMrNgUhEE6KF+OiCWpiRs', '[\\\"ROLE_USER\"\\]', '2023-02-17'),
(13, 'Amalia', 'Lebideau', 'amailialbd@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Vi4wQzlvVlpORFB3TTZEaQ$KU+fRlJqp0d9cQzCnd4wVgrSm29kzFxKpqNp/BjxaPc', '[\\\"ROLE_USER\"\\]', '2023-02-17'),
(14, 'Fanny', 'Monnier', 'fannymonnier@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$aGd6ZS82b25DTzd5elB5Ng$qL7qHJrYOgmhAai6bsgJNEOGaabfukGucu2gcB1dmhA', '[\\\"ROLE_USER\"\\]', '2023-02-17'),
(15, 'Loic', 'Mille', 'loicmille@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ejRnT0FmaHpMcDRCOVlEcQ$i6XZeMxDjTPJTqMS/CerjlTWkx8JLtRdwLBGyj9qweU', '[\\\"ROLE_USER\"\\]', '2023-02-17'),
(16, 'Nicolas', 'Lalande', 'nicola@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$cW5HWktXOFQ5bDBnUGU4Tg$oTu7G/l8vCZTwvpKwQNmV5n7d4BbvlSqRJ1uvF/h4ek', '[\\\"ROLE_USER\"\\]', '2023-02-17'),
(17, 'Nicolas', 'Lalande', 'nicola@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NFNaL1NLMXdmOTd3bWhiYw$/YUksAFz8kRRw/umOXxuDaKfY5zpDCioH4XKD1FRd2I', '[\\\"ROLE_USER\"\\]', '2023-02-17'),
(18, 'Prout', 'Océanne', 'prout@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Z01FaEh5dDhTU1hqM05nSw$eMzwyxy90PNAg6BxFvOgwIQCLaBG7yb4W3RI0Mc9XSU', '[\\\"ROLE_USER\"\\]', '2023-02-18'),
(19, 'Prout', 'Océanne', 'prout@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ck9NaWFReThOZmNsQWZSZw$sUX5AqCAuiNZ44+gMxl3pvLDjajvGap1N/rCU+XcsVo', '[\\\"ROLE_USER\"\\]', '2023-02-18'),
(20, 'clarisse', 'angonnet', 'cl@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$R3B2Y3d3aGUwcEhGR0V3ZQ$3QBpE+Z4fkojRjoj/tv8ZgzoG6x2JNDYF/7VZACR6+Y', '[\\\"ROLE_USER\"\\]', '2023-02-18'),
(21, 'Monnier', 'Fanny', 'fanny@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NWlwcVZJazMvVDk2aEszLg$bbOWBXtoeE5Y2n3+AX25hrQ6GMhBniC3JgBSaodfpdI', '[\\\"ROLE_USER\"\\]', '2023-02-18'),
(22, 'Monnier', 'Valérie', 'val@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$bjIvNHRMRnJjYkdrS25SZw$iyt90rLeVJBYfl6UENudE254QI0JVqhP+D5CtNRD97Q', '[\\\"ROLE_USER\"\\]', '2023-02-18'),
(23, 'Monnier', 'mery', 'mery@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZWxkQngybnhhRktzZHdSSw$6nx+Da1Tk0t1sgpDOuSoxNJrkehXyJ11/A423kPt0go', '[\\\"ROLE_USER\"\\]', '2023-02-18'),
(24, 'Monnier', 'Maxime', 'abilive-39@hotmail.fr', '$argon2id$v=19$m=65536,t=4,p=1$LlRIMW1RVkp3OGkuQU1Uaw$JnQnp+7Jm4h7ZtnJSlXbaFAxA9YZvcJzJihfWFSWudQ', '[\\\"ROLE_USER\"\\]', '2023-02-19'),
(25, 'Castro', 'Sabrina', 'ca@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$V1pBWEh1QmREY3hCSzdHLw$wj3x4V3FIBZFEsRCxKRv79oDemQlVX4E6xyq1P0BELk', '[\\\"ROLE_USER\"\\]', '2023-02-19'),
(26, 'Monnier', 'maxime', 'ma@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$L3hnSnFqNkZIVlk3czFDaQ$rD1emGEe611A4i4jcBhxdw4PgnaA9L+F0StGp5x4DjQ', '[\\\"ROLE_USER\"\\]', '2023-02-19'),
(27, 'Oliver', 'Franck', 'fo@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Y2RXTGpTWnJieXVuOEc5RQ$XxQ7vp37jceQPyguiIT24162TiAGyqeOcuBiWYR42pc', '[\\\"ROLE_USER\"\\]', '2023-02-19'),
(28, 'Monnier', 'ùzlkcfze', 'po@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$eWhWZm5BMWkxSWdWUXJOMA$p0i/SlRTiWKGy1BQZJ2hJV5/P3DxHvJZOKemcMH7xXs', '[\\\"ROLE_USER\"\\]', '2023-02-19'),
(29, 'azda', 'dza', 'kj@kk.com', '$argon2id$v=19$m=65536,t=4,p=1$dXhaZHBORzRBYncwekZKRA$r4b9ULJoSCcE3xSacul0bokVnMaHthHx3ztpeVJ2pCo', '[\\\"ROLE_USER\"\\]', '2023-02-19'),
(30, 'Monnier', 'Philippe', 'pm@gmal.com', '$argon2id$v=19$m=65536,t=4,p=1$N292d3VKVjJWWFBEVkY3bg$JD67U+Uxmy34FQzIJmLrCFPrN5MX9D2w3Ne00vMVGOs', '[\\\"ROLE_USER\"\\]', '2023-02-19'),
(31, 'toto', 'lolo', 'lolo@12.fr', '$argon2id$v=19$m=65536,t=4,p=1$eWhLSVhKQ2ZmZjBCWnRkcw$NtESY0bp45xj+o2s6d6dK35fa+msOKeJwUlmOwdzOVY', '[\\\"ROLE_USER\"\\]', '2023-02-19'),
(32, 'Pelayo', 'Joseph', 'pelayo@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$N2RCVVFoWFNhdEouQjBtbw$r1DYksXXGZX6ula0GRBBHZ0a/VEhgaATtKfQ9StMt9c', '[\\\"ROLE_USER\"\\]', '2023-02-20'),
(33, 'maxime', 'maxime', 'toto@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UHVZbEVObC5YV1NMSTVnSA$5BmSG0JgvCPlhcz5HUMDhKSD1WCBnLRbriPCQJLNv1o', '[\\\"ROLE_USER\"\\]', '2023-02-20'),
(34, 'Malbet', 'paola', 'pao@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$MTU2bTFteTNaL0lhcmJtdg$h0y8owTLdjy3DMBuVmxD+UlzAYvP/qJqMbxsCHGeCf0', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(35, 'castro', 'Sabrina', 'sab@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NDB1SDJraEFPeGkuaG5QLw$j9hnoUSACIo/dhAQTtyYvA2/MzA4v7lJmfBemyJaNIE', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(36, 'Lebon', 'Adrien', 'adri@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$clZXbTNSMW9mUjBXVklnaw$7Z8C7c9nAVaCNnmcuxZOHMm/rL293QA4GPF3RTIeqEY', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(37, 'ad', 'dd', 'dd@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZHhneTN4a1NYczRabzNNRQ$P5KlwEjxK+uXTQ++slf0pR7oRKbwyjXcsaDTZLhINgo', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(38, 'toto', 'roro', 'r@d.co', '$argon2id$v=19$m=65536,t=4,p=1$OFdhV3hjM1Z1RGdLM0pEbA$OfKzm7ozYB5oZ7RlDXE1nnqlbudChO2FE0zCJMiZQPU', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(39, 'f', 'f', 'f@f.c', '$argon2id$v=19$m=65536,t=4,p=1$a0pwWDdFM2hBTTFFQ2NEMA$+1L8osAUg6rRed7pGOamD1tLOA1EP2T0yfHN9gkx+PQ', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(40, 'd', 'd', 'd@d.d', '$argon2id$v=19$m=65536,t=4,p=1$Zkg0bVFVa1pEbFB3cnBsTw$LtnGrRLPbQXG3gX4jRRjApXcbjoAlBtq2/4hsnzbkrQ', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(41, 's', 's', 's@s.co', '$argon2id$v=19$m=65536,t=4,p=1$bHlPakVpd1hKOGpsMk5nOA$WctLhtpZ5NKPSeW3XZcsf0fNyinKBcSXW7zRIHOqiCY', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(42, 's', 's', 's@s.s', '$argon2id$v=19$m=65536,t=4,p=1$VGtHOFBDaEQycExJWDJEYg$/vK1SgbadUQM5H4nGEV7cV5//c7UZh7XSvFUhjoGetk', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(43, 's', 's', 's@s.cs', '$argon2id$v=19$m=65536,t=4,p=1$M2Rjc25EbVpZRURiLmZwYw$xdSnCUJzATX8seBKUIWPuxspQMx/y8vudunDBfwj/hs', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(44, 's', 's', 's@s.com', '$argon2id$v=19$m=65536,t=4,p=1$TjR0S2RyMk9VeFl2cmE4ZA$mkXTyU51Rmhqdk4cO16Skz8zI1UngNagoV8rvnSpmss', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(45, 's', 's', 's@s.s', '$argon2id$v=19$m=65536,t=4,p=1$ZHgzODd2NUZaSHUzTVZzRQ$j/9XqcfFxkimHG/q0+OXWzm7ELXg6W6UzsfeexEzqSQ', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(46, 's', 's', 's@s.s', '$argon2id$v=19$m=65536,t=4,p=1$UmdqbmRFTGw4V2FSU09XQQ$IvgkMsdOtzyakqf64hi7xivDHui7Of5fVgm4/yIXRpI', '[\\\"ROLE_USER\"\\]', '2023-02-25'),
(47, 's', 's', 's@s.s', '$argon2id$v=19$m=65536,t=4,p=1$WmJBL29NQk9YY1JWM1lCSQ$1zGYu4oQ1AlVzV4JKuAxDBlBw+BrM9vhLCZFguQvDmk', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(48, 'a', 'a', 'a@a.a', '$argon2id$v=19$m=65536,t=4,p=1$aXI2ZUtZNUdIUElFZnJpZw$qoZkd7xcP8VluR5e/WaUwlm8hNfHc+jbXRiVcbY/Awg', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(49, 'a', 'a', 'a@a.a', '$argon2id$v=19$m=65536,t=4,p=1$WEVURjlhWG1ucG1yMmRrRw$BWi2Nz6+v15wtAB2RleR0HAp7DBp2lvcS2CEVcAfa6Y', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(50, 'a', 'z', 'az@az.zaz', '$argon2id$v=19$m=65536,t=4,p=1$UW9XMmlrS2Z2Wi94ck85Tw$suqnu2fD0DqcTf54Y0/3HnfACEpMwvp/0JZ24STK20s', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(51, 'yy', 'aa', 'aa@aa.aa', '$argon2id$v=19$m=65536,t=4,p=1$SENIS0RVdGNWT2xxZVRsaQ$GGLi0ZCphtO766xmQZ6b6teok3/RjQKxHpq5PibZfBA', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(52, 'sszz', 'ssss', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$eDBraWtDemFkY0JUVWl2VA$ln76s63GuW2eCYfN97P5/4lCRoy6gVHN8L8BPAU/1rg', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(53, 'sz', 'sz', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$TTMyZTU0V2JyOG5lR0hMTw$EFfQKMjBXn5IAjjnYMYrx7dK243+biBUcd8Jf1NewbQ', '[\\\"ROLE_USER\"\\]', '0000-00-00'),
(54, 'sz', 'sz', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$WFl3R2VPaGZsdFFHa1R0Ng$OnWVUou7AULnnTf3jMBrbKe1GtXDB0DnJqV2fIAwR7k', '[\\\"ROLE_USER\"\\]', '0000-00-00'),
(55, 'de', 'de', 'de@de.de', '$argon2id$v=19$m=65536,t=4,p=1$bi5hSlRPa2p0MlRjdGRaYg$hmHgX+tDYzdOAyGP1JRHUo+cqewcRN3pw8WOeBObAV4', '[\\\"ROLE_USER\"\\]', '0000-00-00'),
(56, 'sz', 'sz', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$RWFjSzdkL3o2dUdDS0U5Zg$/Kce8a7eTtYBy72FAY4CxtAVlx+LPJRMcrkQU3HHFA8', '[\\\"ROLE_USER\"\\]', '0000-00-00'),
(57, 'sz', 'sz', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$ZGRXQk1wQ0xMYWdyRnZaLw$z07eWGbSuBjK1jJpB5aXuINUHImxz4TFXceQcwNIBcQ', '[\\\"ROLE_USER\"\\]', '0000-00-00'),
(58, 'sz', 'sz', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$OTIuOFFKWW1tMU15ZFF6Nw$ipnVWfsLDiBytT2mqlIiCeDaOrWA+4+u7J/be7ecWH8', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(59, 'sz', 'sz', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$MVhaWnptclFqeXE0bTZGRQ$ncisDgUHQk9V2WvhzrfcwI4HEfXlFL3fE4e1S9eNjco', '[\\\"ROLE_USER\"\\]', '0000-00-00'),
(60, 'sz', 'sz', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$dEFLS0RYM2tlLzRvcGxESQ$GZ/QuVOO7Oaa00RSeGoqZDcXVtWLFKlZuJa3Yk0d6tQ', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(61, 'sz', 'sz', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$ck94eXJRUXQ0d1JLWHYvMg$a+21tgAeZA+grmLLDiyrMt0yH1U6ZyuFUMb256ka8WA', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(62, 'sz', 'sz', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$Nml0THV4b1BJMDc5WmVJcw$Z01BN8z1paEIVFFZoZJJh2S76XS25ZmlhSCTJYBqscM', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(63, 'sz', 'sz', 'sz@sz.sz', '$argon2id$v=19$m=65536,t=4,p=1$TzhidVVzb3E2aUxWWnFOMQ$1jhTMfOST4X27C/SGw0A17iU7zd4KbUnKHyn/rReKq0', '[\\\"ROLE_USER\"\\]', '2023-02-26'),
(64, 'Chopin', 'Dorian', 'dodo@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$OWNwUElkaDNNTkQ4STVnbg$bgOM0P3KDmy9GrCHD4MPjXRlq43eeK5uIEogR5saLQQ', '[\\\"ROLE_USER\"\\]', '2023-02-27');

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `wishlist`
--

INSERT INTO `wishlist` (`cart_id`, `user_id`, `item_id`) VALUES
(18, 1, 13),
(17, 1, 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
