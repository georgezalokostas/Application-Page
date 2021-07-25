-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 25 Ιουλ 2021 στις 18:41:05
-- Έκδοση διακομιστή: 10.4.20-MariaDB
-- Έκδοση PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `posts`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datesubmitted` date NOT NULL,
  `vacationstart` date NOT NULL,
  `vacationend` date NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending',
  `uniqid` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `applications`
--

INSERT INTO `applications` (`id`, `email`, `datesubmitted`, `vacationstart`, `vacationend`, `reason`, `status`, `uniqid`) VALUES
(1, 'mm@gmail.com', '2021-07-25', '2021-09-08', '2021-09-17', 'Hello. Can I get my vacation from 8 to 17 of September 2021? Thanks!', 'approve', '60fd811dc07b9'),
(2, 'na@mail.com', '2021-07-25', '2021-07-29', '2021-09-03', 'Can I get it from 29 of July up to 3 of September? :)', 'decline', '60fd815b423d4'),
(3, 'na@mail.com', '2021-07-25', '2021-08-12', '2021-08-20', 'From 12 to 20 of August? :)', 'approve', '60fd8177971e4');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `usertype`) VALUES
(1, 'George', 'Zalokostas', 'gzalos6@gmail.com', 'admin', 'admin'),
(2, 'Steve', 'Jobs', 'sj@gmail.com', '1', 'admin'),
(3, 'Mickey', 'Mouse', 'mm@gmail.com', '1', 'user'),
(4, 'Neil ', 'Armstrong', 'na@mail.com', '123', 'user');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
