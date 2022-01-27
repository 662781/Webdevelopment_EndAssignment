-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 27 jan 2022 om 13:41
-- Serverversie: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP-versie: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzatimedb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_line`
--

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `ingredients` varchar(480) NOT NULL,
  `img_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `price`, `ingredients`, `img_path`) VALUES
(1, 'Pizza Margherita', 2, 5.5, 'Tomato, Basil & Cheese', 'images/pizza-margarita.png'),
(2, 'Pizza Rustica', 2, 6.5, 'Tomato, Mozzarella, Spicy Minced Meat & Red Pepper', 'images/pizza-rustica.png'),
(3, 'Pizza Quattro Formaggi', 2, 7.5, 'Gouda Cheese, Provolone, Gorgonzola & Parmesan', 'images/pizza-quattro-formaggi.png'),
(4, 'Pasta Bolognese', 1, 7.5, 'Bolognese (Meat Sauce), Parmesan & Parsley', 'images/pasta-bolognese.png'),
(5, 'Pasta Con Polpette', 1, 8.5, 'Tomato, Cherry Tomato, Little Spicy Meatballs, Cream Sauce, Basil, Parsley, Garlic & Parmesan', 'images/pasta-conpolpette.png'),
(6, 'Pasta Funghi', 1, 8, 'Cream Sauce, Mushrooms, Parmesan, Garlic & Parsley', 'images/pasta-funghi.png'),
(7, 'Custom Pizza', 3, 0, '?', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_cat`
--

CREATE TABLE `product_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product_cat`
--

INSERT INTO `product_cat` (`id`, `name`, `description`) VALUES
(1, 'pasta', 'This category is all about pasta!'),
(2, 'pizza', 'This category is all about pizza!'),
(3, 'custom-pizza', 'This category is all about your custom pizzas!');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'KlaasDeTester', 'klaas.detester@yahoo.nl', 'klaasdetester', '2022-01-11 10:41:19'),
(2, 'KlaasdeTester2', 'klaasdetester2@jamail.nl', '$2y$10$qw4ZgXiQLtCuVQUJFFgaxeb0q4wiWgwhxEFTXv.wBcRdjL3WoB5xG', '2022-01-24 10:35:46'),
(3, 'KlaasdeTester3', 'klaasdetester3@jamail.nl', '$2y$10$sK7PSzTAmHlm0V2WcCfeCuEMGqtu27nN5aAi.jb9GUqoI56vAxkxq', '2022-01-24 10:48:56'),
(4, '', '', '$2y$10$TTPTH/gTsdFNZkAcOh3bLebV8xN8q.BfFtGQ3otLC2lNw7xTJLXmm', '2022-01-24 14:30:30'),
(5, 'Lightning', '662781@student.inholland.nl', '$2y$10$GMFveaNxqFY82be5fNG3Ge0mtwGIyQrBcrgZzi8zx44tj1HY3N89.', '2022-01-24 14:35:19'),
(6, 'KlaasdeTester4', 'klaasdetester4@jamail.nl', '$2y$10$YvTZrTyiENB0tji3Z01sLeK81xIJmdt/mgZEOR1qdItlh6J6NArRK', '2022-01-24 14:36:27');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexen voor tabel `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `order_line`
--
ALTER TABLE `order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Beperkingen voor tabel `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_line_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_cat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
