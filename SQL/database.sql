-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 05, 2026 at 10:55 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a01baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `instytucja`
--

CREATE TABLE `instytucja` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `telefon` varchar(9) NOT NULL,
  `email` text NOT NULL,
  `strona_internetowa` text NOT NULL,
  `uwagi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoba`
--

CREATE TABLE `osoba` (
  `id` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `telefon` varchar(9) NOT NULL,
  `email` text NOT NULL,
  `adres` text NOT NULL,
  `uwagi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `powiazania`
--

CREATE TABLE `powiazania` (
  `id` int(11) NOT NULL,
  `osoba_id` int(11) NOT NULL,
  `instytucja_id` int(11) NOT NULL,
  `rola` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `instytucja`
--
ALTER TABLE `instytucja`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `powiazania`
--
ALTER TABLE `powiazania`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_osoba_id` (`osoba_id`),
  ADD KEY `fk_instytucja_id` (`instytucja_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instytucja`
--
ALTER TABLE `instytucja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `osoba`
--
ALTER TABLE `osoba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `powiazania`
--
ALTER TABLE `powiazania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `powiazania`
--
ALTER TABLE `powiazania`
  ADD CONSTRAINT `fk_instytucja_id` FOREIGN KEY (`instytucja_id`) REFERENCES `instytucja` (`id`),
  ADD CONSTRAINT `fk_osoba_id` FOREIGN KEY (`osoba_id`) REFERENCES `osoba` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
